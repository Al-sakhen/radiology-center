@extends('Dashboard.layouts.layouts')

@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create Report</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <form method="post" action="{{ route('admin.patient.report.store') }}">
                        @csrf
                        <div class="row">

                            <div class="form-group my-2 col-md-6">
                                <label for="name" class="">center name</label>
                                <input id="name" type="text" name="center_name"
                                    value="{{ old('center_name', $public_center_informations->name) }}"
                                    placeholder="Name..." class="form-control" required>

                                @error('center_name')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>




                            <div class="form-group my-2 col-md-6">
                                <label for="center_address" class="">Center address</label>
                                <input id="center_address" type="text" name="center_address"
                                    placeholder="center address..."
                                    value="{{ old('center_address', $public_center_informations->address) }}"
                                    class="form-control" required>

                                @error('center_address')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="form-group my-2 col-md-6">

                                <label for="center_phone" class="">Center phone </label>
                                <input id="center_phone" type="text" name="center_phone"
                                    value="{{ old('center_phone', $public_center_informations->phone) }}"
                                    placeholder="Password..." class="form-control" required>

                                @error('center_phone')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="form-group my-2 col-md-6">
                                <label for="doctor_name" class="">Doctor name</label>
                                <input id="doctor_name" type="text" name="doctor_name" placeholder="doctor name..."
                                    value="{{ old('doctor_name', auth()->user()->name) }}" class="form-control" required>

                                @error('doctor_name')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <label for="center_description">Center description </label>
                                <textarea id="center_description" name="center_description" readonly class="form-control description">{{ old('center_description') }}</textarea>


                                @error('center_description')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group my-2 col-md-6">
                                <label class="">Image</label>

                                <img src="{{ asset('storage/' . $register->image) }}" alt=""
                                    style="max-height: 400px">
                            </div>



                            <div class="form-group my-2">
                                <label for="description">Patient Description </label>
                                <textarea id="description" name="description" class="form-control description"> {{ old('description') }}</textarea>

                                @error('description')
                                    <p class="text text-danger mt-2"> {{ $message }} </p>
                                @enderror
                            </div>

                        </div>
                        <input type="hidden" name="register_id" value="{{ $registerId }}" />

                        <input type="submit" name="txt" value="Add" class="mt-4 btn btn-primary">

                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/3fhsebbqik5pn34fw0xw8fywdpdirq0ltu2z8uxgnzcj3q97/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '.description'
        });
    </script>
@endsection
