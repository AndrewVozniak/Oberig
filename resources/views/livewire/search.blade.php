<div class="flex flex-col px-5 py-5">
    <x-search.search_title>Пошук</x-search.search_title>
    <x-search.search_category_button>Категорії</x-search.search_category_button>
    
    <x-search.search_form>Найдіть людей, фонди та збори коштів...</x-search.search_form>

    
    @if(isset($users) and $users_checkbox)
        <div class="mt-10 flex flex-col shadow rounded px-5 py-2">
            <b class="mb-2 text-lg">Користувачі</b>
            @foreach($users as $user)
                <div class="flex flex-col md:flex-row md:justify-between md:items-center transition border border-gray-200 hover:border-blue-400 px-5 py-3 rounded-md">
                    <li class="text-md">{{ $user->name }}</li>
                    <a href="{{ route('user_public_profile_page', ['id' => $user->id]) }}" class="p-2 rounded text-white bg-purple-700 hover:bg-purple-800">Перейти на сторінку</a>
                </div>
                <hr class="my-5">
            @endforeach
        </div>
    @endif

    @if(isset($fundraisings) and $fundraisings_checkbox)
        <div class="mt-10 flex flex-col shadow rounded px-5 py-2">
            <b class="mb-2">Збори коштів</b>
            @foreach($fundraisings as $fundraising)
            <div class="flex flex-col md:flex-row md:justify-between md:items-center transition border border-gray-200 hover:border-blue-400 px-5 py-3 rounded-md">
                    <li class="text-md">{{ $fundraising->name }}</li>
                    <a href="{{ route('user_public_profile_page', ['id' => $fundraising->foundator_id]) }}" class="p-2 rounded text-white bg-purple-700 hover:bg-purple-800">Перейти на сторінку</a>
                </div>
                <hr class="my-5">
            @endforeach
        </div>
    @endif

    @if(isset($funds) and $funds_checkbox)
        <div class="mt-10 flex flex-col shadow rounded px-5 py-2">
            <b class="mb-2">Фонди</b>
            @foreach($funds as $fund)
                <div class="flex flex-col md:flex-row md:justify-between md:items-center transition border border-gray-200 hover:border-blue-400 px-5 py-3 rounded-md">
                    <li class="text-md">{{ $fund->name }}</li>
                    <a href="{{ route('fund', ['id' => $fund->id]) }}" class="p-2 rounded text-white bg-purple-700 hover:bg-purple-800">Перейти на сторінку</a>
                </div>
                <hr class="my-5">
            @endforeach
        </div>
    @endif
</div>
