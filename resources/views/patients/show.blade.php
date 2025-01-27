@extends('welcome')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8 mt-7">
                <div>
                    @session('success')
                        <div class="container text-start badge-light-success w-100 rounded py-5 my-14">
                            <h3>
                                <span>
                                    <i class="icon fas fa-check text-success"></i>
                                </span>
                                <span>{{ $value }}</span>
                            </h3>
                        </div>
                    @endsession
                    @session('error')
                        <div class="container badge-light-danger w-100 rounded py-5 my-14">
                            <h3>{{ $value }}</h3>
                        </div>
                    @endsession
                    <!--begin::List Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">Assigned Drugs for: {{ $patient->name }}</h3>
                            <div class="card-toolbar"></div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <!--begin::Text-->
                                <div class="flex-grow-1">
                                    <ul>
                                        @foreach ($data as $item)
                                            <span class="d-block w-250px text-center text-light badge badge-primary my-3"
                                                style="font-size: 22px">
                                                <li class="nav-link d-flex p-3" style="justify-content: space-between;">
                                                    <span class="mt-1">{{ $item->name }}</span>
                                                    @auth('doctor')
                                                        <span>
                                                            <form action="{{ route('unsigne_drug', [$item->id, $patient->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-sm bg-primary">
                                                                    <i class="icon fas fa-times text-danger mb-2"
                                                                        style="font-size: 22px;"></i>
                                                                </button>
                                                            </form>
                                                        </span>
                                                    @endauth
                                                </li>
                                            </span>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('title', 'Show patients assigned drugs')
