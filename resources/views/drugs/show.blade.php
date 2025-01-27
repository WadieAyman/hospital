@extends('welcome')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8 mt-7">
                <div>
                    <!--begin::List Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bold text-dark">Assigned Patients for: {{ $drug->name }}</h3>
                            <div class="card-toolbar"></div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <!--begin::Text-->
                                <div class="flex-grow-1">
                                    @foreach ($data as $item)
                                        <span class="text-light badge badge-primary fw-bold">
                                            {{ $item->name }}
                                            <a class="mx-1" onclick="delRow({{ $item->id }})">
                                                <i class="icon fas fa-times text-danger"
                                                    style="font-size: 18px;cursor: pointer;"></i>
                                            </a>
                                        </span>
                                    @endforeach
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
@section('scripts')
    <script>
        function delRow(id) {
            alert(id);
        }
    </script>
@endsection
@section('title', 'Show Assignd patient to ' . $drug->name)
