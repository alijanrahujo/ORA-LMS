@extends('layouts.institute')
@section('title', 'Teacher Attendance')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">institute/Taecher Attendance</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Teacher Attendance details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @php
                    $firstDayOfMonth = date('1-m-2023');
                    $totalDaysInMonth = date('t', strtotime($firstDayOfMonth));
                    $totalNumberOfTeachers = 5;
                @endphp

                <h3 style="color: darkorange">Teacher Attendance OF current Month
                    {{ strtoupper(date('F', strtotime($firstDayOfMonth))) }}</h3>

                <table border="1" cellspacing="1">
                    @for ($i = 1; $i <= $totalNumberOfTeachers + 2; $i++)
                        @if ($i == 1)
                            <tr>
                                <td rowspan="2">Teacher Name</td>
                                @for ($j = 1; $j <= $totalDaysInMonth; $j++)
                                    <td>{{ $j }}</td>
                                @endfor
                            </tr>
                        @elseif ($i == 2)
                            <tr>
                                @for ($j = 0; $j < $totalDaysInMonth; $j++)
                                    <td>{{ date('D', strtotime("+$j days", strtotime($firstDayOfMonth))) }}</td>
                                @endfor
                            </tr>
                        @else
                            <tr>
                                <td>{{ 'teacher_name' }}</td>
                                @for ($j = 0; $j < $totalDaysInMonth; $j++)
                                    <td></td>
                                @endfor
                            </tr>
                        @endif
                    @endfor
                </table>

                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->
    </div>

@endsection

@section('style')
    <!-- third party css -->
    <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
    <script src="assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables/buttons.print.min.js"></script>
    <script src="assets/libs/datatables/buttons.colVis.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatables init -->
    <script src="assets/js/pages/datatables.init.js"></script>

@endsection
