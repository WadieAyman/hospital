@extends('welcome')
@section('content')
    <center>
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="container-fluid card p-5">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('patients.update', $patient->id) }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Edit Patient Details</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Separator-->
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
                        <!--end::Separator-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::name-->
                            <input type="text" placeholder="name" name="name" value="{{ $patient->name }}"
                                id="name" autocomplete="off" class="form-control bg-transparent" />
                            <!--end::name-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::phoneNumber-->
                            <input type="tel" placeholder="phoneNumber" name="phoneNumber"
                                value="{{ $patient->phoneNumber }}" id="name" autocomplete="off"
                                class="form-control bg-transparent" maxlength="15" />
                            <!--end::phoneNumber-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::age-->
                            <input type="number" placeholder="age" name="age" value="{{ $patient->age }}"
                                id="name" autocomplete="off" class="form-control bg-transparent" />
                            <!--end::age-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::gender-->
                            <select name="gender" class="form-control bg-transparent">
                                <option selected disabled>--Select patient gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <!--end::gender-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::problemtion Date-->
                            <textarea placeholder="problem" name="problem" class="form-control bg-transparent" rows="5" cols="12">{{ $patient->problem }}</textarea>
                            <!--end::Production problem-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span>Save Changes</span>
                                <!--end::Indicator label-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </center>
@stop
@section('title', 'Edit patient')
