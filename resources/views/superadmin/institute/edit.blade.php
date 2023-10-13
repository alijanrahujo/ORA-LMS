@extends('layouts.superadmin')
@section('title', 'Institute Edit')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Institute</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Institute Edit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        {!! Form::model($institute, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['superadmin.institute.update', $institute->id],'class'=>'parsley-examples','novalidate'=>'']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Institute Name<span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Owner Name<span class="text-danger">*</span></label>
                                    {!! Form::text('owner_name', null, array('placeholder' => 'Owner Name','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CNIC<span class="text-danger">*</span></label>
                                    {!! Form::text('cnic', null, array('placeholder' => 'CNIC','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation<span class="text-danger">*</span></label>
                                    {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    {!! Form::text('address', null, array('placeholder' => 'Enter Address','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City<span class="text-danger">*</span></label>
                                    {!! Form::text('city', null, array('placeholder' => 'Enter City','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number<span class="text-danger">*</span></label>
                                    {!! Form::text('phone', null, array('placeholder' => 'Enter Phone','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Other Contact Number</label>
                                    {!! Form::text('phone2', null, array('placeholder' => 'Enter Other Contact Number','class' => 'form-control','parsley-trigger'=>'change')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sector<span class="text-danger">*</span></label>
                                    {!! Form::select('sector',['Public','Private'], null, ['placeholder'=>'Please Select','class' => 'form-control','data-toggle'=>'select2','parsley-trigger'=>'change','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type<span class="text-danger">*</span></label>
                                    {!! Form::select('type',['School','Centre'], null, ['placeholder'=>'Please Select','class' => 'form-control','data-toggle'=>'select2','parsley-trigger'=>'change','required'=>'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    {!! Form::email('email', $institute->user->email, array('placeholder' => 'Enter Email','class' => 'form-control','parsley-trigger'=>'change','required'=>'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    {!! Form::password('password', array('placeholder' => 'Enter Password','class' => 'form-control','parsley-trigger'=>'change')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    {!! Form::file('logo',["class" => "form-control",'parsley-trigger'=>'change']) !!}
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