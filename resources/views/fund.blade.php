<x-app-layout>
  <x-slot name="header">
      <span class="font-semibold text-xl">{{ $fund->name }}</span>
  </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-5 py-2">
              <div class="flex flex-col">
                <div class="flex flex-col">
                  <span class="mb-2 text-lg uppercase font-bold hidden sm:flex" id="contacts">Контактні дані</span>
                  <span class="mb-2">Телефон: {{ $fund->phone }}</span>
                  <span class="mb-2">Пошта: {{ $fund->email }}</span>
                  <span class="mb-2">Вебсайт: <a href="{{ $fund->website }}" target="blank" class="underline text-blue-500 hover:text-blue-600">{{ $fund->website }}</a></span>
                </div>
                <hr class="my-4">
                <div class="my-2 flex flex-col">
                  <span class="text-lg uppercase font-bold" id="about">Про фонд</span>
                  <span>{{ $fund->description }}</span>
                </div>
                
                <div class="flex justify-end mt-5">
                  <a target="blank" href="{{ $fund->help_link }}" class="py-2 px-5 rounded text-white bg-purple-800 hover:bg-purple-900">Допомогти</a>
                </div>
              </div>
          </div>
        </div>
    </div>
</x-app-layout>