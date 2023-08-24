<div class="movie trending-list time-window-selector">
    <x-bladewind.card title="{{ __('Trending')}}">
        @foreach ($getTimeWindowOptionList() as $timeWindowOption)
            <x-bladewind.button
                size="tiny"
                disabled="{{$isOptionAlreadyApplied($timeWindowOption)}}"
                type="{{$getButtonType($timeWindowOption)}}"
                onclick="window.location.href='{{ $getUrlToApplyOption($timeWindowOption) }}';"
            >
                {{ $timeWindowOption->label()}}
            </x-bladewind.button>
        @endforeach
    </x-bladewind.card>
</div>
