<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($fundraisings as $fundraising)
                <div class="bg-white rounded first-letter p-5 my-5 flex flex-col shadow-md">
                    <span class="text-lg mb-5"><b>Назва:</b> <br>{{ $fundraising->name }}</span>
                    <span class="text-lg mb-5"><b>Опис:</b><br>{{ $fundraising->description }}</span>
                    <span class="text-lg"><b>Ціль:</b> {{ number_format($fundraising->max_amount) }} грн</span>
                    <span class="text-lg"><b>Наявна сумма:</b> {{ number_format($fundraising->current_amount) }} грн</span>
                    <span class="text-lg mb-5"><b>Залишилось:</b> {{ number_format($fundraising->max_amount - $fundraising->current_amount) }} грн</span>
                    @if($fundraising->status && $fundraising->max_amount != $fundraising->current_amount && $fundraising->max_amount > $fundraising->current_amount)
                    <a href="#" class="max-w-xs py-2 rounded text-white bg-green-800 hover:bg-green-700 text-center">Пожертвувати</a>
                    @else
                    <span class="max-w-xs py-2 rounded text-white bg-red-800 text-center">Збір закрито</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>