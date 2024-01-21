@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Patients</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <p class="mb-4">Show {{ $patients->count() }} Patients </p>
                <div class="table-responsive">
                    <form action="{{ route('admin.patient.search') }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="search ... " />
                        <input type="submit" value="search" class="btn btn-secondary my-3 float-end" />

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
                            @if(Auth::guard('admin')->user()->hasRole('Doctor'))
                                <th scope="col">status</th>
                             @endif
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-primary">
                                            <input class="form-check-input custom_mixed_child" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media">

                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0">{{($patient->patiants)?$patient->patiants->name:$patient->name}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ ($patient->patiants)?$patient->patiants->address:$patient->address }}</span>
                                    </td>

                                    <td class="text-center">
                                        <span class="text text-black">{{($patient->patiants)?$patient->patiants->phone:$patient->phone }}</span>
                                    </td>
                                    @if(Auth::guard('admin')->user()->hasRole('Doctor') )
                                    <td>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0 badge badge-info">{{$patient->type}}</h6>
                                        </div>
                                       </td>
                                       @endif

                                    <td class="text-center">
                                        <span
                                            class="text text-black">{{ App\Http\Controllers\PatientController::getAge(($patient->patiants)?$patient->patiants->DOB:$patient->DOB) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            @if(Auth::guard('admin')->user()->hasRole('Doctor') && $patient->type=='end')
                                                <a href="{{ route('admin.patient.report',$patient->id)}}"  class="action-btn btn-view bs-tooltip me-2"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Report">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>

                                                </a>

                                            @endif

                                            @if( $patient->type=='done')
                                                <a href="{{ route('admin.patient.report.print',$patient->id)}}"  class="action-btn btn-view bs-tooltip me-2"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Report">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                      </svg>

                                                </a>

                                            @endif
                                            @if(Auth::guard('admin')->user()->hasRole('Doctor') || Auth::guard('admin')->user()->hasRole('Radiologist') )
                                            <a href="javascript:void(0);"  data-id=<?= $patient->patient_id ?> data-register-id =<?= $patient->id ?> data-bs-toggle="modal" data-bs-target="#registerModal" class="action-btn btn-view bs-tooltip me-2"
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
                                        @else
                                            <a href="javascript:void(0);"  data-id=<?= $patient->id ?> data-bs-toggle="modal" data-bs-target="#exampleModal" class="action-btn btn-view bs-tooltip me-2"
                                                data-toggle="tooltip" data-placement="top" title=""
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

                                            <a href="{{ route('admin.edit', $patient->id) }}"
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
                                            <a href="{{ route('admin.destroy', $patient->id) }}"
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
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $patients->links() }}
                </div>

                <div class="code-section-container">

                    <button class="btn toggle-code-snippet _effect--ripple waves-effect waves-light"><span>Code</span> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg></button>

                    <div class="code-section text-left">
                        <pre class="hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table-responsive"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table table-hover table-striped table-bordered"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"checkbox-area"</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check form-check-primary"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"custom_mixed_parent_all"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>Role<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>Status<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check form-check-primary"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input custom_mixed_child"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"avatar me-2"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">img</span> <span class="hljs-attr">alt</span>=<span class="hljs-string">"avatar"</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"../src/assets/img/profile-7.jpeg"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"rounded-circle"</span> /&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media-body align-self-center"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">h6</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Shaun Park<span class="hljs-tag">&lt;/<span class="hljs-name">h6</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">span</span>&gt;</span>shaun.park@mail.com<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>CEO<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-success"</span>&gt;</span>Management<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"badge badge-light-success"</span>&gt;</span>Online<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btns"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-view bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"View"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-eye"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">circle</span> <span class="hljs-attr">cx</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">cy</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">r</span>=<span class="hljs-string">"3"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">circle</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-edit bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Edit"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-edit-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-delete bs-tooltip"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Delete"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-trash-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">polyline</span> <span class="hljs-attr">points</span>=<span class="hljs-string">"3 6 5 6 21 6"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">polyline</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>

                            <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check form-check-primary"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input custom_mixed_child"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"avatar me-2"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">img</span> <span class="hljs-attr">alt</span>=<span class="hljs-string">"avatar"</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"../src/assets/img/profile-11.jpeg"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"rounded-circle"</span> /&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media-body align-self-center"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">h6</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Alma Clarke<span class="hljs-tag">&lt;/<span class="hljs-name">h6</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">span</span>&gt;</span>almaClarke@mail.com<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Lead Developer<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-secondary"</span>&gt;</span>Programmer<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"badge badge-light-secondary"</span>&gt;</span>Waiting<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btns"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-view bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"View"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-eye"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">circle</span> <span class="hljs-attr">cx</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">cy</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">r</span>=<span class="hljs-string">"3"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">circle</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-edit bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Edit"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-edit-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-delete bs-tooltip"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Delete"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-trash-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">polyline</span> <span class="hljs-attr">points</span>=<span class="hljs-string">"3 6 5 6 21 6"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">polyline</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>

                            <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check form-check-primary"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input custom_mixed_child"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"avatar me-2"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">img</span> <span class="hljs-attr">alt</span>=<span class="hljs-string">"avatar"</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"../src/assets/img/profile-5.jpeg"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"rounded-circle"</span> /&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media-body align-self-center"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">h6</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Vincent Carpenter<span class="hljs-tag">&lt;/<span class="hljs-name">h6</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">span</span>&gt;</span>vincent@mail.com<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>HR<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-danger"</span>&gt;</span>Management<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"badge badge-light-danger"</span>&gt;</span>Offline<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btns"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-view bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"View"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-eye"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">circle</span> <span class="hljs-attr">cx</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">cy</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">r</span>=<span class="hljs-string">"3"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">circle</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-edit bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Edit"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-edit-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-delete bs-tooltip"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Delete"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-trash-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">polyline</span> <span class="hljs-attr">points</span>=<span class="hljs-string">"3 6 5 6 21 6"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">polyline</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>

                            <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check form-check-primary"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input custom_mixed_child"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"avatar me-2"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">img</span> <span class="hljs-attr">alt</span>=<span class="hljs-string">"avatar"</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"../src/assets/img/profile-34.jpeg"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"rounded-circle"</span> /&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"media-body align-self-center"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">h6</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Xavier<span class="hljs-tag">&lt;/<span class="hljs-name">h6</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">span</span>&gt;</span>xavier@mail.com<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-0"</span>&gt;</span>Lead Designer<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-info"</span>&gt;</span>Graphic<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>

                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"badge badge-light-info"</span>&gt;</span>On Hold<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">td</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-center"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btns"</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-view bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"View"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-eye"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">circle</span> <span class="hljs-attr">cx</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">cy</span>=<span class="hljs-string">"12"</span> <span class="hljs-attr">r</span>=<span class="hljs-string">"3"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">circle</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-edit bs-tooltip me-2"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Edit"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-edit-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"action-btn btn-delete bs-tooltip"</span> <span class="hljs-attr">data-toggle</span>=<span class="hljs-string">"tooltip"</span> <span class="hljs-attr">data-placement</span>=<span class="hljs-string">"top"</span> <span class="hljs-attr">title</span>=<span class="hljs-string">"Delete"</span>&gt;</span>
                                <span class="hljs-tag">&lt;<span class="hljs-name">svg</span> <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span> <span class="hljs-attr">width</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">height</span>=<span class="hljs-string">"24"</span> <span class="hljs-attr">viewBox</span>=<span class="hljs-string">"0 0 24 24"</span> <span class="hljs-attr">fill</span>=<span class="hljs-string">"none"</span> <span class="hljs-attr">stroke</span>=<span class="hljs-string">"currentColor"</span> <span class="hljs-attr">stroke-width</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">stroke-linecap</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">stroke-linejoin</span>=<span class="hljs-string">"round"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"feather feather-trash-2"</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">polyline</span> <span class="hljs-attr">points</span>=<span class="hljs-string">"3 6 5 6 21 6"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">polyline</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">path</span> <span class="hljs-attr">d</span>=<span class="hljs-string">"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">path</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"10"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">line</span> <span class="hljs-attr">x1</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y1</span>=<span class="hljs-string">"11"</span> <span class="hljs-attr">x2</span>=<span class="hljs-string">"14"</span> <span class="hljs-attr">y2</span>=<span class="hljs-string">"17"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">line</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">svg</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>


                            <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span>
                            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span></pre>
                    </div>
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

                  @if(Auth::guard('admin')->user()->hasRole('Doctor'))
                   <label>patient description</label>
                    <textarea name="description" class="form-control"></textarea>

                @endif

                <input type="hidden"  name="register_id" id="register_id" />
                   <label>medical Image</label>
                   <select class="form-select">
                    @foreach($medicalImages as $medicalImage)
                    <option value="{{ $medicalImage->id }}">{{ $medicalImage->name }}</option>
                    @endforeach
                   </select>

                   <label>Image</label>
                   <input type="file" name="image" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="end" class="btn btn-danger">End</button>
                    @if(Auth::guard('admin')->user()->hasRole('Doctor'))

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

                   @foreach($admins as $admin)
                   <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                   @endforeach
                   <input type="hidden"  name="patientId" id="adminId" />
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
   const registersInput= document.querySelector("#register_id");
   let registreions = document.querySelectorAll("[data-register-id]");
   for(let i=0;i<registreions.length ;i++){
       registreions[i].addEventListener("click",function (){
           console.log( registreions[i]);
        register_id.value =this.getAttribute("data-register-id");
    })
   }

   const adminIpnut= document.querySelector("#adminId");
   let pateints = document.querySelectorAll("[data-id]");
   for(let i=0;i<pateints.length ;i++){
    pateints[i].addEventListener("click",function (){
        adminId.value =this.getAttribute("data-id")
    })
   }

  </script>
@endsection
