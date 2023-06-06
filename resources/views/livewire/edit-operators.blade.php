<div class="w-full h-full p-5 grid grid-cols-8 grid-rows-6 gap-5">
    <div class="w-full p-5 col-span-1 row-span-1 flex rounded-lg bg-white shadow-lg">
        <a href="/admin/Operator" class="w-full h-full flex rounded-xl hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" class="w-full h-3/4 self-center">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
    </div>

    <div class="w-full p-5 col-span-4 row-span-1 rounded-lg bg-white shadow-lg">
        <h2 class="text-3xl font-semibold">Operator Editor</h2>
        <p class="text-md text-gray-400">You can edit Operators Access here, decide who's worthy.</p>
    </div>

    <div class="w-full p-5 col-span-3 row-span-1 rounded-lg bg-white shadow-lg">
        <div class="mb-3">
            <label class="text-xl font-semibold" for="text-search-operators">Search</label><br>
            <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" wire:model="search" type="text"
            id="text-search-operators" 
            name="search-operators"
            placeholder="Search Operators"
            >
        </div>
    </div>

    <div class="w-full p-5 col-span-3 row-span-5 flex flex-col gap-3 rounded-lg bg-white shadow-lg overflow-y-scroll no-scrollbar">
        @foreach($operators as $operator)
        <div class="w-full p-5 border rounded-lg shadow-md">
            <div id="operator-{{ $operator->name }}" class="h-full flex flex-col gap-5 justify-between items-start">
                <div class="w-full flex justify-between items-center">
                    <div class="w-full flex gap-5 items-center">
                        <div class="w-14 h-full rounded-full">
                            <img class="w-full h-full rounded-full" src="{{ asset('assets/admin/Person.jpg')}}" alt="">
                        </div>
                        <div class="h-full flex-col justify-center">
                            <h6 class="text-xl font-medium">{{ $operator->name }}</h6>
                            <p class="text-md text-gray-600">{{ $operator->role }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="w-14 h-full rounded-full">
                            <a href="#" wire:click="edit({{ $operator->id }})"><img class="w-full h-full rounded-full hover:bg-gray-100" src="{{ asset('assets/admin/Ellipsis.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="w-full p-5 col-span-5 row-span-5 flex flex-col gap-3 rounded-lg bg-white shadow-lg overflow-y-scroll no-scrollbar">
        @if ($editing)
            <h1 class="text-3xl font-semibold"><strong>Editing: </strong>{{ $data->name }}</h1>
            <form wire:submit.prevent="update({{ $data->id }})">
                <div class="mb-3">
                    <label class="text-xl font-semibold" for="text-{{ $data->id }}">Name</label><br>
                    <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="text"
                    id="text-{{ $data->id }}" 
                    placeholder="Operator's Name"
                    value="{{ $data->name }}"
                    required="true"
                    >
                </div>
                <div class="mb-3">
                    <label class="text-xl font-semibold" for="email-{{ $data->id }}">Email</label><br>
                    <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="email"
                    id="email-{{ $data->id }}" 
                    placeholder="Operator's Email"
                    value="{{ $data->email }}"
                    required="true"
                    >
                </div>
                <div class="mb-3">
                    <label class="text-xl font-semibold" for="password-{{ $data->id }}">Password</label><br>
                    <input wire:model="operatorPassword" class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="password"
                    id="password-{{ $data->id }}"
                    placeholder="Operator's Password"
                    required="true"
                    >
                    <span class="text-sm font-medium text-gray-400 opacity-80">Input Password to save Changes</span>
                </div>
                <x-form-input.radio label="Clearance" name="radio" :radioOptions="$roles"></x-form-input.radio>

                <x-form-input.image label="Image" name="image" img="{{ asset('/assets/form/pompom-ok.png') }}" width="150" height="150"></x-form-input.image>
            </form>
        @endif
    </div>
</div>