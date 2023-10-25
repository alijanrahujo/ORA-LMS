 @extends('layouts.institute')
 @section('title', 'Invoices Create')
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">institute Invoices</a> </li>
                                     <li class="breadcrumb-item active">Create</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Invoices Create</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::open([
                                 'route' => ['institute.invoice.store'],
                                 'method' => 'post',
                                 'enctype' => 'multipart/form-data',
                                 'class' => 'parsley-examples',
                                 'novalidate' => '',
                             ]) !!}
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Data<span class="text-danger">*</span></label>
                                         {!! Form::date('date', null, [
                                             'placeholder' => 'Date',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>amount<span class="text-danger">*</span></label>
                                         {!! Form::text('amount', null, [
                                             'placeholder' => 'amount',
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
                                         <label>Fee type<span class="text-danger">*</span></label>
                                         {!! Form::select('fee_type_id', $fee_types, null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Class<span class="text-danger">*</span></label>
                                         {!! Form::select('class_id', $classes, null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Section<span class="text-danger">*</span></label>
                                         {!! Form::select('section_id', $sections, null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Student<span class="text-danger">*</span></label>
                                         {!! Form::select('student_id', $students, null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>remarks<span class="text-danger">*</span></label>
                                         {!! Form::date('remarks', null, [
                                             'placeholder' => 'remarks',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Status<span class="text-danger">*</span></label>
                                         {!! Form::select('status', [1 => 'Paid', 0 => 'Unpaid'], null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>

                                 </div>
                                 <div class="form-group text-right mb-0 ">
                                     <button class="btn btn-primary waves-effect waves-light mr-1 " type="submit">
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
             <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

             <!-- Validation init js-->
             <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

             <script src="{{ asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
             <script src="{{ asset('assets/libs/autonumeric/autoNumeric-min.js') }}"></script>
             <script src="{{ asset('assets/js/pages/form-masks.init.js') }}"></script>

         @endsection
