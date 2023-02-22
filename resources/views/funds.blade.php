<x-app-layout>
  <x-slot name="header">
      <span class="font-semibold text-xl uppercase">Фонди</span>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-5 py-2">
              @foreach($funds as $fund)
                <div class="flex flex-col">
                  <span class="mb-2 font-bold">{{ $fund->name }}</span>

                  <span>Телефон:  {{ $fund->phone }}</span>
                  <span>Пошта: {{ $fund->email }}</span>
                  
                  <div class="flex flex-row justify-between">
                    .

                    <div class="flex justify-end">
                      <a href="{{ route('fund', $fund->id) }}" class="flex flex-row items-center py-2 px-5 rounded text-white bg-purple-800 hover:bg-purple-900">Детальніше
                      <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
      </div>
  </div>
</x-app-layout>