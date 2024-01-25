@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing card">
        <div class="card-body">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Contact Us</h4>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Message</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($records as $record)
                            <tr>
                                <td>
                                    <div class="media">

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $record->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>{{ $record->email }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text text-black">{{ $record->phone }}</span>
                                </td>

                                <td class="text-center">
                                    <span class="text text-black">{{ $record->dob }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text text-black">{{ $record->message }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="action-btns d-flex align-items-center justify-content-center gap-2">
                                        <a href="{{ route('admin.contactUs.destroy', $record->id) }}"
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Records Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
