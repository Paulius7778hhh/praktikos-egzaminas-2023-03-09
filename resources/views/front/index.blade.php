@extends('front.app')
@section('content')
<div class="album py-5">

    </ul>
</div>


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
                            <form action="{{ route('user-restaurant-menu-guest', $restaurant) }}" method="get">




                                <button class="btn btn-sm btn-outline-secondary">View menu </button>




                            </form>



                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu list
                            </button>
                            {{-- dropdown--}}
                            <ul class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton1">{{--
                                            {{--forelse--}}
                                <li class="dropdown-item list-group-item-dark">
                                    {{--list-}}</li>
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



                                    <tbody>
                                        <tr>

                                            <td>{{--{{ li }}--}}</td>
                                            <td>{{--{{ li }}--}}</td>
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
