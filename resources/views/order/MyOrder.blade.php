<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-white dark:bg-gray-800 overflow-hidden shadow-xl  sm:rounded-lg">
                <div class="overflow-x-auto p-2">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Order ID</th>
                            <th class="border px-4 py-2">User_id</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Sh-method</th>
                            <th class="border px-4 py-2">Pay-method</th>
                            <th class="border px-4 py-2">Product ordered</th>
                            <th class="border px-4 py-2">Total Price</th>
                            <th class="border px-4 py-2">Order status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userOrders as $userOrder)
                        <tr>
                            <td class="border px-4 py-2">{{ $userOrder->id }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->user_id }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->email }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->shipping_method }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->payment_method }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->product_name }}</td>
                            <td class="border px-4 py-2">{{ $userOrder->product_price }}</td>
                            <td class="border px-4 py-2" style="background-color: {{ $userOrder->status === 'completed' ? 'green' : ($userOrder->status === 'pending' ? 'red' : '') }}">
                                    {{ $userOrder->status ?? 'Pending' }}
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
          
             
                  
            </div>
        </div>
    </div>
</x-app-layout>
