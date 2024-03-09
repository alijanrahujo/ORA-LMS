@extends('layouts.institute')
@section('title', 'mark')
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
                                    <li class="breadcrumb-item active">Marks</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Marks details</h4>
                        </div>


                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-3 card-box table-responsive">
                        <img src="{{ asset('assets/images/attached-files/user.png') }}" alt="Profile Picture"
                            class="img-fluid rounded-circle mx-auto d-block" style="width: 100px; height: 100px;">
                        <h5 style="text-align: center">{{ $mark->student_name }}</h5>
                        <p style="text-align: center"> Student</p>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Roll Number:</td>
                                    <td>{{ $mark->roll }}</td>
                                </tr>
                                <tr>
                                    <td>Class:</td>
                                    <td>{{ $mark->SchoolClass->name }}</td>
                                </tr>
                                <tr>
                                    <td>Section:</td>
                                    <td>{{ $mark->Section->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-1">
                    </div>

                    <div class="col-8">
                        <div class="card-box table-responsive table table-bordered ">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2" style="background-color: #d4cecf;">Obt-Marks</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-align:left; background-color: rgb(240, 232, 232);"
                                            colspan="6">Final Term</td>
                                    </tr>
                                    <tr class="border-4 border-warning">
                                        <td class='border pt-5' rowspan="2">Subject</td>
                                        <td class="border" colspan="3">Exam</td>
                                        <td class="border" colspan="3">Total</td>
                                    </tr>
                                    <tr class="border-4 border-warning">
                                        <td class="border">Max Mark</td>
                                        <td class="border">Min Mark</td>
                                        <td class="border">Obt Mark</td>
                                        <td class="border">Percentage</td>
                                        <td class="border">Remarks</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalMarks = 0;
                                        $totalObtMarks = 0;
                                    @endphp
                                    @foreach ($student->marks as $mark)
                                        <tr class="border-4 border-warning">
                                            <td class="border">{{ $mark->Subject->subject }}</td>
                                            <td class="border">{{ $mark->Subject->marks }}</td>
                                            <td class="border">{{ $mark->marks }}</td>
                                            <td class="border">{{ $mark->obt }}</td>
                                            <td class="border">{{ ($mark->obt / $mark->subject->marks) * 100 }}%</td>
                                            <td class="border"></td>
                                        </tr>
                                        @php
                                            $totalMarks += $mark->Subject->marks;
                                            $totalObtMarks += $mark->obt;
                                        @endphp
                                    @endforeach
                                    <tr>

                                        <td colspan="3"><strong>Total Marks : </strong>{{ $totalMarks }}</td>
                                        @if ($totalMarks > 0)
                                            <td colspan="3"><strong>Obt Marks : </strong>{{ $totalObtMarks }}</td>
                                        @else
                                            <td class="border">N/A</td>
                                        @endif
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
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
