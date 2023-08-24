@php
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $movieTrendingListPaginated */
    $movieTrendingListPaginated = $getMovieTrendingListPaginated();
@endphp

<div class="movie trending-list">
    <x-bladewind.table>
        <x-slot name="header">
            <th>{{ __('Name')}}</th>
            <th>{{ __('Image')}}</th>
            <th>{{ __('Rating')}}</th>
        </x-slot>

        @foreach ($movieTrendingListPaginated as $movie)
            <tr>
                <td>
                    {{$movie->getOriginalTitle()}}
                </td>
                <td>
                    <img src="{{$getImageUrl($movie)}}" />
                </td>
                <td>
                    {{$movie->getVoteAverageValue()}}
                </td>
            </tr>
        @endforeach
    </x-bladewind.table>
</div>

<div class="p-6">
    {{ $movieTrendingListPaginated->links() }}
</div>
