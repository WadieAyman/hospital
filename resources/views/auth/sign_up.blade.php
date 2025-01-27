<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->

    <head>
        <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
        <meta charset="utf-8" />
        <meta name="description"
            content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords"
            content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Keenthemes | Metronic" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" class="app-blank">
        <!--begin::Theme mode setup on page load-->
        <!--end::Theme mode setup on page load-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <!--begin::Form-->
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10">
                            <!--begin::Form-->
                            <form class="form w-100" action="{{ route('sign_up') }}" method="POST"
                                novalidate="novalidate">
                                @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Sign UP</h1>
                                    <!--end::Title-->
                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">Your Social Experiance</div>
                                    <!--end::Subtitle=-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Separator-->
                                @session('error')
                                    <div class="container bg-danger-light w-100 rounded my-14">
                                        <h3>{{ $value }}</h3>
                                    </div>
                                @endsession
                                <!--end::Separator-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Name-->
                                    <input type="text" placeholder="Name" name="name" id="name"
                                        autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Name-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="email" placeholder="Email" name="email" id="email"
                                        autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Email-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Phone Number-->
                                    <input type="text" placeholder="Phone Number" name="phoneNumber" id="phoneNumber"
                                        autocomplete="off" class="form-control bg-transparent" maxlength="15" />
                                    <!--end::Phone Number-->
                                </div>
                                <!--end::Input group=-->
                                @if (request()->guard == 'patient')
                                    <!--begin::Input group=-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Gender-->
                                        <select name="gender" id="gender" class="form-control bg-transparent">
                                            <option selected disabled>--Choose Your Gender--</option>
                                            <option value="male">Male</option>
                                            <option value="femail">Female</option>
                                        </select>
                                        <!--end::Gender-->
                                    </div>
                                    <!--end::Input group=-->
                                    <!--begin::Input group=-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Age-->
                                        <input type="number" placeholder="Age" name="age" id="age"
                                            autocomplete="off" class="form-control bg-transparent" />
                                        <!--end::Age-->
                                    </div>
                                    <!--end::Input group=-->
                                    <!--begin::Input group=-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Problem-->
                                        <textarea name="problem" id="problem" placeholder="Problem" cols="30" rows="10"
                                            class="form-control bg-transparent"></textarea>
                                        <!--end::Problem-->
                                    </div>
                                    <!--end::Input group=-->
                                @endif
                                <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                                    <!--begin::Wrapper-->
                                    <div class="mb-1">
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative mb-3">
                                            <input class="form-control bg-transparent" type="password"
                                                placeholder="Password" name="password" id="password"
                                                autocomplete="off">
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <!--end::Input wrapper-->
                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center mb-3"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                            </div>
                                        </div>
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Hint-->
                                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers
                                        &amp; symbols.</div>
                                    <!--end::Hint-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group=-->
                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                    <!--begin::Repeat Password-->
                                    <input placeholder="Repeat Password" name="password_confirmation"
                                        id="password_confirmation" type="password" autocomplete="off"
                                        class="form-control bg-transparent">
                                    <!--end::Repeat Password-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Sign UP</span>
                                        <!--end::Indicator label-->
                                    </button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                                    <a href="{{ route('login', request()->guard) }}" class="link-primary">Sign IN</a>
                                </div>
                                <!--end::Sign up-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
                <!--begin::Aside-->
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                    style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
                    <!--begin::Content-->
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        <!--begin::Logo-->
                        <a href="#" class="mb-0 mb-lg-12">
                            <img alt="Logo" src="{{ asset('assets/media/logos/custom-1.png') }}"
                                class="h-60px h-lg-75px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Image-->
                        <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                            src="{{ asset('assets/media/misc/auth-screens.png') }}" alt="" />
                        <!--end::Image-->
                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
                            Productive</h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                            <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                                blogger</a>introduces a person they’ve interviewed
                            <br />and provides some background information about
                            <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                                interviewee</a>and
                            their
                            <br />work following this is a transcript of the interview.
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Aside-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Root-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used for this page only)-->
        <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->

</html>
