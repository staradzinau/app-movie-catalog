@php
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $movieTrendingListPaginated */
    $movieTrendingListPaginated = $getMovieTrendingListPaginated();
@endphp

<div class="movie trending-list">
    <x-bladewind.table>
        <x-slot name="header">
            <th>{{ __('Name')}}</th>
        </x-slot>

        @foreach ($movieTrendingListPaginated as $movie)
            <tr>
                <td>
                    {{$movie->getOriginalTitle()}}
                </td>
            </tr>
        @endforeach
    </x-bladewind.table>
</div>

<div class="p-6">
    {{ $movieTrendingListPaginated->links() }}
</div>
