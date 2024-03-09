<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name', '') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- C3 Chart css -->
    <link href="{{ asset('assets/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('style')
    <style>
        .header-title {
            text-align: right;
        }

        .left-side-menu,
        .logo-box {
            background-color: #282262;
        }

        #sidebar-menu>ul>li>a.active,
        #sidebar-menu>ul>li>a:hover,
        #sidebar-menu>ul>li>a:focus {
            color: #fff;
            background-color: #07023f;
        }

        @media only screen and (max-width:800px) {

            #table-ali tbody,
            #table-ali tr,
            #table-ali td,
            #table-ali th {
                display: block;
            }

            #table-ali td img {
                margin-left: auto;
            }

            #table-ali tr {
                margin-bottom: 15px;
            }

            #table-ali thead {
                display: none;
            }

            #table-ali tbody td,
            #table-ali tfoot th {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            #table-ali tbody td::before,
            #table-ali tfoot th::before {
                content: attr(data-title);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                text-align: left;
                font-weight: bold;
            }

        }
    </style>
    @livewireStyles
</head>

<body style="color:black">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                    <!-- <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="lang-image" height="12">
                        </a> -->
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="lang-image" class="mr-1" height="12"> <span
                                    class="align-middle">German</span>
                            </a> -->


                    </div>
                </li>

                <!-- HTML for the dropdown -->
                <li class="dropdown notification-list" id="academicYearDropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-calendar noti-icon"></i>
                        <span class="badge badge-pink rounded-circle noti-icon-badge" id="academicYearBadge">2</span>
                    </a>
                    <!-- Your HTML content here -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg" id="academicYearDropdownContent">
                        <div class="dropdown-header noti-title" style="padding: 20px; border-bottom: 1px solid #ddd;">
                            <h5 class="text-overflow m-0 align-self-center"><span class="float-right">You have two
                                    years</span></h5>
                            <form method="post" action="{{ route('institute.academic_year_change') }}">
                                @csrf
                                <div class="container">
                                    <div class="row mt-4">
                                        @php
                                            $academic_year_id = Auth::user()->academic_id;

                                            $academic_year = App\Models\AcademicYear::pluck('year_title', 'id');
                                        @endphp
                                        <div class="form-group">
                                            <label for="year_title">Year Title <span
                                                    class="text-danger">*</span></label>
                                            {!! Form::select('academic_id', $academic_year, $academic_year_id, [
                                                'id' => 'academic_id', // Add id attribute
                                                'class' => 'form-control', // Add class attribute
                                                'data-toggle' => 'select2', // Add data-toggle attribute if needed
                                                'placeholder' => 'Please select a year title', // Change placeholder text
                                                'required' => 'required', // Add required attribute if needed
                                                'data-parsley-trigger' => 'change', // Add data-parsley-trigger attribute if needed
                                            ]) !!}
                                        </div>
                                        <div class="col-md-4 align-self-end">
                                            <button type="submit" name="filter"
                                                class="btn btn-primary btn-block">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </li>
                {{--
                $selectedDate = $_POST['selected_date']; // Assuming you're sending the selected date via POST request

                // Prepare the SQL query with a "between" condition
                $sql = "SELECT * FROM academic_years WHERE starting_date BETWEEN :selectedDate AND NOW()";
                ?> --}}

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="badge badge-pink rounded-circle noti-icon-badge">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow m-0"><span class="float-right">
                                    <span class="badge badge-danger float-right">0</span>
                                </span>Notification</h5>

                        </div>




                        <div class="slimscroll noti-scroll">

                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a> -->

                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                            class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="user/profile" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="user/profile" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->

                        <a class="dropdown-item notify-item" href="{{ route('institute.logout') }}">
                            <i class="fe-log-out"></i>
                            {{ __('Logout') }}
                        </a>


                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ Route('home') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" width="100%">
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">U</span> -->
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="28">
                    </span>
                </a>
            </div>


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu pt-4">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li>
                            <a href="{{ route('superadmin.dashboard') }}">
                                <i class="fe-airplay"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>




                        <li>
                            <a href="{{ route('institute.guardian.index') }}">
                                <i class="fe-airplay"></i>
                                <span>Guardian</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('institute.teacher.index') }}">
                                <i class="fe-airplay"></i>
                                <span>Teacher</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('institute.student.index') }}">
                                <i class="fe-airplay"></i>
                                <span>Student</span>
                            </a>
                        </li>


                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Acadamic</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.section.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Section</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.class.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Class</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.subject.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Subject</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.syllabus.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Syllabus</span>
                                    </a>
                                </li>

                            </ul>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.assignment.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Assignment</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Attendance</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.teacher_attendance.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Teacher Attendance</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.student_attendance.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Student Attendance</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Exam</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.exam.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Exam</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.exam_schedule.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Exam Schedule</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.grade.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Grade</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.exam_attendance.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Exam Attendance</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Mark</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.mark.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Mark</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.mark_distribution.index') }}">
                                        <i class="fe-airplay"></i>
                                        <span>Mark Distribution</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Accounts</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.fee-type.index') }}">
                                        {{-- <i class="fe-airplay"></i> --}}
                                        <span>Fee Type</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.invoice.index') }}">
                                        {{-- <i class="fe-airplay"></i> --}}
                                        <span>Invoices</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="fe-sidebar"></i>
                                <span>Administrator</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('institute.academic_year.index') }}">
                                        {{-- <i class="fe-airplay"></i> --}}
                                        <span>Academic Year</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->


        @yield('content')
        <div class="right-bar">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collap se: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                {{-- <select class="form-control" id="classes">
                                        <option value="">Select Class</option>
                                         @if (count($classes) > 0)
                                        @foreach ($classes as $class_id)
                                            <option value="{{ $class_id }}">{{ $class_id->class_name }}</option>
                                        @endforeach
                                         @endif
                                    </select> --}}
                                <div>
                                    <select id="section" class="form-control">

                                    </select>
                                </div>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($student as $student)
                            <tbody>
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->father_name }}</td>
                                    <td>{{ $student->SchoolClass->name }}</td>
                                    <td>{{ $student->Section->name }}</td>
                                    <td>{{ $student->phone }}</td>

                                    <td>
                                        <label class="badge badge-info">{{ get_status($student->status) }}</label>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-xs"
                                            href="{{ route('institute.student.show', $student->id) }}">
                                            <i class="fas fa-check-square"></i>
                                        </a>
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ route('institute.student.edit', $student->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['institute.student.destroy', $student->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                btn-danger btn-xs',
                                        ]) !!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @endforeach --}}
                            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {

                                        $("#class").on('change', function() {
                                            var idclass = $(this).val();
                                            $("#section").html
                                            $.ajax({
                                                url: "{{ route('index') }}",
                                                type: "GET",
                                                data: {
                                                    class_id: idclass,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                dataType: 'json',
                                                success: function(date) {
                                                    $('#state-dd').html('<option value="">Select State</option>');
                                                    $.each(result.distric, function(key, value) {
                                                        $("#state-dd").append('<option value="' + value
                                                            .id + '">' + value._name + '</option>');
                                                    });
                                                    $('#city-dd').html('<option value="">Select City</option>');
                                                }
                                            });
                                        });
                                    });
                                </script> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="{{ asset('assets/images/layouts/light.png') }}" class="img-fluid img-thumbnail"
                            alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch"
                            checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('assets/images/layouts/dark.png') }}" class="img-fluid img-thumbnail"
                            alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                            data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}"
                            data-appStyle="{{ asset('assets/css/app-dark.min.css') }}" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('assets/images/layouts/rtl.png') }}" class="img-fluid img-thumbnail"
                            alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                            data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('assets/images/layouts/dark-rtl.png') }}" class="img-fluid img-thumbnail"
                            alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch"
                            data-bsStyle="assets/css/bootstrap-dark.min.css"
                            data-appStyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/y2YAD" class="btn btn-danger btn-block mt-3" target="_blank"><i
                            class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2023 - Developed by <a href="https://orasoft.pk">OraSoft.pk</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a> -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>

    @yield('script')

    @livewireScripts
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                type: event.detail.type,
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
            });
            if (event.detail.reload) {
                location.reload();
            }
        });

        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                type: event.detail.type,
                title: event.detail.title,
                text: event.detail.text,
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes sure!"
            }).then(function(t) {
                if (t.value) {
                    window.livewire.emit('change', event.detail.id);
                } else if (event.detail.reload) {
                    location.reload();
                }
            })
        });
    </script>


    @if ($message = Session::get('success'))
        <script>
            $.toast({
                heading: "Well done!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "success",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            $.toast({
                heading: "Oh snap!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#bf441d",
                icon: "error",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif

    <?php
    if (count($errors) > 0) :
        $allerrors = '<ul>';
        foreach ($errors->all() as $error) :
            $allerrors .= '<li>' . $error . '</li>';
        endforeach;
        $allerrors .= '</ul>';
    ?>

    <script>
        $.toast({
            heading: "Oh snap!",
            text: "{!! $allerrors !!}",
            position: "top-right",
            loaderBg: "#bf441d",
            icon: "error",
            hideAfter: 3e3,
            stack: 1
        })
    </script>
    <?php endif ?>
</body>

</html>
