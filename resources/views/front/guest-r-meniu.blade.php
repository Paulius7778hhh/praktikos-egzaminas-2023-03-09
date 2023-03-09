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
                    none
                    @endif
                    <div class="card-body">
                        <p class="card-text">Dish: {{ $dish->title }} Price: </p>
                        <p class="card-text">{{$dish->description}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action=" " method="get">

                                    <button class="btn btn-outline-secondary" type="submit">buy</button>

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
