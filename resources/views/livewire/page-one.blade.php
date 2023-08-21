<div>
    <div class="p-6">
        <label for="case-name" class="block text-sm font-medium leading-6 text-gray-900">Case name</label>
        <div class="mt-2">
            <input wire:model="case_name" type="text" id="case-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <div class="mt-6">
            @livewire('maker')
        </div>

        <div class="mt-6">
            <label for="milage" class="block text-sm font-medium leading-6 text-gray-900">Milage</label>
            <div class="mt-2">
                <input wire:model="milage" type="Number" id="milage" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="mt-6">
            <label for="buying-date" class="block text-sm font-medium leading-6 text-gray-900">Buying Date</label>
            <div class="mt-2">
                <input wire:model="date" type="date" id="buying-date" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    </div>
</div>

