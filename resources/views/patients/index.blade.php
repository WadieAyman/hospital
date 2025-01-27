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
                                <span class="card-label fw-bold text-gray-800">All Patients</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated
                                    {{ Carbon\Carbon::parse(App\Models\Drug::latest()->pluck('updated_at')->first())->diffForHumans() }}</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                {{--  --}}
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 text-start">#</th>
                                            <th class="p-0 pb-3 text-center">name</th>
                                            <th class="p-0 pb-3 text-center">phoneNumber</th>
                                            <th class="p-0 pb-3 text-center">age</th>
                                            <th class="p-0 pb-3 text-center">gender</th>
                                            <th class="p-0 pb-3 text-center">problem</th>
                                            <th class="p-0 pb-3 text-center">entrancDate</th>
                                            <th class="p-0 pb-3 text-center"></th>
                                            <th class="p-0 pb-3 text-center"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($patients as $patient)
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
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $patient->name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <!--begin::Label-->
                                                    <span
                                                        class="badge badge-light-success fs-base">{{ $patient->phoneNumber }}</span>
                                                    <!--end::Label-->
                                                </td>
                                                <td class="text-center">
                                                    <span>{{ $patient->age }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span>{{ $patient->gender }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span>{{ $patient->problem }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $patient->entrancDate }}
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{ route('patients.edit', $patient->id) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('patients.show', $patient->id) }}"
                                                        class="btn btn-sm btn-info mx-2">
                                                        Show Assignd drugs
                                                    </a>
                                                    <a href="{{ route('show_assign_drug', $patient->id) }}"
                                                        class="btn btn-sm btn-primary mx-2">
                                                        Assign new Drug
                                                    </a>
                                                    <form action="{{ route('patients.destroy', $patient->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
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
@section('title', 'Index Patients')
