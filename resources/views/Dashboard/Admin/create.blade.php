@extends('Dashboard.layouts.layouts')
@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing card">
            <div class="card-body">
                <div class="widget-header pb-3">
                    <h4>New Employee</h4>
                </div>

                <div>
                    <div class="">
                        <form method="post" action="{{ route('admin.store') }}">
                            @csrf
                            <div class="row ">

                                <div class="form-group col-md-6 mb-3">
                                    <label for="name" class="">Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Name..." class="form-control" required>

                                </div>

                                @error('name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                                <div class="form-group col-md-6 mb-3">

                                    <label for="email" class="">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email..." class="form-control" required>

                                </div>
                                @error('email')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                                <div class="form-group  col-md-6 mb-3">

                                    <label for="password" class="">Password</label>
                                    <input id="password" type="password" name="password" value="{{ old('password') }}"
                                        placeholder="Password..." class="form-control" required>

                                </div>
                                @error('password')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                                <div class="form-group col-md-6 mb-3">
                                    <label for="phone" class="">Phone</label>
                                    <input id="phone" type="text" name="phone" placeholder="Phone..."
                                        value="{{ old('phone') }}" class="form-control" required>

                                </div>

                                @error('phone')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group mt-3">

                                <label> Role : </label>
                                <div class="d-flex gap-4 flex-wrap">
                                    @foreach ($roles as $role)
                                        <div>
                                            <label for="role-{{ $role->id }}" class="">{{ $role->name }}</label>
                                            <input id="role-{{ $role->id }}" type="checkbox" name="role_ids[]"
                                                value="{{ $role->id }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <input type="submit" name="txt" value="Add" class="mt-4 btn btn-primary">




                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
