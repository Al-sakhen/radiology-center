@extends('Dashboard.layouts.layouts')
@section('content')


<div class="row layout-top-spacing d-inline-flex w-75">
    <div id="basic" class="col-lg12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row ">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>Medical Images</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($medicalImages as $index=>$medicalImage)
                                  <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $medicalImage->name }}</td>
                                    <td>{{ $medicalImage->type }}</td>

                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<div class="row layout-top-spacing d-inline-flex w-25">
    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>New Medical Image</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <form method="post" action="{{ route('admin.medicalImage.store') }}">
                            @csrf

                            <div class="form-group my-2">
                                <label for="name" class="">name</label>
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


