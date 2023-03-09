@extends('back.app')

@section('content')

<div class="album py-5 ">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse($restaurant->dishes as $key => $dish)
            <div class="col">
                <div class="card shadow-sm">
                    @if (isset($dish->picture))
                    <img src="{{ asset($dish->picture) }}">
                    @else
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    @endif
                    <div class="card-body">
                        <p class="card-text">Dish: {{ $dish->title }} Price: </p>
                        <p class="card-text">{{$dish->description}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ route('admin-dish-edit', $dish) }} " method="get">

                                    <button class="btn btn-outline-secondary" type="submit">Edit</button>

                                </form>
                                <form action="{{ route('admin-dish-delete', $dish) }}" method="post">
                                    <button class="btn  btn-outline-danger">Delete </button>
                                    @csrf @method('delete')
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Empty
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
