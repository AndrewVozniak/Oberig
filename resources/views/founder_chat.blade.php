<x-app-layout>  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="font-semibold text-xl">{{ $chat->name }}</h1>
    <!-- Chat Window -->
    <div class="flex flex-col justify-between">
        <div class="bg-white rounded first-letter p-5 my-10 flex flex-col shadow-md">
          <form action="{{ route('chat_send_message', ['id' => $profile_id]) }}" method="post">
            @csrf

            <!-- $user->name  -->
            <div class="flex flex-col justify-between">
              <div id="chat_messages" class="flex flex-col overflow-auto h-96 mb-5 px-5">
                @if($messages->isEmpty())
                  <span class="mb-5">Розпочніть діалог</span>
                @else
                  @foreach($messages as $message)
                    @if(Auth::user()->id != $message->from)
                      <span class="border border-5 px-5 py-2 mb-5 rounded border-blue-600">Вам: {{ $message->text }}</span>
                    @else
                      <span class="border border-5 px-5 py-2 mb-5 rounded">Ви: {{ $message->text }}</span>
                    @endif
                  @endforeach
                @endif
              </div>

              <div class="flex flex-row">
                <input type="hidden" value="{{ $chat->id }}" name="chat_id">

                <input name="text" type="text" class="rounded border w-full mr-5" placeholder="Напишіть щось">
                <button type='submit' class="py-2 px-5 text-white rounded bg-green-800 hover:bg-green-700">Надіслати</button>
              </div>
            </div>  
            
          </form>
          <a href="{{ route('user_public_profile_page', $profile_id) }}" class="text-center px-5 py-2 text-white rounded bg-green-800 hover:bg-green-700 transition mt-5 max-w-xs self-center">Назад до профілю</a>

          <script type="text/javascript">
            let messages = document.getElementById("chat_messages");

            messages.scrollTop = messages.scrollHeight;
          </script>
        </div>
    </div>        
  </div>
</x-app-layout>