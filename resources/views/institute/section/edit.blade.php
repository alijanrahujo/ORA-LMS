@extends('layouts.institute')
@section('title', 'Section Edit')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Section</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Section Edit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">
                    {!! Form::model($section, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['institute.section.update', $section->id],'class'=>'parsley-examples','novalidate'=>'']) !!}
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Capacity<span class="text-danger">*</span></label>
                                    {!! Form::number('capacity', null, array('placeholder' => 'Capacity','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    {!! Form::text('category', null, array('placeholder' => 'category','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teacher<span class="text-danger">*</span></label>
                                    {!! Form::select('teacher_id',$teachers, null, ['placeholder'=>'Please Select','class' => 'form-control','data-toggle'=>'select2','parsley-trigger'=>'change','required'=>'required']) !!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class<span class="text-danger">*</span></label>
                                    {!! Form::select('class_id',$classes, null, ['placeholder'=>'Please Select','class' => 'form-control','data-toggle'=>'select2','parsley-trigger'=>'change','required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status<span class="text-danger">*</span></label>
                                    {!! Form::select('status',[1=>'Active',0=>'Deactive'], null, ['placeholder'=>'Please Select','class' => 'form-control','data-toggle'=>'select2','parsley-trigger'=>'change','required'=>'required']) !!}
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