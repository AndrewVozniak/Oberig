<header class="bg-purple-800 shadow">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 | flex flex-row align-center justify-between font-sans">
        <div class="title text-white text-xl font-bold my-auto">{{ __('Оберіг') }}</div>
        @if(Auth::check())
            <input type="search" id="default-search" class="block w-2/4 py-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Шукай людей, фонди..." required>
            <div class="account_info flex flex-row text-white my-auto">
                <a href="{{ route('dashboard') }}" class="balance text-lg">{{ __('Персональний кабінет') }}</a>
            </div>
        @else
            <a href="{{ route('login') }}" class="text-white text-xl font-bold my-auto font-sans">{{ __('Увійти') }}</a>
        @endif
    </div>
</header>