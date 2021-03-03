<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart.thanks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    カート追加完了
                </div>

                <div class="p-6 grid lg:grid-cols-4 md:grid-cols-3 mb-4 md:mb-0 gap-4">
                    <p>下記商品をカートに追加しました</p>

                    <div class="h-15 w-30">
                        <a href="" class="border-2 border-blue-500 rounded-full font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                            カートを見る
                        </a>
                    </div>
                </div>

                <div class="p-6 grid lg:grid-cols-1 mb-4 md:mb-0 gap-4">
                    <div class="flex flex-wrap mt-12 justify-center">
                        <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 gap-9">
                            <div class="col-span-12">
                                <h3 class="font-semibold text-black">{{ $product->name }}</h3>
                            </div>
                            <div class="col-span-4 sm:col-span-2 md:col-span-6 xl:col-span-8">
                                <img
                                    alt="$product->name"
                                    src="{{ asset('storage/'.$product->image_path) }}"
                                    class="h-24 w-24 rounded mx-auto"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-4 md:col-span-6 xl:col-span-8">
                                <p>
                                    カートの小計 (商品{{ $cartProductsNum }}点)
                                </p>
                                <p>
                                    ¥ {{ number_format($subtotal) }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
