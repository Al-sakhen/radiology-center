@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing card">
        <div class="card-body">
            <div class="widget-header d-flex align-items-center justify-content-between">
                <h4>Roles</h4>
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Add New Role</a>

            </div>
            <div class="widget-content widget-content-area">

                <p class="mb-4">Show All Roles </p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">Name</th>
                                <th scope="col">Usere Count</th>

                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>

                                        <span class="mb-0">{{ $role->name }}</span>
                                    </td>
                                    <td>
                                        <span class="mb-0">{{ $role->users_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                      
                                            <a href="{{ route('admin.edit', $role->id) }}"
                                                class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                data-placement="top" title="" data-bs-original-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.role.destroy', $role->id) }}"
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
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
