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
                                <span class="card-label fw-bold text-gray-800">Avilable Drugs</span>
                            </h3>
                            <!--end::Title-->
                            @session('success')
                                <div class="container text-start badge-light-success w-100 rounded py-5 my-14">
                                    <h3>
                                        <span>
                                            <i class="icon fas fa-check text-success"></i>
                                        </span>
                                        <span class="text-success">{{ $value }}</span>
                                    </h3>
                                </div>
                            @endsession
                            @session('error')
                                <div class="container badge-light-danger w-100 rounded py-5 my-14">
                                    <ul>
                                        <li>
                                            <h3 class="text-danger">
                                                <span class="text-danger">{{ $value }}</span>
                                            </h3>
                                        </li>
                                    </ul>
                                </div>
                            @endsession
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
                            <form action="" method="POST">
                                @csrf
                                {{-- <select name="drug_id[]" class="form-control" multiple>
                                    @foreach ($drugs as $drug)
                                        <option value="{{ $drug->id }}"
                                            @foreach ($data as $item)
                                                    @selected($item->drug_id === $drug->id && $item->pat_id === $patients->id) @endforeach>
                                            {{ $drug->name }}</option>
                                    @endforeach
                                </select> --}}
                                @foreach ($drugs as $drug)
                                    <input type="checkbox" value="{{ $drug->id }}" name="drug_id[]"
                                        @foreach ($data as $item)
                                            @checked($item->drug_id === $drug->id && $item->pat_id === $patients->id) @endforeach>
                                    {{ $drug->name }}
                                    </br>
                                @endforeach
                                <button type="submit" class="btn btn-primary my-5">Assign drugs for
                                    {{ $patients->name }}</button>
                            </form>
                            <!--end::Table-->
                        </div>
                        {{-- <span class="p-3">{{ $patients->links() }}</span> --}}
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
@section('title', 'Assign new drugs for ' . $patients->name)
