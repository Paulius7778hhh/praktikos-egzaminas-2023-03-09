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

                    <form action="{{route('admin-update',$restaurant)}}" method="post">


                        <div class="container">
                            <div class="row">

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Restaurant title</label>

                                        <input type="text" class="form-control" name="edit_title" value="{{old('edit_title',$restaurant->title)}}">




                                    </div>
                                </div>



                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>

                                        <input type="text" class="form-control" name="edit_address" value="{{old('edit_address',$restaurant->address)}}">



                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Code</label>
                                        <input type="text" class="form-control" name="edit_code" value="{{old('edit_code',$restaurant->code)}}">



                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-secondary">Edit</button>
                        @method('put') @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
