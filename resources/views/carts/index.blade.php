<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart.index') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex bg-white border-b border-gray-200">
                    <div class="p-6">
                        カート
                    </div>
                </div>

                @if (session()->has('message'))
                <div class="my-5">
                    <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="success">
                        {{ session('message') }}
                    </div>
                </div>
                @endif

                @if ($errors->any())
                <div class="my-5">
                    @foreach ($errors->all() as $error)
                    <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                @endif

                <div class="p-6 grid lg:grid-cols-1 mb-4 md:mb-0 divide-y divide-light-blue-400">
                    @foreach($cartProducts as $cartProduct)
                    <x-cart-list :product="Arr::get($cartProduct, 'product')"
                                 :quantity="Arr::get($cartProduct, 'quantity')"></x-cart-list>
                    @endforeach
                    <div class="flex justify-end space-x-4 py-4">
                        <div>
                            カートの小計 (商品{{ $cartProductsNum }}点)
                        </div>
                        <div>
                            ¥ {{ number_format($subtotal) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
