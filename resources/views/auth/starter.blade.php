@extends('welcome')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 my-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 14-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h1 class="card-title text-dark text-capitalize fw-bold fs-3 justify-content-center my-0"
                                style="font-family: Consolas, 'Courier New', monospace">
                                {{ session('guard') }} Dashboard
                            </h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <span class="text-muted text-capitalize">Welcome back, <b class="text-primary">
                                    {{ Auth::guard(request()->guard)->user()->name }}
                                </b></span>
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 14-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('title', strtoUpper($guard))
