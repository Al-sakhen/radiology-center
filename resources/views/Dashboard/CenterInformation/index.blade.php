@extends('Dashboard.layouts.layouts')

@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Center Informations</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <form method="post" action="{{ route('admin.centerInformation.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group my-2 col-md-6">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name' ,$public_center_informations->name) }}"
                                    placeholder="Name..." class="form-control" required>

                                @error('name')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group my-2 col-md-6">

                                <label for="address" class="">Address</label>
                                <input id="address" type="text" name="address" placeholder="center address..."
                                    value="{{ old('address' , $public_center_informations->address) }}" class="form-control" required>

                                @error('address')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="form-group my-2 col-md-6">

                                <label for="phone" class="">Phone </label>
                                <input id="phone" type="text" name="phone" value="{{ old('phone' , $public_center_informations->phone) }}"
                                    placeholder="Password..." class="form-control" required>

                                @error('phone')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="form-group my-2 col-md-6">

                                <label for="email" class="">Email </label>
                                <input id="email" type="text" name="email" value="{{ old('email' , $public_center_informations->email) }}"
                                    placeholder="Email..." class="form-control" required>

                                @error('email')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>




                            <div class="form-group my-2">

                                <label for="description" class="">Description </label>
                                <textarea id="description" name="description" class="form-control"> {{ old('address' , $public_center_informations->description) }}</textarea>

                                @error('description')
                                    <p class="text text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                        </div>
                        <input type="submit" name="txt" value="Update" class="mt-4 btn btn-primary">
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
            selector: '#description'
        });
    </script>
@endsection
