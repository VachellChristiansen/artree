<div class="w-full h-full p-5 grid grid-cols-8 grid-rows-6 gap-5">
    <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
        <h2 class="text-3xl font-semibold">Bot Responses to specific Questions.</h2>
        <p class="text-md text-gray-400">Modify or even add your bot response here, the more the merrier!</p>
    </div>
    <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
        <div class="w-full h-full flex justify-between gap-5">
            <div class="flex-grow">
                <label class="text-xl font-semibold" for="text-search-question">Search</label><br>
                <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" wire:model="search" type="text"
                id="text-search-question"
                name="search-question"
                placeholder="Search Question"
                >
            </div>
            <div class="w-[10%] aspect-square rounded-lg bg-white shadow-lg border-2 hover:brightness-90">
                <a href="#" onclick="return toggleAdd()"><img class="w-full h-full rounded-full" src="{{ asset('assets/admin/Plus.svg')}}" alt=""></a>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="list" class="w-full p-5 col-span-8 row-span-5 flex flex-col gap-5 rounded-lg bg-white shadow-lg overflow-y-scroll no-scrollbar">
        @foreach($bots as $bot)
            <div class="w-full p-5 border rounded-lg shadow-md bg-white">
                <div wire:ignore.self id="question-{{ $bot->id }}" class="h-full flex flex-col gap-5 justify-between items-start">
                    <div class="w-full flex justify-between items-center">
                        <div class="flex items-center">
                            <p>{{$bot->question}}</p>
                        </div>
                        <div class="w-14 h-full rounded-full">
                            <a href="#" onclick="return toggleQuestion('data-{{ $bot->id }}')"><img class="w-full h-full rounded-full hover:bg-gray-100" src="{{ asset('assets/admin/Ellipsis.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div wire:ignore.self id="data-{{ $bot->id }}" class="w-full h-full hidden">
                        <form wire:submit.prevent="saveBotChanges({{ $bot->id }})">
                            <div class="mb-3">
                                <label class="text-xl font-semibold" for="text-{{ $bot->question }}">Question</label><br>
                                <input wire:model="botQuestions.{{ $bot->id }}" class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="text"
                                id="text-{{ $bot->question }}" 
                                placeholder="Bot Question"
                                >
                            </div>
                            @if ($errors->get('botQuestions.'.$bot->id))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                                <span class="font-medium">{{ $errors->get('botQuestions.'.$bot->id)[0] }}</span>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label class="text-xl font-semibold" for="email-{{ $bot->response }}">Response</label><br>
                                <input wire:model="botResponses.{{ $bot->id }}" class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="text"
                                id="email-{{ $bot->response }}"
                                placeholder="botResponse"
                                >
                            </div>
                            @if ($errors->get('botResponses.'.$bot->id))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                                <span class="font-medium">{{ $errors->get('botResponses.'.$bot->id)[0] }}</span>
                            </div>
                            @endif
                            <div class="w-full flex justify-end gap-3">
                                <a onclick="confirm('Are you sure to delete this Question?')" wire:click="deleteResponse({{ $bot->id }})" href="#"><img class="px-3 py-1 h-[150px] aspect-square border-2 rounded-md hover:border-blue-400" src="{{ asset('/assets/form/sampo-trash.png') }}"></img></a>
                                <x-form-input.image label="Image" name="image" img="{{ asset('/assets/form/pompom-ok.png') }}" width="150" height="150"></x-form-input.image>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div wire:ignore.self id="add" class="w-full p-5 col-span-8 row-span-5 flex-col gap-5 rounded-lg bg-white shadow-lg overflow-y-scroll no-scrollbar hidden">
        <form wire:submit="addBotResponse">
            <div class="mb-3">
                <label class="text-xl font-semibold" for="text-area-question">New Question</label><br>
                <textarea wire:model="addQuestion" class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400"
                id="text-area-question"
                placeholder="Add New Bot Question"
                cols="100"
                rows="10"
                ></textarea>
            </div>
            @if ($errors->get('addQuestion'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                <span class="font-medium">{{ $errors->get('addQuestion')[0] }}</span>
            </div>
            @endif
            <div class="mb-3">
                <label class="text-xl font-semibold" for="text-area-response">New Response</label><br>
                <textarea wire:model="addResponse" class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400"
                id="text-area-response"
                placeholder="Add New Bot response"
                cols="100"
                rows="10"
                ></textarea>
            </div>
            @if ($errors->get('addResponse'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                <span class="font-medium">{{ $errors->get('addResponse')[0] }}</span>
            </div>
            @endif
            <x-form-input.image label="Image" name="image" img="{{ asset('/assets/form/pompom-ok.png') }}" width="150" height="150"></x-form-input.image>
        </form>
    </div>
    <script type='text/javascript'>
        function toggleAdd()
        {
            document.getElementById('list').classList.toggle('flex')
            document.getElementById('list').classList.toggle('hidden')
            document.getElementById('add').classList.toggle('flex')
            document.getElementById('add').classList.toggle('hidden')
        }
        function toggleQuestion(id)
        {
            let question = document.getElementById(id)
            question.classList.toggle('hidden')
        }
    </script>
</div>