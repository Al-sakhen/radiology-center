@extends('Dashboard.layouts.layouts')
@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing card ">
            <div class="card-body">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Update Admin</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <form method="post" action="{{ route('admin.update', $admin->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name" value="{{ $admin->name }}"
                                    placeholder="Name..." class="form-control" required>

                            </div>

                            @error('name')
                                <p class="text text-danger"> {{ $message }} </p>
                            @enderror
                            <div class="form-group my-3">

                                <label for="email" class="">Email</label>
                                <input id="email" type="email" name="email" value="{{ $admin->email }}"
                                    placeholder="Email..." class="form-control" required>

                            </div>
                            @error('email')
                                <p class="text text-danger"> {{ $message }} </p>
                            @enderror


                            <div class="form-group">
                                <label for="phone" class="">Phone</label>
                                <input id="phone" type="text" name="phone" placeholder="Phone..."
                                    value="{{ $admin->phone }}" class="form-control" required>

                            </div>

                            @error('phone')
                                <p class="text text-danger"> {{ $message }} </p>
                            @enderror
                            <input type="submit" name="txt" value="update" class="mt-4 btn btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
