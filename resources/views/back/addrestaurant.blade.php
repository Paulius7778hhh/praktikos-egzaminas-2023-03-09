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

                    <form action="{{route('admin-store')}}" method="post">

                        <div class="container">
                            <div class="row">

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Restaurant title</label>

                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">


                                    </div>
                                </div>



                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>

                                        <input type="text" class="form-control" name="address" value="{{old('address')}}">


                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Code</label>
                                        <input type="text" class="form-control" name="code" value="{{old('code')}}">


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
