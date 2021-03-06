<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product.show') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    商品詳細
                </div>

                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <form method="POST" action="/cart">
                        @csrf
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                                <img alt="{{ $product->name }}"
                                     class="lg:w-1/2 w-full object-contain object-center rounded border border-gray-200"
                                     src="{{ asset('storage/'.$product->image_path) }}">
                                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                                        {{ $product->name }}
                                    </h1>

                                    <p class="leading-relaxed">
                                        {{ $product->description }}
                                    </p>
                                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                                        <div class="flex items-center">
                                            <input class="hidden" name="product_id" value="{{ $product->id }}">
                                            <span class="mr-3">数量</span>
                                            <div class="relative">
                                                <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10"
                                                        name="quantity">
                                                    @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <span class="title-font font-medium text-2xl text-gray-900">
                                            ¥{{ number_format($product->price) }}
                                        </span>
                                        <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded"
                                                type="submit">
                                            カートに追加する
                                        </button>
                                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    @if ($errors->any())
                                    <div class="my-5">
                                        @foreach ($errors->all() as $error)
                                            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
