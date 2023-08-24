@php
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $movieTrendingListPaginated */
    $movieTrendingListPaginated = $getMovieTrendingListPaginated();
@endphp

@if ($movieTrendingListPaginated->total() > 0)
    <div class="movie trending-list container">

        <x-movie.trending-list.grid.time-window />

        <div class="trending-list grid">
            <x-bladewind.table>
                <x-slot name="header">
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Image')}}</th>
                    <th>{{ __('Rating')}}</th>
                </x-slot>

                @foreach ($movieTrendingListPaginated as $movieTrendingListItem)
                    <tr>
                        <td>
                            {{$movieTrendingListItem->movie->getOriginalTitle()}}
                        </td>
                        <td>
                            <img src="{{$getImageUrl($movieTrendingListItem)}}" />
                        </td>
                        <td>
                            {{$movieTrendingListItem->movie->getVoteAverageValue()}}
                        </td>
                    </tr>
                @endforeach
            </x-bladewind.table>
        </div>

        <div class="p-6">
            {{ $movieTrendingListPaginated->links() }}
        </div>
    </div>
@else
    <x-bladewind.empty-state
        message="No data about trending movies loaded. Please, check the readme for details">
    </x-bladewind.empty-state>
@endif
