<div>
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
            <div class="p-6">
                @livewire('page-one')
            </div>
        @elseif ($activeTab === 'page-two')
        <div class="p-6">
            @livewire('page-two')
            <div class="mt-6 flex items-center justify-end">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Get Quote
                </button>
            </div>
        </div>
        @endif
    </div>
</div>

