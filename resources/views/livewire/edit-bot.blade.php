<div class="w-full h-full p-5 grid grid-cols-8 grid-rows-6 gap-5">
    <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
        <h2 class="text-3xl font-semibold">Bot Responses to specific Questions.</h2>
        <p class="text-md text-gray-400">What could they be?</p>
    </div>
    <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
        <div class="w-full h-full flex justify-between">
            <div>
                <h2 class="text-3xl font-semibold">Add more responses to this List.</h2>
                <p class="text-md text-gray-400">The more the merrier!</p>
            </div>
            <div class="w-[10%] aspect-square rounded-lg bg-white shadow-lg border-2 hover:brightness-90">

            </div>
        </div>
    </div>
    <div class="w-full p-5 col-span-8 row-span-5 flex flex-col gap-5 rounded-lg bg-white shadow-lg overflow-y-scroll no-scrollbar">
        @foreach($bots as $bot)
            <div class="w-full p-5 border rounded-lg shadow-md bg-white">
                <p>{{$bot->question}}</p>
            </div>
        @endforeach
    </div>
</div>