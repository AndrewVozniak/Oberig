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
          <h1 class="text-lg">Загальна кількість всіх зборів: {{ $fundraisings_count }}</h1>
          
          @if(Auth::user()->id == $user->id)
            <x-jet-section-border />
            <h2 class="text-xl mb-5">Створення збору</h2>

            <form class="flex flex-col justify-center" action="{{ route('fundraisingCreate') }}" method="post">
              @csrf
              <div class="flex flex-col justify-between">
                <input id="name" class="rounded border-none mb-5" type="text" name="name" placeholder="Введіть назву збору">
                <textarea class="border-none shadow rounded mb-5" name="description" id="description" cols="30" rows="10" placeholder="Введіть опис збору"></textarea>
                
                <div class="flex flex-row justify-between items-center mb-5">
                  <input type="number" name="max_ammount" class="rounded border-none w-10/12" placeholder="Введіть сумму яку необхідно зібрати">
                  <button class="text-white rounded py-2 px-5 ml-5 bg-purple-800 hover:bg-purple-700">Створити збір</button>
                </div>
              </div>
            </form>
            <x-jet-section-border />
          @endif


          @if($fundraisings->isNotEmpty())
            <div class="flex flex-col justify-between">
              @foreach($fundraisings as $fundraising)
                @if($fundraising->status)
                  <div class="bg-white rounded first-letter p-5 my-5 flex flex-col shadow-md">
                    <span class="text-lg mb-5"><b>Назва:</b> <br>{{ $fundraising->name }}</span>
                    <span class="text-lg mb-5"><b>Опис:</b><br>{{ $fundraising->description }}</span>
                    <span class="text-lg"><b>Ціль:</b> {{ number_format($fundraising->max_amount) }} грн</span>
                    <span class="text-lg"><b>Наявна сумма:</b> {{ number_format($fundraising->current_amount) }} грн</span>
                    <span class="text-lg mb-5"><b>Залишилось:</b> {{ number_format($fundraising->max_amount - $fundraising->current_amount) }} грн</span>

                    <div class="flex flex-row w-full justify-between">
                      @if($fundraising->status && $fundraising->max_amount != $fundraising->current_amount && $fundraising->max_amount > $fundraising->current_amount)
                        <a href="#" class="px-5 py-2 rounded text-white bg-green-800 hover:bg-green-700 mr-5">Пожертвувати</a>
                      @else
                        <span class="px-5 py-2 rounded text-white bg-red-800 text-center mr-5">Збір закрито</span>
                      @endif

                      @if(Auth::user()->id == $fundraising->foundator_id && $fundraising->current_amount == 0)
                        <form action="{{ route('fundraisingDelete', ['id' => $fundraising->id]) }}" method="post">
                          @csrf
                          <button type="submit" class="px-5 py-2 text-white rounded bg-red-800 hover:bg-red-700">Видалити</button>
                        </form>
                      @endif
                    </div>
                  </div>
                @endif
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

                  @if($type == "foundator")
                    @if($chats->isNotEmpty())
                      <div class="flex flex-row flex-wrap justify-start">
                        @foreach($chats as $chat)
                          <div class="flex flex-col border rounded shadow px-5 py-5 w-1/6 mb-5 mr-5">
                            <div class="title text-lg font-semibold">{{ $chat->name }}</div>
                            <a class="title text-md font-semibold bg-green-800 hover:bg-green-700 text-white rounded transition px-2 py-2 text-center mt-5" href="{{ route('chat', ['profile_id' => Auth::user()->id, 'chat_id' => $chat->id]) }}">Перейти в чат</a>
                          </div>
                        @endforeach
                      </div>
                    @else
                      <span>У вас немає розпочатих чатів</span>
                    @endif
                  @else
                    <!-- $user->name  -->
                    <div class="flex flex-col justify-between">
                      @if($messages->isEmpty())
                        <span class="mb-5">Розпочніть діалог</span>
                      @else
                        <div id="chat_messages" class="flex flex-col overflow-auto h-96 mb-5 px-5">
                          @foreach($messages as $message)
                            @if(Auth::user()->id != $message->from)
                              <span class="border border-5 px-5 py-2 mb-5 rounded border-blue-600">Вам: {{ $message->text }}</span>
                            @else
                              <span class="border border-5 px-5 py-2 mb-5 rounded">Ви: {{ $message->text }}</span>
                            @endif
                          @endforeach
                        </div>

                        <script type="text/javascript">
                          let messages = document.getElementById("chat_messages");

                          messages.scrollTop = messages.scrollHeight;
                        </script>
                      @endif
                      


                      <div class="flex flex-row">
                        @foreach($chats as $chat)
                          <input type="hidden" value="{{ $chat->id }}" name="chat_id">
                        @endforeach

                        <input name="text" type="text" class="rounded border w-full mr-5" placeholder="Напишіть щось">
                        <button type='submit' class="py-2 px-5 text-white rounded bg-green-800 hover:bg-green-700">Надіслати</button>
                      </div>
                    </div>
                  @endif


                </form>
              </div>
          </div>        
        </div>
    </div>
</x-app-layout>
