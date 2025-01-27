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
                    <form class="form" action="{{ route('drugs.store') }}" method="POST" novalidate="novalidate">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Add New Drug</h1>
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
                            <!--begin::Name-->
                            <input type="text" placeholder="Name" name="name" id="name" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Name-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Dosage-->
                            <input type="number" placeholder="Dosage" name="dosage" id="dosage"
                                class="form-control bg-transparent" />
                            <!--end::Dosage-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Production Date-->
                            <input type="date" placeholder="Production Date" name="productionDate" id="productionDate"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Production Date-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Expiry Date-->
                            <input type="date" placeholder="expiryDate" name="expiryDate" id="expiryDate"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Expiry Date-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Add drug</span>
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
@section('title', 'Add new Drug')
