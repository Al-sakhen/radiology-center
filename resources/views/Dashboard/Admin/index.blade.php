@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing card">
        <div class="card-body">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Employees</h4>
                    </div>
                </div>
            </div>

            <p class="mb-4">Show All Employees </p>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Status</th>
                            @if (auth()->user()->hasRole('Admin') ||
                                    auth()->user()->hasRole('Manager'))
                                <th class="text-center" scope="col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>

                                <td>
                                    <div class="media">

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $admin->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>{{ $admin->email }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text text-black">{{ $admin->phone }}</span>
                                </td>

                                <td>
                                    @forelse ($admin->roles as $role)
                                        <span class="badge badge-light-info">
                                            {{ $role->name }}
                                        </span>

                                    @empty
                                        <span class="badge badge-light-danger">
                                            No Roles
                                        </span>
                                    @endforelse
                                </td>
                                <td class="d-flex justify-content-between">
                                    @if ($admin->status == 'active')
                                        <span class="badge badge-light-success">Active</span>
                                    @else
                                        <span class="badge badge-light-danger">Inactive</span>
                                    @endif
                                </td>

                                @role('Admin|Manager')
                                    <td class="text-center">
                                        <div class="action-btns d-flex align-items-center justify-content-center gap-2">

                                            <a href="{{ route('admin.toggleStatus', $admin->id) }}"
                                                class="action-btn btn-view bs-tooltip " data-toggle="tooltip"
                                                data-placement="top" title="Toggle Status" data-bs-original-title="View">
                                                @if ($admin->status == 'active')
                                                    <i class="fa-solid fa-toggle-on" style="font-size: 18px"></i>
                                                @else
                                                    <i class="fa-solid fa-toggle-off" style="font-size: 18px"></i>
                                                @endif
                                            </a>

                                            @role('Manager')
                                                <a href="{{ route('admin.edit', $admin->id) }}"
                                                    class="action-btn btn-edit bs-tooltip " data-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endrole
                                            <a href="{{ route('admin.destroy', $admin->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                                data-placement="top" title="" data-bs-original-title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
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
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
