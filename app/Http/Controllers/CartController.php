<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartProducts = $this->cartService->getCartProducts();
        $subtotal = $this->cartService->getSubTotal();
        $cartProductsNum = $this->cartService->getProductsNum();
        return view('carts.index', compact('cartProducts', 'subtotal', 'cartProductsNum'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
            'quantity' => 'required|integer|max:10'
        ]);
        $this->cartService->addToCart($validated);
        return redirect()->route('cart.thanks', ['product_id' => Arr::get($validated, 'product_id')]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
            'quantity' => 'required|integer|max:10'
        ]);
        $this->cartService->updateCart($validated);
        return back()->with('message', '変更しました');
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
        ]);
        $this->cartService->deleteProduct((int) Arr::get($validated, 'product_id'));
        return back()->with('message', '削除しました');
    }

    public function thanks(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
        ]);

        $product = Product::find(Arr::get($validated, 'product_id'));
        $subtotal = $this->cartService->getSubTotal();
        $cartProductsNum = $this->cartService->getProductsNum();
        return view('carts.thanks', compact('product', 'subtotal', 'cartProductsNum'));
    }
}
