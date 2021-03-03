<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase.new') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between bg-white border-b border-gray-200 p-6">
                    <div>
                        購入
                    </div>
                </div>

                <div class="leading-loose">
                    <form method="POST" action="{{ route('purchase.create') }}" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        @csrf
                        <p class="text-gray-800 font-medium">Customer information</p>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600">郵便番号</label>
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="zipcode" type="text" required="true" placeholder="ハイフン不要" aria-label="Email">
                        </div>
                        <div class="mt-2">
                            <label class=" block text-sm text-gray-600">住所</label>
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="address" type="text" required="true" placeholder="部屋番号まで" aria-label="Address">
                        </div>

                        <p class="mt-4 text-gray-800 font-medium">Payment information</p>
                        <div class="">
                            <p>決済方法は代引きのみです。</p>
                            <p>上記フォームに入力した住所に発送されます。</p>
                        </div>
                        <div class="mt-4">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
                                購入
                            </button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
