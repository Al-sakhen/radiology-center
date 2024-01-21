@extends('Dashboard.layouts.layouts')

@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>create report</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="row">
                        <div class="col-lg-6 col-12 ">
                            <form method="post" action="{{ route('admin.patient.report.store') }}">
                                @csrf

                                <div class="form-group my-2">
                                    <label for="name" class="">center name</label>
                                    <input id="name" type="text" name="center_name" value="{{ old('center_name') }}"
                                        placeholder="Name..." class="form-control" required>

                                </div>

                                @error('center_name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                                <div class="form-group my-2">
                                    <label for="center_description" class="">center description</label>
                                    <input id="center_description" type="text" name="center_description"
                                        placeholder="center description..." value="{{ old('center_description') }}"
                                        class="form-control" required>

                                </div>

                                @error('center_description')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror


                                <div class="form-group my-2">
                                    <label for="doctor_name" class="">doctor name</label>
                                    <input id="doctor_name" type="text" name="doctor_name" placeholder="doctor name..."
                                        value="{{ old('doctor_name') }}" class="form-control" required>

                                </div>



                                @error('doctor_name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                                <div class="form-group my-2">

                                    <label for="center_address" class="">center_address</label>
                                    <input id="center_address" type="text" name="center_address"
                                        placeholder="center address..." value="{{ old('center_address') }}"
                                        class="form-control" required>

                                </div>
                                @error('center_address')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                                <div class="form-group my-2">

                                    <label for="center_phone" class="">center phone </label>
                                    <input id="center_phone" type="text" name="center_phone"
                                        value="{{ old('center_phone') }}" placeholder="Password..." class="form-control"
                                        required>

                                </div>
                                @error('center_phone')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror




                                <div class="form-group my-2">

                                    <label for="description" class="">description </label>
                                    <textarea id="description"  name="description" class="form-control"> {{ old('address') }}</textarea>

                                </div>
                                @error('description')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror

                                <input type="hidden" name="register_id" value="{{ $registerId }}" />

                                <input type="submit" name="txt" value="Add" class="mt-4 btn btn-primary">

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/3fhsebbqik5pn34fw0xw8fywdpdirq0ltu2z8uxgnzcj3q97/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
 tinymce.init({
        selector: '#description'
      });

</script>

@endsection
