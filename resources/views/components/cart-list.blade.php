<div class="flex flex-wrap justify-center py-5">
    <div class="grid grid-cols-9">
        <div class="col-span-2">
            <img
                alt="{{ $product->name }}"
                src="{{ asset('storage/'.$product->image_path) }}"
                class="h-24 w-24 rounded mx-auto"
            />
        </div>
        <div class="col-span-1"></div>
        <div class="col-span-3 space-y-1">
            <div>
                <h3 class="font-semibold text-black">{{ $product->name }}</h3>
            </div>
            <div>
                <form method="POST" action="{{ route('cart.update') }}">
                    @csrf
                    <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10"
                            name="quantity"
                            onchange="submit(this.form)">
                        @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $i === $quantity ? 'selected="selected"' : '' }}>
                            {{ $i }}
                        </option>
                        @endfor
                    </select>
                    <input class="hidden" value="{{ $product->id }}" name="product_id" type="text">
                </form>
            </div>

        </div>
        <dev class="col-span-3">
            <div>
                ¥ {{ number_format($product->price) }}
            </div>
            <div>
                <form method="POST" action="{{ route('cart.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input class="hidden" value="{{ $product->id }}" name="product_id" type="text">
                    <x-button type="submit">
                        削除
                    </x-button>
                </form>
            </div>
        </dev>
    </div>
</div>
