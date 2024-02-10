<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Team Support Chat') }}
        </h2>
    </x-slot>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 rounded-xl lg:px-8 flex">
            <div class="w-60 p-4 bg-gray-800 ">
                <ul class="space-y-2">
                    <div class="text-white"><h1>Contact with users</h1></div>
                    <div class="border-2 h-0 w-full border-gray-400">-</div>
                    @if(isset($users) && count($users) > 0)
                        @foreach($users as $user)
                            <li class="w-full"><a href="{{ route('messages.show', $user->id) }}" class="text-white py-1 my-3 rounded-xl bg-gray-500 ">{{ $user->name }}</a></li>
                        @endforeach
                    @else
                        <li>No users available</li>
                    @endif
                </ul>
            </div>
            <div class="w-full p-4 bg-gray-700">
                @if(isset($user))
                    <!-- Chat messages with selected user -->
                    <div class="chat-body py-4 px-4">
                        <!-- Messages will be displayed here -->
                        <div class="message my-2">
                            <!-- Sort messages by created_at before iterating -->
                            @if(isset($messages) && count($messages) > 0)
                                @foreach($messages->sortBy('created_at') as $message)
                                    @if($message->sender_id === Auth::id())
                                        <div class="bg-gray-500 w-full flex justify-start my-1 p-1 rounded-xl text-white">
                                            {{ $message->content }}
                                        </div>
                                    @else
                                        <div class="bg-gray-800 w-full flex justify-end p-1 rounded-xl text-white">{{ $message->content }}</div>
                                    @endif
                                @endforeach
                            @else
                                <div>No messages available</div>
                            @endif
                        </div>
                    </div>
                    <div class="chat-footer py-2 px-4">
                        <form action="{{ route('messages.store') }}" class="flex flex-row" method="post">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                            <input type="text" name="content" placeholder="Type your message..." class="w-full rounded-md py-2 px-3 bg-gray-800 text-white">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Send</button>
                        </form>
                    </div>
                @else
                    <p class="text-white">No user selected</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
