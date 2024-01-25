@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 card">
        <div class="card-body">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Patients</h4>
                    </div>
                </div>
            </div>
            <div class="">

                <p class="mb-4">Show {{ $patients->count() }} Patients </p>
                <div class="table-responsive">
                    <form action="{{ route('admin.patient.search') }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="search ... " />
                        <div class="d-flex align-items-center justify-content-between">
                            @role('Admin|Manager')
                                <a href="{{ route('admin.patient.index') }}" class="btn btn-primary my-3 float-end"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Active patients">
                                    Active patients
                                </a>
                            @endrole
                            <input type="submit" value="search" class="btn btn-secondary my-3 float-end" />
                        </div>

                    </form>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="checkbox-area" scope="col">
                                    <div class="form-check form-check-primary">
                                        <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                                    </div>
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                @role('Admin|Manager')
                                    <th scope="col">status</th>
                                @endrole
                                <th scope="col">Age</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-primary">
                                            <input class="form-check-input custom_mixed_child" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media">

                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0">
                                                    {{ $patient->patiants ? $patient->patiants->name : $patient->name }}
                                                </h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $patient->patiants ? $patient->patiants->address : $patient->address }}</span>
                                    </td>

                                    <td class="text-center">
                                        <span
                                            class="text text-black">{{ $patient->patiants ? $patient->patiants->phone : $patient->phone }}</span>
                                    </td>
                                    @role('Doctor')
                                        <td>
                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0 badge badge-info">{{ $patient->type }}</h6>
                                            </div>
                                        </td>
                                    @endrole

                                    @role('Admin|Manager')
                                        <td>
                                            @if ($patient->status == 'active')
                                                <span class="badge badge-light-success">Active</span>
                                            @else
                                                <span class="badge badge-light-danger">Inactive</span>
                                            @endif
                                        </td>
                                    @endrole


                                    <td class="text-center">
                                        <span
                                            class="text text-black">{{ App\Http\Controllers\PatientController::getAge($patient->patiants ? $patient->patiants->DOB : $patient->DOB) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns d-flex align-items-center justify-content-center gap-2">
                                            @role('Admin|Manager')
                                                <a href="{{ route('admin.patient.toggleStatus', $patient->id) }}"
                                                    class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title="Toggle Status" data-bs-original-title="View">
                                                    @if ($patient->status == 'active')
                                                        <i class="fa-solid fa-toggle-on" style="font-size: 18px"></i>
                                                    @else
                                                        <i class="fa-solid fa-toggle-off" style="font-size: 18px"></i>
                                                    @endif
                                                </a>
                                            @endrole
                                        </div>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="7" class="text-center">No Patients</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- register Modal -->


    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.patient.physician') }}" enctype="multipart/form-data">
                        @csrf

                        @if (Auth::guard('admin')->user()->hasRole('Doctor'))
                            <label>patient description</label>
                            <textarea name="description" class="form-control"></textarea>
                        @endif

                        <input type="hidden" name="register_id" id="register_id" />
                        <label>medical Image</label>
                        <select class="form-select">
                            @foreach ($medicalImages as $medicalImage)
                                <option value="{{ $medicalImage->id }}">{{ $medicalImage->name }}</option>
                            @endforeach
                        </select>

                        <label>Image</label>
                        <input type="file" name="image" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="end" class="btn btn-danger">End</button>
                            @if (Auth::guard('admin')->user()->hasRole('Doctor'))
                                <button type="submit" name="rays" class="btn btn-primary">Rays</button>
                            @endif

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register Pateint</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.patient.register') }}">
                        @csrf


                        <select class="form-select" name="adminId">

                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                            <input type="hidden" name="patientId" id="adminId" />
                        </select>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const registersInput = document.querySelector("#register_id");
        let registreions = document.querySelectorAll("[data-register-id]");
        for (let i = 0; i < registreions.length; i++) {
            registreions[i].addEventListener("click", function() {
                console.log(registreions[i]);
                register_id.value = this.getAttribute("data-register-id");
            })
        }

        const adminIpnut = document.querySelector("#adminId");
        let pateints = document.querySelectorAll("[data-id]");
        for (let i = 0; i < pateints.length; i++) {
            pateints[i].addEventListener("click", function() {
                adminId.value = this.getAttribute("data-id")
            })
        }
    </script>
@endsection
