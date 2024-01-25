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

                    <form method="post" action="{{ route('admin.patient.update' , $patient->id) }}">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6 my-2">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name"
                                    value="{{ old('name', $patient->name) }}" placeholder="Name..." class="form-control"
                                    required>

                                @error('name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                            </div>

                            <div class="form-group col-md-6 my-2">
                                <label for="id" class="">ID</label>
                                <input id="id" type="text" name="national_number" placeholder="national number..."
                                    value="{{ old('national_number', $patient->national_number) }}" class="form-control"
                                    required>

                                @error('national_number')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                            </div>


                            <div class="form-group col-md-6 my-2">
                                <label for="phone" class="">Phone</label>
                                <input id="phone" type="text" name="phone" placeholder="Phone..."
                                    value="{{ old('phone', $patient->phone) }}" class="form-control" required>

                                @error('phone')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group col-md-6 my-2">

                                <label for="dob" class="">DOB</label>
                                <input id="dob" type="date" name="dob" value="{{ old('dob', $patient->DOB) }}"
                                    class="form-control" required>
                                @error('dob')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                            </div>

                            <div class="form-group col-md-6 my-2">
                                <label for="address" class="">address</label>
                                <input id="address" type="text" name="address"
                                    value="{{ old('address', $patient->address) }}" placeholder="Password..."
                                    class="form-control" required>
                                @error('address')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 my-2">
                                <label for="gender" class="">gender</label>

                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="male" @selected($patient->gender == 'male')>
                                        male
                                    </option>
                                    <option value="female" @selected($patient->gender == 'female')>
                                        female
                                    </option>
                                </select>

                                @error('gender')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <input type="submit" value="Update" class="mt-4 btn btn-primary">
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
