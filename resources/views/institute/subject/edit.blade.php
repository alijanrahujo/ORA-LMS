@extends('layouts.superadmin')
@section('title', 'Subject Edit')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Subject</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Subject Edit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        {!! Form::model($subject, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['institute.subject.update', $subject->id],'class'=>'parsley-examples','novalidate'=>'']) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Subject<span class="text-danger">*</span></label>
                                    {!! Form::text('subject', $subject->name, array('placeholder' => 'Subject','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class<span class="text-danger">*</span></label>
                                    {!! Form::select('class_id', $class ,null,['placeholder'=>'Select','class'=>'form-control']) !!}                                
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teacher<span class="text-danger">*</span></label>
                                    {!! Form::select('teacher_id', $teacher ,null,['placeholder'=>'Select','class'=>'form-control']) !!}                                
                                </div>
                            </div>
                       
                            
                        </div>

                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                Cancel
                            </button>
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
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <!-- Validation init js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

    @endsection