@extends('Dashboard.layouts.layouts')

@section('content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 card">
        <div class="card-body">
            <div class="widget-header pb-3">

                <h4>
                    Patient Name :
                    <span class="text-primary text-sm font-weight-bold">{{ $patient->name }}</span>
                </h4>
                <h5>
                    Age :
                    <span
                        class="text-primary text-sm font-weight-bold">{{ App\Http\Controllers\PatientController::getAge($patient->patiants ? $patient->patiants->DOB : $patient->DOB) }}</span>
                </h5>
            </div>
            <div class="">

                <div class="accordion" id="pagesKnowledgeBase">

                    @forelse ($patient->reports as $report)
                        <div class="card mb-2">
                            <div class="card-header" id="fqheadingOne{{ $report->id }}">
                                <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                    data-bs-target="#fqcollapseOne{{ $report->id }}" aria-expanded="false"
                                    aria-controls="fqcollapseOne{{ $report->id }}">
                                    <div class="d-flex gap-5">
                                        <span>
                                            Doctor Name :
                                            <span
                                                class="text-primary text-sm font-weight-bold">{{ $report->doctor_name }}</span>
                                        </span>
                                        <span>
                                            Date :
                                            <span
                                                class="text-primary text-sm font-weight-bold">{{ $report->created_at->format('Y-m-d') }}</span>
                                        </span>
                                        <span>
                                            Since :
                                            <span
                                                class="text-primary text-sm font-weight-bold">{{ $report->created_at->diffForHumans() }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div id="fqcollapseOne{{ $report->id }}" @class(['collapse', 'show' => $loop->first])
                                aria-labelledby="fqheadingOne{{ $report->id }}" data-bs-parent="#pagesKnowledgeBase">
                                <div class="card-body">
                                    {!! $report->description !!}
                                </div>
                            </div>
                        </div>

                    @empty

                        <h2 class="text-center bg-secondary">
                            No Reports
                        </h2>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
