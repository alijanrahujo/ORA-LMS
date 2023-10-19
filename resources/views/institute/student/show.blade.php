@extends('layouts.institute')
@section('title', 'student')
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
                                <li class="breadcrumb-item active">institute</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Student details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-lg-6">
                                <strong>Name:</strong>
                                {{$student->name}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Father Name:</strong>
                                {{$student->father_name}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Mother Name:</strong>
                                {{$student->mother_name}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Date of Birth:</strong>
                                {{$student->dob}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Gender:</strong>
                                {{$student->gender?'Male':'Female'}}
                            </div>
                            <div class="col-lg-6">
                                <strong>phone:</strong>
                                {{$student->phone}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Mobile:</strong>
                                {{$student->mobile}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Date:</strong>
                                {{$student->date}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Roll Number:</strong>
                                {{$student->roll_number}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Registration Number:</strong>
                                {{$student->reg_number}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Class</strong>
                                {{$student->SchoolClass->name}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Section:</strong>
                                {{$student->section_id}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <strong>Monthly Fee:</strong>
                                {{$student->monthly_fee}}
                            </div>
                            <div class="col-lg-6">
                                <strong>Status:</strong>
                                {{$student->status?'Active':'Deactive'}}
                            </div>

                        </div>
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