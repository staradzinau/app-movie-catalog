<div class="movie view container">
    <x-nav-link :href="$getBackUrl()" >
        {{ __('Return') }}
    </x-nav-link>
    <x-bladewind.card>
        <div class="flex">
            <img src="{{$getImageUrl()}}" class="object-contain"/>

            <x-bladewind.list-view>
                <x-bladewind.list-item>
                    <div class="text-sm font-medium text-slate-900">
                        {{ __('Name:')}}
                    </div>
                    <div class="text-sm text-slate-500 ml-2">
                        {{ $getMovie()->getOriginalTitle() }}
                    </div>
                </x-bladewind.list-item>
                <x-bladewind.list-item>
                    <div class="text-sm font-medium text-slate-900">
                        {{ __('Rating:')}}
                    </div>
                    <div class="text-sm text-slate-500  ml-2">
                        {{ $getMovie()->getVoteAverageValue() }}
                    </div>
                </x-bladewind.list-item>
                <x-bladewind.list-item>
                    <div class="text-sm font-medium text-slate-900">
                        {{ __('Tagline:')}}
                    </div>
                    <div class="text-sm text-slate-500  ml-2">
                        {{ $getMovie()->getTagline() }}
                    </div>
                </x-bladewind.list-item>
                <x-bladewind.list-item>
                    <div class="text-sm font-medium text-slate-900">
                        {{ __('Overview:')}}
                    </div>
                    <div class="text-sm text-slate-500 ml-2">
                        {{ $getMovie()->getOverview() }}
                    </div>
                </x-bladewind.list-item>
                <x-bladewind.list-item>
                    <div class="text-sm font-medium text-slate-900">
                        {{ __('Release date:')}}
                    </div>
                    <div class="text-sm text-slate-500  ml-2">
                        {{ $getMovie()->getDateOfRelease()->toFormattedDayDateString() }}
                    </div>
                </x-bladewind.list-item>
                @if ($getMovie()->getHomepageUrl())
                    <x-bladewind.list-item>
                        <x-nav-link :href="$getMovie()->getHomepageUrl()" >
                            {{ __('Movie homepage') }}
                        </x-nav-link>
                    </x-bladewind.list-item>
                @endif
            </x-bladewind.list-view>
        </div>
    </x-bladewind.card>
</div>
