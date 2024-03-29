@extends('layouts.institute')
@section('title', 'Assignment')
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
                                    <li class="breadcrumb-item active">institute/Assignment</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Assignment details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-lg-6">
                                    <strong>Title</strong>
                                    {{ $assignment->title }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Description</strong>
                                    {{ $assignment->description }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <strong>DeadLine</strong>
                                    {{ $assignment->deadline }}
                                </div>

                                <div class="col-lg-6">
                                    <strong>Section</strong>
                                    {{ $assignment->Section->name }}
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <strong>Class</strong>
                                    {{ $assignment->SchoolClass->name }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Subject</strong>
                                    {{ $assignment->Subject->subject }}
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <strong>File</strong>
                                    {{-- {{ $assignment->file }} --}}
                                    <a href="{{ asset('Assignments/' . $assignment->file) }}" download>
                                        <button>Download File</button>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="row mt-3">
                                <div class="col-lg-6">
                                    <strong>Status:</strong>
                                    {{ $assignment->status ? 'Active' : 'Deactive' }}
                                </div>
                            </div> --}}
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
