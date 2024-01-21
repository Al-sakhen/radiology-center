@extends('Dashboard.layouts.layouts')
@section('content')
<div class="row layout-top-spacing">
    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>New Patient</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <form method="post" action="{{ route('admin.patient.store') }}">
                            @csrf

                            <div class="form-group my-2">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name..." class="form-control" required>

                            </div>

                            @error('name')

                            <p class="text text-danger"> {{ $message }} </p>
                            @enderror

                            <div class="form-group my-2">
                                <label for="id" class="">ID</label>
                                <input id="id" type="text" name="national_number" placeholder="national number..."  value="{{ old('id') }}"  class="form-control" required>

                            </div>

                            @error('national_number')

                            <p class="text text-danger"> {{ $message }} </p>
                            @enderror


                            <div class="form-group my-2">
                                <label for="phone" class="">Phone</label>
                                <input id="phone" type="text" name="phone" placeholder="Phone..."  value="{{ old('phone') }}"  class="form-control" required>

                            </div>

                            @error('phone')

                            <p class="text text-danger"> {{ $message }} </p>
                            @enderror

                            <div class="form-group my-2">

                                <label for="dob" class="">DOB</label>
                                <input id="dob" type="date" name="dob"  value="{{ old('dob') }}" class="form-control" required>

                        </div>
                        @error('dob')

                        <p class="text text-danger"> {{ $message }} </p>
                        @enderror

                        <div class="form-group my-2">

                            <label for="address" class="">address</label>
                            <input id="address" type="text" name="address"   value="{{ old('address') }}"  placeholder="Password..." class="form-control" required>

                    </div>
                    @error('address')

                    <p class="text text-danger"> {{ $message }} </p>
                    @enderror




                            <input type="submit" name="txt" value="Add" class="mt-4 btn btn-primary">




                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection


