@extends('layouts.institute')
@section('title', 'Attendance Student')
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
                                    <li class="breadcrumb-item active">Student Attendance</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Student Attendance</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <a href="{{ route('institute.student_attendance.create') }}" class="btn btn-success mb-2">
                    <i class="fa fa-plus"></i> Add Student Attendance
                </a>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S.N0</th>
                                        <th>Student Name</th>
                                        <th>Section</th>
                                        <th>Class</th>
                                        {{-- <th>Subject</th> --}}
                                        <th>Date</th>
                                        <th>Attendance</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendance_student as $attendance_student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance_student->student_name }}</td>
                                            <td>{{ $attendance_student->Section->name }}</td>
                                            <td>{{ $attendance_student->SchoolClass->name }}</td>
                                            {{-- <td>{{ $attendance_student->subject_id }}</td> --}}
                                            <td>{{ $attendance_student->date }}</td>
                                            <td>
                                                @if ($attendance_student->attendance == 1)
                                                    Present
                                                @elseif($attendance_student->attendance == 2)
                                                    Late Present With Excuse
                                                @elseif($attendance_student->attendance == 3)
                                                    Late Present
                                                @elseif($attendance_student->attendance == 4)
                                                    Absent
                                                @else
                                                    Unknown Status
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Assuming get_status() is a function you have defined --}}
                                                <label
                                                    class="badge badge-info">{{ get_status($attendance_student->status) }}</label>
                                            </td>
                                            <td>
                                                {{-- <a class="btn btn-success btn-xs"
                                                    href="{{ route('institute.student_attendance.show', $attendance_student->id) }}">
                                                    <i class="fas fa-check-square"></i>
                                                </a> --}}
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['institute.student_attendance.destroy', $attendance_student->id],
                                                    'style' => 'display:inline',
                                                ]) !!}

                                                {!! Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
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
