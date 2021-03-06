<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class CartService{
    const CART_SESSION_KEY = 'cart_products';

    public function getCartProducts()
    {
        $cartProducts = Arr::wrap(session(self::CART_SESSION_KEY));
        $cartProductIds = array_keys($cartProducts);
        $products = Product::find($cartProductIds);
        return Product::find($cartProductIds)->map(function ($product) use ($cartProducts) {
            return [
                "product" => $product,
                "quantity" => Arr::get($cartProducts, $product->id)
            ];
        }, $products);
    }

    public function getCartProductIds()
    {
        $cartProducts = Arr::wrap(session(self::CART_SESSION_KEY));
        return array_keys($cartProducts);
    }

    public function getSubTotal()
    {
        $cartProducts = Arr::wrap(session(self::CART_SESSION_KEY));
        $cartProductIds = array_keys($cartProducts);
        $products = Product::find($cartProductIds);
        return array_reduce($cartProductIds, function ($carry, $cartProductId) use ($products, $cartProducts) {
            $price = Arr::first($products, function ($product) use ($cartProductId) {
                return $product->id == $cartProductId;
            })->price;
            return $carry + ($price * Arr::get($cartProducts, $cartProductId));
        });
    }

    public function getProductsNum()
    {
        $cartProducts = Arr::wrap(session(self::CART_SESSION_KEY));
        return array_sum($cartProducts);
    }

    // NOTE: [id => quantity] で保存する
    public function addToCart($cartProduct)
    {
        $cartProductKey = self::CART_SESSION_KEY.'.'.Arr::get($cartProduct, 'product_id');
        $quantity = (int) Arr::get($cartProduct, 'quantity');

        if (!session()->has($cartProductKey)) {
            session()->put($cartProductKey, $quantity);
            return;
        }

        $productQuantity = session($cartProductKey);
        $productQuantity += $quantity;

        if ($productQuantity > 10) {
            throw ValidationException::withMessages([
                'quantity' => '同じ商品は最大10個までしか購入できません',
            ]);
        }

        session()->put($cartProductKey, $productQuantity);
    }

    public function updateCart($cartProduct)
    {
        $cartProductKey = self::CART_SESSION_KEY.'.'.Arr::get($cartProduct, 'product_id');
        $quantity = (int) Arr::get($cartProduct, 'quantity');
        session()->put($cartProductKey, $quantity);
    }

    public function deleteProduct($productId)
    {
        session()->forget(self::CART_SESSION_KEY.'.'.$productId);
    }

    public function clear()
    {
        session()->forget(self::CART_SESSION_KEY);
    }
}
