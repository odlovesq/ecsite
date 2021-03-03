<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase.thanks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    購入完了
                </div>

                <div class="p-6 grid lg:grid-cols-4 md:grid-cols-3 mb-4 md:mb-0 gap-4">
                    <p>カートの商品を購入しました</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
