<div>
    <div class="sm:col-span-3">
        <label for="maker" class="block text-sm font-medium leading-6 text-gray-900">Maker</label>
        <div class="mt-2">
          <select wire:model="color" id="maker" name="maker" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option value="white">white</option>
            <option value="black">Black</option>
            <option value="silver">Silver</option>
            <option value="other">Other</option>
          </select>
        </div>
    </div>

    @if($color === 'other')
        <div>
            <div class="sm:col-span-4">
                <label for="other" class="mt-6 block text-sm font-medium leading-6 text-gray-900">Color Name</label>
                <div class="mt-2">
                <input wire:model="otherColor" type="text" name="other_color" id="other" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
    @endif
</div>
