@extends('Dashboard.layouts.layouts')

@section('content')

<div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Admins</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <p class="mb-4">Show All Admins </p>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="checkbox-area" scope="col">
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                                </div>
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th class="text-center" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input custom_mixed_child" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <div class="media">

                                    <div class="media-body align-self-center">
                                        <h6 class="mb-0">{{ $admin->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span >{{ $admin->email }}</span>
                            </td>
                            <td class="text-center">
                                <span class="text text-black">{{ $admin->phone }}</span>
                            </td>
                            <td class="text-center">
                                <div class="action-btns">
                                    <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                    <a href="{{ route('admin.edit',$admin->id) }}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <a href="{{ route('admin.destroy',$admin->id) }}"
                                    class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                     data-placement="top" title="" data-bs-original-title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>


                        @endforeach


                    </tbody>
                </table>
            </div>

            <div class="code-section-container">

                <button class="btn toggle-code-snippet _effect--ripple waves-effect waves-light"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

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
@endsection
