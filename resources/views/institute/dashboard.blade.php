@extends('layouts.institute')
@section('title', 'Dashboard')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Welcome to New Ora-Tec</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!--  starting main  content section -->
                <a href=>

                </a>
                <div class="row dashboard px-2">

                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">

                        <a href="{{ route('institute.dashboard') }}">
                            <div>
                                <img src="{{ asset('assets/image/dashboard.png') }}" alt="Dashboard Pic">
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title text-center">Dashboard</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <a href="{{ route('institute.student.index') }}">
                            <div> <img src="{{ asset('assets/image/graduated.png') }}" alt="student Pic"> </div>
                            <div class="card-body ">
                                <h5 class="card-title text-center">student</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <a href="{{ route('institute.guardian.index') }}">
                            <div><img src="{{ asset('assets/image/parents.png') }}" alt="parents Pic"></div>
                            <div class="card-body ">
                                <h5 class="card-title text-center">Parents</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <a href="{{ route('institute.teacher.index') }}">
                            <div><img src="{{ asset('assets/image/teacher.png') }}" alt="teacher Pic"></div>
                            <div class="card-body ">
                                <h5 class="card-title text-center">Teacher</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/team.png') }}" alt="user Pic"></div>
                        <div class="card-body ">
                            <h5 class="card-title text-center">User</h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/chat.png') }}" alt="Message Pic"></div>
                        <div class="card-body ">
                            <h5 class="card-title text-center">Message</h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/digital-marketing.png') }}" alt="Media Pic"></div>
                        <div class="card-body ">
                            <h5 class="card-title text-center">Media</h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/email.png') }}" alt="Mail/Sms Pic"></div>
                        <div class="card-body ">
                            <h5 class="card-title text-center">Mail/Sms</h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/online addmission.png') }}" alt="online addmission"></div>
                        <div class="card-body ">
                            <h5 class="card-title text-center">Online Addmission</h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 mx-2 card text-center">
                        <div><img src="{{ asset('assets/image/visitor information.png') }}" alt="Visitor Information">
                        </div>
                        <div class="card-body ">
                            <h5 class="card-title text-center text-sm">Visitor Information</h5>
                        </div>
                    </div>

                </div>
                <!--- end row -->

                <!-- cards -->
                <div class="row dashboard my-4 ">
                    <div class="col-md-3">
                        <div class=" card_inside p-3 " id="card1">
                            <div>
                                @php
                                    $academic_year_id = Auth::user()->academic_id;
                                    $students = \App\Models\Student::where('academic_year_id', $academic_year_id)
                                        ->with('SchoolClass')
                                        ->get();
                                    $studentCount = $students->count();
                                @endphp

                                <h3>{{ $studentCount }}</h3>
                                <p>Students</p>
                            </div>
                            <i class="fa-solid fa-user-graduate"></i>
                            <!-- <i class="mdi mdi-currency-usd border rounded-full  primary p-3 display-6"></i> -->

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class=" card_inside p-3 " id="card2">
                            <div>

                                @php
                                    $parentCount = \App\MOdels\Guardian::count();
                                @endphp
                                <h3>{{ $parentCount }}</h3>
                                <p>Parents</p>
                            </div>
                            <i class="fa-solid fa-house-chimney-user"></i>
                            <!-- <i class="mdi mdi-currency-usd border rounded-full  primary p-3 display-6"></i> -->

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class=" card_inside p-3 " id="card3">
                            <div>
                                @php
                                    $academic_year_id = Auth::user()->academic_id;
                                    $teachers = \App\Models\Teacher::where('academic_year_id', $academic_year_id)
                                        ->with('AcademicYear')
                                        ->get();
                                    $teacherCount = $teachers->count();
                                @endphp

                                <h3>{{ $teacherCount }}</h3>
                                <p>Teachers</p>
                            </div>
                            <i class="fa-solid fa-person-chalkboard"></i>
                            <!-- <i class="mdi mdi-currency-usd border rounded-full  primary p-3 display-6"></i> -->

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class=" card_inside p-3 " id="card4">
                            <div class="">
                                @php
                                    $subjectCount = \App\Models\Subject::count();
                                @endphp

                                <h3>{{ $subjectCount }}</h3>
                                <p>Subjects</p>

                            </div>
                            <i class="fa-solid fa-book"></i>
                            <!-- <i class="mdi mdi-currency-usd border rounded-full  primary p-3 display-6"></i> -->

                        </div>

                    </div>
                </div>

            </div>
            <!-- end container-fluid -->

        </div> <!-- starting main  content section -->
    @endsection

    @section('script')
        <!--C3 Chart-->
        <script src="{{ asset('assets/libs/d3/d3.min.js') }}"></script>
        <script src="{{ asset('assets/libs/c3/c3.min.js') }}"></script>

        <script src="{{ asset('assets/libs/echarts/echarts.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    @endsection
