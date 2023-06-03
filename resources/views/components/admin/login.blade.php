<div class="w-full h-full flex justify-center items-center bg-gray-200">
    <div class="w-1/4 h-1/2 p-5 flex flex-col items-center bg-white">
        @if ($errors->any())
            <div class="fixed top-0 right-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="p-5 mt-5 bg-red-300 border-2 border-red-700 rounded-xl">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="w-full flex flex-col gap-5" action="/adm/login" method="POST">
            @csrf
            <h2 class="self-center text-2xl font-semibold">Admin Login</h2>
            <x-form-input.text label="Name" name="name" placeholder="Your Name" required="true" note="Only Alphabets, 3 to 20 Characters."></x-form-input.text>
            <x-form-input.password label="Password" name="password" placeholder="Your Password" required="true" note="Password is Required"></x-form-input.password>
            <x-form-input.submit label="Submit"></x-form-input.submit>
        </form>
    </div>
</div>