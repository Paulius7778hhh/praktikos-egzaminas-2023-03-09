@extends('back.app')
@section('content')
<div class="album py-5">
    @if (Session::has('status'))
    <h2 class="alert alert-success" style="font-size: 30px;">{{ Session::pull('status') }}</h2>

    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="list-group-item" style="font-size: 30px;">{{ $error }}</li>


            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {{-- foreach begin--}}
            @forelse($restaurants as $key => $restaurant)




            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        {{--list descriptions--}}



                        <li class="list-group-item ">Title:
                            {{ $restaurant->title }}</li>


                        <li class="list-group-item ">Address:
                            {{ $restaurant->address }} </li>


                        <li class="list-group-item ">
                            Code: {{ $restaurant->code }}</li>






                        {{-- --}}

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ route('admin-restaurant-menu', $restaurant) }}" method="get">



                                    <button class="btn btn-sm btn-outline-secondary">View menu {{ $restaurant->dishes()->count() }}</button>




                                </form>
                                <form action="{{ route('admin-edit', $restaurant) }}" method="get">


                                    <button class="btn btn-sm btn-outline-warning">Edit </button>



                                </form>
                                <form action="{{ route('admin-delete', $restaurant) }}" method="post">
                                    <button class="btn btn-sm btn-outline-danger">Delete </button>
                                    @csrf @method('delete')
                                </form>


                            </div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu list
                                </button>
                                {{-- dropdown--}}
                                <ul class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton1">{{--
                                            @forelse($frestaurant->dishes as $mdish)
                                                <li class="dropdown-item list-group-item-dark">
                                                    {{ $mdish->title }}{{ $mdish->price }}</li>
                                    @empty
                                    <li class="dropdown-item list-group-item-dark"></li>
                                    @endforelse
                                    --}}
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th scope="col">Dish</th>
                                                <th scope="col">Price</th>

                                            </tr>
                                        </thead>
                                        {{-- @forelse($frestaurant->dishes as $mdish)--}}


                                        <tbody>
                                            <tr>

                                                <td>{{--{{ $mdish->title }}--}}</td>
                                                <td>{{--{{ $mdish->price }}--}}</td>
                                            </tr>

                                        </tbody>
                                        {{-- @empty --}}


                                        <li class="dropdown-item list-group-item-dark"></li>
                                        {{-- @endforelse --}}


                                    </table>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">


                        <div class="card-body">

                        </div>
                    </div>
                </div>
                @endforelse


            </div>
        </div>
        @endsection
