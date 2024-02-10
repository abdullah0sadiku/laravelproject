<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Add New Product Form -->
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                        <input type="number" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                        <input type="number" name="stock" id="stock" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-lg text-white font-semibold mb-4">Products</h2>
                @if (session('status'))
                    <div id="statusAlert" class="alert alert-success">{{ session('status') }}</div>
                @endif

                <table class="w-full divide-y text-white divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr >
                            <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">ID</th>
                            <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Name</th>
                            <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Price</th>
                            <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Stock</th>
                            <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border text-white">
                        @foreach($products as $product)
                        <tr>
                            <td class="border px-6 py-4 whitespace-nowrap">
                                {{ $product->id }}
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap">
                                {{ $product->name }}
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap">
                                ${{ number_format($product->price, 2) }}
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap">
                                {{ $product->stock }}
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
   
        document.addEventListener('DOMContentLoaded', function () {
        
            var statusAlert = document.getElementById('statusAlert');

         
            if (statusAlert) {
         
                setTimeout(function () {
                    statusAlert.style.display = 'none';
                }, 5000); 
            }
        });
    </script>
</x-app-layout>
