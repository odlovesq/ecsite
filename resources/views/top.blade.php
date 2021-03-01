<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TOP') }}
        </h2>
    </x-slot>
    <style type="text/css">
        img {
            background-image: url('http://placehold.jp/300x300.png');
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    新着商品
                </div>

                <div class="p-6 grid lg:grid-cols-3 md:grid-cols-2 mb-4 md:mb-0 gap-4">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow relative">
                        <img class="bg-cover bg-center h-56 w-full object-cover object-center" src="{{ asset('storage/'.$product->image_path) }}" alt="">
                        <div class="p-4 h-auto">
                            <p href="#" class="block text-blue-500 hover:text-blue-600 font-semibold text-base">
                                {{ $product->name }}
                            </p>
                            <p href="#" class="block text-blue-500 hover:text-blue-600 font-semibold mb-2 text-lg md:text-base lg:text-lg">
                                ¥ {{ number_format($product->price) }}
                            </p>
                            <div class="text-gray-600 text-sm leading-relaxed block md:text-xs lg:text-sm">
                                {{ $product->description }}
                            </div>
                            <div class="mt-2 bottom-0">
                                <a class="inline bg-gray-300 py-1 px-2 rounded-full text-xs lowercase text-gray-700" href="#">#something</a>
                                <a class="inline bg-gray-300 py-1 px-2 rounded-full text-xs lowercase text-gray-700" href="#">#sky</a>
                                <p class="pt-1.5 text-xs text-gray-500">{{ $product->created_at->format('Y/m/d') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
