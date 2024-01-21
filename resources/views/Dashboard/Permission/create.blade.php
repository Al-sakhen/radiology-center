@extends('Dashboard.layouts.layouts')
@section('content')
<div class="row layout-top-spacing">
    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>New Permission</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <form method="post" action="{{ route('admin.permission.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name..." class="form-control" required>

                            </div>

                            @error('name')

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


