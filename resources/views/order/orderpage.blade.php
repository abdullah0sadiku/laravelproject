<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Order page') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-700 rounded-lg p-4 flex flex-row text-white">
                <div class="w-1/2">
                    <img src="{{ $productImage }}" alt="{{ $productName }}" class="w-3/4 h-auto rounded-lg">
                    <h1 id="ss" class="text-lg font-semibold">{{ $productName }}</h1>
                    <p class="text-sm">Stock: {{ $productStock }}</p>
                </div>
                <div class="flex flex-col w-1/2 h-full">
                    <form method="POST" id="orderForm" class="flex flex-col w-full h-90" action="{{ route('order_page.store') }}">
                        @csrf
                        
                        <input type="hidden" name="product_name" value="{{ request()->input('name') }}">
                        <input type="hidden" name="product_image" value="{{ request()->input('image') }}">
                        <input type="hidden" name="product_price" value="{{ request()->input('price') }}">
                        <input type="hidden" name="product_stock" value="{{ request()->input('stock') }}">
    
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="shipping_method">Select Shipping Method:</label>
                        <select id="shipping_method" name="shipping_method" class="text-black" required>
                            <option value="">Select</option>
                            <option value="Take in store">Take in store</option>
                            <option value="Cosmojet ship">Cosmojet ship</option>
                            <option value="Standard ship">Standard ship</option>
                        </select>

                        <label for="payment_method">Payment Method:</label>
                        <select id="payment_method" name="payment_method" class="text-black"  required>
                            <option value="">Select</option>
                            <option value="Cash">Cash</option>
                            <option value="Visa">Visa</option>
                            <option value="Credit card">Credit card</option>
                        </select>

                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>


                        <label>Total Price:</label>
                        <p id="totalPrice" class="text-sm">Price: ${{ $productPrice }}</p>

                        <button type="submit" class="bg-green-600  rounded-lg w-full">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
