<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users manegment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-white dark:bg-gray-800 overflow-hidden shadow-xl  sm:rounded-lg">
                @if($users->count()> 0)
                <div class="overflow-x-auto p-2">
                    <table class="table-auto w-full ">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Roles</th>
                                <th class="border px-4 py-2 flex flex-row">
                                    <button type="button" onclick="toggleModal()" class="bg-green-700 text-white px-4 py-2 rounded-xl">Add users</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    @if(Spatie\Permission\Models\Role::count() > 0)
                                        @foreach(Spatie\Permission\Models\Role::pluck('name')->all() as $role)
                                            @if(in_array($role, $user->roles()->pluck('name')->all()))
                                                <span class="ms-2">{{ $role }}</span>
                                            @else
                                            <form method="POST" class="flex flex-row ms-2" action="{{ route('user.update', ['user' => $user->id]) }}">
                                                @csrf 
                                                @method('PUT')
                                                <input type="hidden" name="role" value="{{ $role }}">
                                                <button type="submit">
                                                    <a class="text-white bg-blue-700 hover:bg-blue-800 p-1 rounded-lg"> {{ $role }}</a>
                                                </button>
                                            </form>
                                            @endif
                                        @endforeach
                                    @else
                                        N/D
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <form method="POST" class="d-inline ms-2" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                        @csrf 
                                        @method('DELETE')
                                       
                                            <button type="submit" onclick="return confirm('Are you sure?')" class= "w-1/2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><svg class="h-8 w-8 text-gray-100"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button>
                                    
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    0 users
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif               
            </div>
        </div>
    </div>


    <div id="addUserModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
     
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200" id="modal-title">
                                Add new users
                            </h3>
                            <div class="mt-2">
                                <form method="POST" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <input type="text" name="name" placeholder="Name" required class="border px-2 py-1 w-full">
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" name="email" placeholder="Email" required class="border px-2 py-1 w-full">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" name="password" placeholder="Password" required class="border px-2 py-1 w-full">
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" onclick="toggleModal()" class="bg-green-500 text-white px-4 py-2">Add</button>
                                        <button type="button" onclick="toggleModal()" class="bg-red-500 text-white px-4 py-2">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('addUserModal');
            modal.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
