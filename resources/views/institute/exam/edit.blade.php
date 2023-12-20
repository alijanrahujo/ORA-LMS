@extends('layouts.institute')
@section('title', 'Exam Edit')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Exam</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Exam Edit</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            {!! Form::model($exam, [
                                'enctype' => 'multipart/form-data',
                                'method' => 'PATCH',
                                'route' => ['institute.exam.update', $exam->id],
                            ]) !!}

                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Exam Name<span class="text-danger">*</span></label>
                                        {!! Form::text('exam_name', $exam->exam_name, [
                                            'placeholder' => 'exam_name',
                                            'class' => 'form-control',
                                            'parsley-trigger' => 'change',
                                            'required' => 'required',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date<span class="text-danger">*</span></label>
                                        {!! Form::date('date', $exam->date, [
                                            'placeholder' => 'date',
                                            'class' => 'form-control',
                                            'parsley-trigger' => 'change',
                                            'required' => 'required',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Note<span class="text-danger">*</span></label>
                                        {!! Form::text('note', $exam->note, [
                                            'placeholder' => 'note',
                                            'class' => 'form-control',
                                            'parsley-trigger' => 'change',
                                            'required' => 'required',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class='col-6'>
                                    <div class="form-group mt-3">
                                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div> <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->
        </div> <!-- end content -->
    @endsection

    @section('script')
        <!-- Plugin js-->
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

        <!-- Validation init js-->
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

        <script src="{{ asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('assets/libs/autonumeric/autoNumeric-min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-masks.init.js') }}"></script>
    @endsection
