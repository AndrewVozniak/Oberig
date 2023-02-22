<x-app-layout>
    <div class="mx-5">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
          <h1 class="font-semibold text-xl">{{ __('Дані користувача') }}</h1>
          <div class="flex flex-col">
            <div class="flex flex-row items-center justify-between">
              <span class="text-lg">{{ $user->name }}</span>
              <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
            </div>
            <div>
              <span class="text-lg">На сайті з {{ $user->created_at }}</span>
            </div>
          </div>
        </div>
        
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
          <h1 class="font-semibold text-xl">{{ __('Активні збори') }}</h1>
          
          @if($fundraisings->isNotEmpty())
            <div class="flex flex-col justify-between">
              @foreach($fundraisings as $fundraising)
                <div class="bg-white rounded first-letter p-5 my-5 flex flex-col shadow-md">
                  <span class="text-lg mb-5"><b>Назва:</b> <br>{{ $fundraising->name }}</span>
                  <span class="text-lg mb-5"><b>Опис:</b><br>{{ $fundraising->description }}</span>
                  <span class="text-lg"><b>Ціль:</b> {{ number_format($fundraising->max_amount) }} грн</span>
                  <span class="text-lg"><b>Наявна сумма:</b> {{ number_format($fundraising->current_amount) }} грн</span>
                  <span class="text-lg mb-5"><b>Залишилось:</b> {{ number_format($fundraising->max_amount - $fundraising->current_amount) }} грн</span>
                  @if($fundraising->status && $fundraising->max_amount != $fundraising->current_amount && $fundraising->max_amount > $fundraising->current_amount)
                    <a target="blank" href="#" class="max-w-xs py-2 rounded text-white bg-green-800 hover:bg-green-700 text-center">Пожертвувати</a>
                  @else
                    <span class="max-w-xs py-2 rounded text-white bg-red-800 text-center">Збір закрито</span>
                  @endif
                </div>
              @endforeach
            </div>
          @else
            Данний користувач не має активних зборів коштів
          @endif
        </div>

        <x-jet-section-border />
        
        <div class="mt-10 sm:mt-0">
          <h1 class="font-semibold text-xl">{{ __('Повідомлення') }}</h1>
          <!-- Chat Window -->
          <div class="flex flex-col justify-between">
              <div class="bg-white rounded first-letter p-5 my-10 flex flex-col shadow-md">
                <form action="{{ route('chat_send_message', ['id' => $chat_id]) }}" class="flex flex-col" method="post">
                  @csrf
                  @foreach($messages as $message)
                    <!-- TODO НЕ ПРАВИЛЬНО ВИВОДЯТЬСЯ ІМЕНА ( ВИВОДЕ ПОТОЧНЕ ІМЯ ЗАЛОГІНЕНОГО КОРИСТУВАЧА, ДОБАВИТИ ЖИВЕ ОБНОВЛЕННЯ ) -->
                    @if($message->from == Auth::user()->id)
                      <span class="mb-5 rounded border border-blue  -500 py-1 px-5">{{ Auth::user()->name }}: {{ $message->text }}</span>
                    @else
                      <span class="mb-5 rounded border border-gray-500 py-1 px-5">{{ $user->name }}: {{ $message->text }}</span>
                    @endif
                  @endforeach
                  
                  <div class="flex flex-row justify-between">
                    <input name="text" type="text" class="rounded border w-full mr-5" placeholder="Напишіть щось">
                    <button type='submit' class="py-2 px-5 text-white rounded bg-green-800 hover:bg-green-700">Надіслати</button>
                  </div>
                </form>
              </div>
          </div>        
        </div>
    </div>
</x-app-layout>
