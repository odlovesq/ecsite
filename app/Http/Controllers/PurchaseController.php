<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseCreated;
use App\Models\Purchase;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function new()
    {
        return view('purchases.new');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'zipcode' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        $price = $this->cartService->getSubTotal();
        $purchaseAttribute = array_merge($validated, [
            "user_id" => auth()->id(),
            "price" => $price,
            "status" => 1 // NOTE: 注文確定待ち
        ]);
        $cartProductIds = $this->cartService->getCartProductIds();

        DB::transaction(function () use ($purchaseAttribute, $cartProductIds) {
            $purchase = Purchase::create($purchaseAttribute);
            $purchase->products()->attach($cartProductIds);

            Mail::to($purchase->user)
                ->send(new PurchaseCreated);
        });

        $this->cartService->clear();
        return redirect()->route('purchase.thanks');
    }

    public function thanks()
    {
        return view('purchases.thanks');
    }
}
