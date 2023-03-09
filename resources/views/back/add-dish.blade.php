@extends('back.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    {{-- form --}}

                    <form action="{{route('admin-dish-store')}}" method="post" enctype="multipart/form-data">



                        <div class="container">
                            <div class="row">

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Dish title</label>

                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">


                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Goes to restaurant</label>
                                        <select class="form-select" name="restaurant_id">

                                            <option selected>Select restaurant</option>
                                            {{-- choose from list --}}

                                            @foreach($restaurants as $key => $restaurant)

                                            <option value="{{ $restaurant->id }}" @if($restaurant->id == old('restaurant_id')) selected @endif>{{$restaurant->title}}</option>


                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Dish picture</label>
                                        <input type="file" class="form-control" name="picture">

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">description</label>

                                        <textarea class="form-control" type="text" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>




                                    </div>
                                </div>







                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary">Add New</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
