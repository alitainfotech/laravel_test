<div>

    @if($successMessage)
        <h3 class="text-green-600">{{ $successMessage }}</h3>
    @endif

    {{-- Tab buttons --}}
    <ul class="tabs flex flex-col sm:flex-row">
        <li wire:click="$set('activeTab', 'page-one')" class="{{ $activeTab === 'page-one' ? 'active text-indigo-400 border-indigo-400' : 'text-gray-600 border-grey-500' }} tab text-gray-600 p-4 block focus:outline-none border-b-2 cursor-pointer">
            Page One
        </li>
        <li wire:click="$set('activeTab', 'page-two')" class="{{ $activeTab === 'page-two' ? 'active text-indigo-400 border-indigo-400' : 'text-gray-600 border-grey-500' }} tab p-4 block focus:outline-none border-b-2 cursor-pointer">
            Page Two
        </li>
    </ul>

    <div>
        @if ($activeTab === 'page-one')
        {{-- Page One --}}
        <div>
            <div class="p-6">
                {{-- Name --}}
                <label for="case-name" class="block text-sm font-medium leading-6 text-gray-900">Case Name</label>
                <div class="mt-2">
                    <input wire:change="saveData" wire:model="caseName" type="text" id="case-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Case Name" required>
                    @error('caseName') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                {{-- Maker --}}
                <div class="mt-6">
                    <label for="maker" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Maker</label>
                    <div class="mt-2">
                        <select wire:change="saveData" wire:model="maker" id="maker" name="maker" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            <option selected>Select Vehicle Maker</option>
                            <option value="bmw">Bmw</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="jeep">Jeep</option>
                        </select>
                    @error('maker') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                {{-- Model --}}
                @if ($maker)
                <div class="mt-6">
                    <label for="model" class="mt-6 block text-sm font-medium leading-6 text-gray-900">Vehicle Model</label>
                    <div class="mt-2">
                    <select wire:change="saveData" wire:model="model" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                        <option selected>Select Vehicle Model</option>
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
                    @error('model') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif
                </div>

                {{-- Milage --}}
                <div class="mt-6">
                    <label for="milage" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Milage</label>
                    <div class="mt-2">
                        <input wire:change="saveData" wire:model="milage" type="Number" id="milage" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Vehicle Milage" required>
                        @error('milage') <span class="error text-red-500">{{ $message }}</span> @enderror
                        @if ($milage > 99)
                            <span class="error text-red-500">We can't insure your car</span>
                        @endif
                    </div>
                </div>

                {{-- Buying Date --}}
                <div class="mt-6">
                    <label for="buying-date" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Buying Date</label>
                    <div class="mt-2">
                        <input wire:change="saveData" wire:model="buyingDate" type="date" id="buying-date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Purchase Date" required>
                        @error('buyingDate') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Next button --}}
                <div class="mt-6 flex items-center justify-end">
                    <button wire:click="nextTab" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >
                        Next
                    </button>
                </div>
            </div>
            {{-- End page one tab --}}
        @elseif ($activeTab === 'page-two')
        {{-- Page Two --}}
        <div>
            <div class="p-6">
                {{-- Color --}}
                <div class="mt-6">
                    <label for="maker" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Color</label>
                    <div class="mt-2">
                    <select wire:change="saveData" wire:model="color" id="maker" name="maker" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                        <option value="" selected>Select Vehicle color</option>
                        <option value="white">white</option>
                        <option value="black">Black</option>
                        <option value="silver">Silver</option>
                        <option value="other">Other</option>
                    </select>
                    @error('color') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Drive Train --}}
                @if($model === 'grand-cherokee')
                    <div class="mt-6">
                        <label for="driveTrain" class="block text-sm font-medium leading-6 text-gray-900">Drive Train</label>
                        <div class="mt-2">
                        <select wire:change="saveData" wire:model="driveTrain" id="driveTrain" name="driveTrain" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            <option value="2X4">2 X 4</option>
                            <option value="4X4">4 X 4</option>
                        </select>
                        </div>
                    </div>
                    @error('driveTrain') <span class="error text-red-500">{{ $message }}</span> @enderror
                @endif

                {{-- Image --}}
                <div class="mt-6">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 uppercase">jpg, jpeg, png, bmp, gif, svg, or webp</p>
                            </div>
                            <input id="image" type="file" class="hidden" wire:model="image" wire:change="saveData"/>
                        </label>
                    </div>
                    @error('image') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                {{-- Get Quote button --}}
                <div class="mt-6 flex items-center justify-end">
                    <button wire:click="getQuote" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Get Quote
                    </button>
                </div>
            </div>
        </div>
        {{-- End tab page two --}}
        @endif
    </div>
</div>

