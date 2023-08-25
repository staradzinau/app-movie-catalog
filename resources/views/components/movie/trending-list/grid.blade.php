@php
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $movieTrendingListPaginated */
    $movieTrendingListPaginated = $getMovieTrendingListPaginated();
@endphp

@if ($movieTrendingListPaginated->total() > 0)
    <div class="movie trending-list container">

        <x-movie.trending-list.grid.time-window :currentTimeWindow="$getCurrentTimeWindow()"/>

        <div class="trending-list grid">
            <x-bladewind.table striped="true">
                <x-slot name="header">
                    <th>
                        <div class="grid place-items-center">
                            {{ __('Name')}}
                        </div>
                    </th>
                    <th>
                        <div class="grid place-items-center">
                            {{ __('Image')}}
                        </div>
                    </th>
                    <th>
                        <div class="grid place-items-center">
                            {{ __('Rating')}}
                        </div>
                    </th>
                    <th></th>
                </x-slot>

                @foreach ($movieTrendingListPaginated as $movieTrendingListItem)
                    <tr>
                        <td>
                            <div class="grid place-items-center">
                                {{$movieTrendingListItem->movie->getOriginalTitle()}}
                            </div>
                        </td>
                        <td>
                            <div class="grid place-items-center">
                                <img src="{{$getImageUrl($movieTrendingListItem)}}" />
                            </div>
                        </td>
                        <td>
                            <div class="grid place-items-center">
                                {{$movieTrendingListItem->movie->getVoteAverageValue()}}
                            </div>
                        </td>
                        <td>
                            <div class="grid place-items-center">
                                <x-nav-link :href="$getMovieViewUrl($movieTrendingListItem)" >
                                    {{ __('View details') }}
                                </x-nav-link>
                            </div>
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
