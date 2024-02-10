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
                            <th class="border px-4 py-2">Order status</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="border px-4 py-2">{{ $order->id }}</td>
                            <td class="border px-4 py-2">{{ $order->user_id }}</td>
                            <td class="border px-4 py-2">{{ $order->email }}</td>
                            <td class="border px-4 py-2">{{ $order->shipping_method }}</td>
                            <td class="border px-4 py-2">{{ $order->payment_method }}</td>
                            <td class="border px-4 py-2">{{ $order->product_name }}</td>
                            <td class="border px-4 py-2" style="background-color: {{ $order->status === 'completed' ? 'green' : ($order->status === 'pending' ? 'red' : '') }}">
                                    {{ $order->status ?? 'Pending' }}
                            </td>
                            <td class="border px-4 py-2">
                                 <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 bg-red-500 rounded-lg"><svg class="h-8 w-8 text-gray-100"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button>
                                </form>
                                <form action="{{ route('order.complete', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="p-1 bg-green-700 rounded-lg"><svg class="h-8 w-8 text-gray-100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="20 6 9 17 4 12" /></svg></button>
                                </form>

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
