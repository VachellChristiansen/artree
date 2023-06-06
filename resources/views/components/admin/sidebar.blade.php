<div class="w-1/12 h-screen bg-white rounded-tr-3xl rounded-br-3xl">
    <div class="w-full h-full p-5 flex flex-col justify-between items-center">
        <div class="w-full p-7 flex flex-col gap-10">
            <div>
                <img class="mb-10" src="{{ asset('assets/admin/Logo.svg') }}" alt="">
                <div class="w-full h-[1px] bg-black"></div>
            </div>
            <a href="/admin/Home"><img class="{{ $current=='Home' ? 'opacity-100' : 'opacity-40' }} hover:opacity-100" src="{{ asset('assets/admin/Home.svg') }}" alt=""></a>
            <a href="/admin/Operator"><img class="{{ $current=='Operator' || $current=='OpEditor' ? 'opacity-100' : 'opacity-40' }} hover:opacity-100" src="{{ asset('assets/admin/User.svg') }}" alt=""></a>
            <a href="/admin/Globe"><img class="{{ $current=='Globe' ? 'opacity-100' : 'opacity-40' }} hover:opacity-100" src="{{ asset('assets/admin/Globe.svg') }}" alt=""></a>
        </div>
        <div class="w-full p-7">
            <a href="/admin/Settings"><img class="{{ $current=='Settings' ? 'opacity-100' : 'opacity-40' }} hover:opacity-100" src="{{ asset('assets/admin/Settings.svg') }}" alt=""></a>
        </div>
    </div>
</div>