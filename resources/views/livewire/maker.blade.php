<div>
        <label for="maker" class="block text-sm font-medium leading-6 text-gray-900">Maker</label>
        <div class="mt-2">
          <select wire:model="maker" id="maker" name="maker" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option value="bmw">Bmw</option>
            <option value="mercedes">Mercedes</option>
            <option value="jeep">Jeep</option>
          </select>
        </div>

    @if ($maker)
    <div class="mt-6">
        <label for="model" class="mt-6 block text-sm font-medium leading-6 text-gray-900">Model</label>
        <div class="mt-2">
          <select class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            @if ($maker === 'bmw')
                <option value="3-series">3 Series</option>
                <option value="5-series">5 Series</option>
                <option value="7-series">7 Series</option>
            @elseif ($maker === 'mercedes')
                <option value="c-class">C Class</option>
                <option value="e-class">E Class</option>
                <option value="s-class">S Class</option>
            @elseif ($maker === 'jeep')
            <option value="wrangler">Wrangler</option>
            <option value="grand-cherokee">Grand Cherokee</option>
            @endif
        </select>
        </div>
      </div>
    @endif

</div>
