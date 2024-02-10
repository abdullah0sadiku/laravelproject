<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                <!-- Product Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                    @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-700 rounded-lg p-4">
                        <img src="{{ asset('storage/storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
                        <div class="p-4 text-white">
                            <p class="text-lg font-semibold">{{ $product->name }}</p>
                            <div class="flex justify-between mt-2">
                                <p class="text-sm">Price: ${{ $product->price }}</p>
                                <p class="text-sm">Stock: {{ $product->stock }}</p>
                            </div>
                            <div class="flex justify-between mt-4">
                                <button type="button" onclick="redirectToOrderPage('{{ $product->name }}', '{{ asset('storage/storage/products/' . $product-> image ) }}', '{{ $product->price }}', '{{ $product->stock }}')" class="bg-green-600 w-1/2 rounded">Order</button>
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirectToOrderPage(name, image, price, stock) {
            const url = `/order_page?name=${name}&image=${image}&price=${price}&stock=${stock}`;
            window.location.href = url;
        }
    </script>

</x-app-layout>
