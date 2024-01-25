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
                                <a href="{{ route('admin.patient.showInactivePatients') }}"
                                    class="btn btn-primary my-3 float-end {{ request()->has('status') ? 'active' : '' }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show active patients">
                                    Show inactive patients
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
                                @role('Doctor')
                                    <th scope="col">status</th>
                                @endrole

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
                                                    {{ $patient->id }} -
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


                                            @if (Auth::guard('admin')->user()->hasRole('Doctor') && $patient->type == 'end')
                                                <a href="{{ route('admin.patient.report', $patient->id) }}"
                                                    class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="Report">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>

                                                </a>
                                            @endif

                                            @if ($patient->type == 'done')
                                                <a href="{{ route('admin.patient.report.print', $patient->id) }}"
                                                    target="_blank" class="action-btn btn-view bs-tooltip "
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Report">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                    </svg>

                                                </a>
                                            @endif

                                            @role('Doctor')
                                                @if ($patient->type == 'wait')
                                                    <a href="javascript:void(0);" data-id=<?= $patient->patient_id ?>
                                                        data-register-id=<?= $patient->id ?> data-bs-toggle="modal"
                                                        data-bs-target="#registerModal" class="action-btn btn-view bs-tooltip "
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-bs-original-title="View">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                @endif
                                            @endrole

                                            @role('Radiologist')
                                                <a href="javascript:void(0);" data-id=<?= $patient->id ?>
                                                    data-register-id=<?= $patient->id ?> data-bs-toggle="modal"
                                                    data-bs-target="#registerModal{{ $patient->id }}"
                                                    class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            @endrole

                                            @if (Auth::guard('admin')->user()->hasRole('Doctor') ||
                                                    Auth::guard('admin')->user()->hasRole('Radiologist'))
                                                <a href="{{ route('admin.patient.reports', $patient->patient_id) }}"
                                                    class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-bs-original-title="Show Reports">
                                                    <i class="fa-solid fa-list"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" data-id=<?= $patient->id ?>
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-bs-original-title="register">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-5 h-5">
                                                        <path
                                                            d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z" />
                                                        <path fill-rule="evenodd"
                                                            d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('admin.patient.edit', $patient->id) }}"
                                                    class="action-btn btn-edit bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.patient.destroy', $patient->id) }}"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17">
                                                        </line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17">
                                                        </line>
                                                    </svg>
                                                </a>
                                            @endif

                                        </div>
                                    </td>
                                </tr>


                                @role('Radiologist')
                                    {{-- ==========Registered data modal for the Radiologist --}}
                                    <div class="modal fade" id="registerModal{{ $patient->id }}" tabindex="-1"
                                        aria-labelledby="registerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register Details

                                                        {{ $patient->id }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.patient.physician') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control" readonly>{{ $patient->description }}</textarea>

                                                        <input type="hidden" name="register_id" id="register_id" />
                                                        <label>medical Image</label>
                                                        <select class="form-select" readonly disabled>
                                                            @foreach ($medicalImages as $medicalImage)
                                                                <option value="{{ $medicalImage->id }}"
                                                                    @selected($patient->medical_image_id == $medicalImage->id)>
                                                                    {{ $medicalImage->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <label>Image</label>
                                                        <input type="file" name="image" />
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="end"
                                                                class="btn btn-danger">End</button>
                                                        </div>
                                                        <input type="hidden" name="register_id"
                                                            value="{{ $patient->id }}">
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endrole
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
                        <select class="form-select" name="medical_image_id">
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
