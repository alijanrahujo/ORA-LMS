 @extends('layouts.institute')
 @section('title', 'Exam Schedule Create')
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Exam Schedule</a></li>
                                     <li class="breadcrumb-item active">Add</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Exam Schedule Create</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::open([
                                 'route' => ['institute.exam_schedule.store'],
                                 'method' => 'post',
                                 'enctype' => 'multipart/form-data',
                                 'class' => 'parsley-examples',
                                 'novalidate' => '',
                             ]) !!}
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Exam Name<span class="text-danger">*</span></label>
                                         {!! Form::text('exam_name', null, [
                                             'placeholder' => 'Exam',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Class<span class="text-danger">*</span></label>
                                         {!! Form::select('class_id', $classes, null, [
                                             'placeholder' => 'class',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                             </div>
                             <div class='row'>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Section<span class="text-danger">*</span></label>
                                         {!! Form::select('section_id', $sections, null, [
                                             'placeholder' => 'section',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Subject<span class="text-danger">*</span></label>
                                         {!! Form::select('subject_id', $subjects, null, [
                                             'placeholder' => 'subject',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                             </div>
                             <div class='row'>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Date<span class="text-danger">*</span></label>
                                         {!! Form::date('date', now(), [
                                             'placeholder' => 'date',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Room<span class="text-danger">*</span></label>
                                         {!! Form::text('room', null, [
                                             'placeholder' => 'room',
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
                                         <label>Time From<span class="text-danger">*</span></label>
                                         {!! Form::time('time_from', now(), [
                                             'placeholder' => 'time',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Time To <span class="text-danger">*</span></label>
                                         {!! Form::time('time_to', now(), [
                                             'placeholder' => 'time',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class='col'>
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
