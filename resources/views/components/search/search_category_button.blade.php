<div class="mb-5">
    <h3 class="mb-4 font-semibold text-gray-900">{{ $slot }}</h3>
    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex flex-row">
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center pl-3">
                <input wire:model="funds_checkbox" name="funds" id="vue-checkbox-list" type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="vue-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Фонди</label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center pl-3">
                <input wire:model="fundraisings_checkbox" name="fundraisings" id="react-checkbox-list" type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="react-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Збори</label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center pl-3">
                <input wire:model="users_checkbox" name="users" id="angular-checkbox-list" type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="angular-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Користувачі</label>
            </div>
        </li>
    </ul>
</div>