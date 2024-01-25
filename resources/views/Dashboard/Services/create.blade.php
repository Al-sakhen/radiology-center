@extends('Dashboard.layouts.layouts')
@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>New Service</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 my-2">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Name..." class="form-control" required>

                                @error('name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                            </div>


                            <div class="form-group col-md-6 my-2">
                                <label for="description" class="">Description</label>
                                <input id="description" type="text" name="description" value="{{ old('description') }}"
                                    placeholder="Description..." class="form-control" required>

                                @error('description')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group col-md-6 my-2">

                                <label for="image" class="">Image</label>
                                <input id="image" type="file" name="image" class="form-control" required
                                    accept="image/*">
                                @error('image')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                            </div>


                        </div>

                        <input type="submit" value="Add" class="mt-4 btn btn-primary">
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
