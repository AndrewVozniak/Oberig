<x-jet-action-section>
    <x-slot name="title">
        {{ __('Змінити статус') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Змінити тип свого аккаунту на "публічний / приватний".') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Після зміни статусу аккаунту на "публічний" ваш профіль буде доступний для перегляду, вам відкриється доступ до месенджеру нашого додатку і появиться можливість створювати збори коштів.') }}
        </div>

        <div class="mt-5">
            @if(Auth::user()->status)
                <div class="flex flex-row justify-between items-center mb-5">
                    <input id="profile_link" disabled type="text" id="disabled-input" aria-label="disabled input" class="mr-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full cursor-not-allowed" 
                    value="Посилання на вашу сторінку: {{ route('user_public_profile_page', ['id' => Auth::user()->id])}}">
                    <a class="bg-gray-200 border border-gray-300 px-5 py-1.5 rounded transition hover:bg-gray-100" href="{{ route('user_public_profile_page', ['id' => Auth::user()->id])}}">Перейти</a>
                </div>

                <x-jet-secondary-button wire:click="change_status" wire:loading.attr="disabled">
                    Публічний   
                </x-jet-secondary-button>
            @else
                <x-jet-danger-button wire:click="change_status" wire:loading.attr="disabled">
                    Приватний
                </x-jet-danger-button>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
