<div class="movie trending-list time-window-selector">
    <x-bladewind.card title="{{ __('Trending')}}">
        @foreach ($getTimeWindowOptionList() as $timeWindowOption)
            <x-bladewind.button size="tiny">
                {{ $timeWindowOption->label()}}
            </x-bladewind.button>
        @endforeach
    </x-bladewind.card>
</div>
