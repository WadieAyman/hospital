@extends('welcome')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 14-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">All Drugs</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated
                                    {{ Carbon\Carbon::parse(App\Models\Drug::latest()->pluck('updated_at')->first())->diffForHumans() }}</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table container-->
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
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 text-start">#</th>
                                            <th class="p-0 pb-3 text-center">Name</th>
                                            <th class="p-0 pb-3 text-center">Dosage</th>
                                            <th class="p-0 pb-3 text-center pe-12">Production Date</th>
                                            <th class="p-0 pb-3 text-center pe-7">Expiry Date</th>
                                            <th class="p-0 pb-3 text-center"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($drugs as $drug)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span
                                                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $loop->index + 1 }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $drug->name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <!--begin::Label-->
                                                    <span
                                                        class="badge badge-light-success fs-base">{{ $drug->dosage . 'cm' }}</span>
                                                    <!--end::Label-->
                                                </td>
                                                <td class="text-center">
                                                    <span>{{ $drug->productionDate }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $drug->expiryDate }}
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{ route('drugs.edit', $drug->id) }}"
                                                        class="btn btn-bg-secondary mx-3">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                        Edit
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <span class="p-3">{{ $drugs->links() }}</span>
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
@section('title', 'Index Drugs')
