<div class="pointer-events-none z-10 w-full h-screen fixed">
    @if($state == 'closed')
    <div wire:click="open" class="pointer-events-auto z-10 bottom-16 right-16 w-24 h-24 p-3 absolute bg-amber-500 rounded-full hover:cursor-pointer hover:animate-bounce"></div>
    @elseif($state == 'opened')
    <div class="pointer-events-auto z-10 bottom-16 right-16 w-1/4 h-1/2 flex flex-col absolute bg-blue-100 rounded-md">
        <div class="w-full px-3 py-1 flex justify-between bg-amber-500 rounded-t-md">
            <h1>Artree ChatBot</h1>

            <button class="hover:cursor-pointer" wire:click="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 100 100">
                    <line x1="0" y1="0" x2="100" y2="100" stroke="black" stroke-width="2"/>
                    <line x1="100" y1="0" x2="0" y2="100" stroke="black" stroke-width="2"/>
                </svg>
            </button>
        </div>
        <div id="chatbox" class="w-full h-full overflow-y-scroll no-scrollbar p-2 flex flex-col bg-white border border-amber-200">
            @foreach($chats as $chat)
                @php
                    $chat = (array) $chat;
                @endphp
                @if($chat['actor'] == 'bot')
                    <div class="w-full pr-10 mb-5">
                        <div class="w-full p-2 bg-amber-100 border rounded-tr-md rounded-b-md">
                            <p>{{ $chat['chat'] }}</p>
                        </div>
                    </div>
                @elseif($chat['actor'] == 'user')
                    <div class="w-full pl-10 mb-5">
                        <div class="w-full p-2 bg-amber-100 border rounded-t-md rounded-bl-md">
                            <p>{{ $chat['chat'] }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div wire:ignore.self class="w-full">
            <form wire:submit.prevent="submit">
                <input wire:model="ask" class="w-full px-3 py-1 border-2 rounded-md focus:outline-amber-400" type="text"
                id="text-ask" 
                name="ask"
                placeholder="Ask Your Questions..."
                autocomplete="off"
                >
            </form>
            @if ($errors->get('ask'))
            <div id="invalidAsk" class="top-5 right-5 w-1/4 p-5 grid grid-cols-4 gap-3 fixed bg-red-100 border-black rounded-md">
                <div class="pr-3 col-span-3 border-r border-gray-500">
                    {{ $errors->get('ask')[0] }}
                </div>
                <button class="col-span-1" onclick="closeErrorNotice()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 100 100">
                        <line x1="0" y1="0" x2="100" y2="100" stroke="black" stroke-width="2"/>
                        <line x1="100" y1="0" x2="0" y2="100" stroke="black" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            @endif
        </div>
    </div>
    @endif
    
    <script>
        function closeErrorNotice() {
            document.getElementById("invalidAsk").classList.toggle('hidden');
        }
        
        window.addEventListener('contentChanged', (e) => {
            let chatbox = document.getElementById("chatbox")
            chatbox.scrollTop = chatbox.scrollHeight
        });
    </script>
</div>