 @extends('layouts.institute')
 @section('title', 'Grade Edite')
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Grade</a></li>
                                     <li class="breadcrumb-item active">Edite</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Grade Edite </h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::model($grades, [
                                 'enctype' => 'multipart/form-data',
                                 'method' => 'PATCH',
                                 'route' => ['institute.grade.update', $grades->id],
                             ]) !!}
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Grade Name<span class="text-danger">*</span></label>
                                         {!! Form::text('grade_name', $grades->grade_name, [
                                             'placeholder' => 'Grade',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Grade Point<span class="text-danger">*</span></label>
                                         {!! Form::text('grade_point', $grades->grade_point, [
                                             'placeholder' => 'Grade',
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
                                         <label>Mark From<span class="text-danger">*</span></label>
                                         {!! Form::number('mark_from', $grades->mark_from, [
                                             'placeholder' => 'Percentage',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Mark Upto <span class="text-danger">*</span></label>
                                         {!! Form::number('mark_to', $grades->mark_to, [
                                             'placeholder' => 'Percentage',
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
                                         <label>note<span class="text-danger">*</span></label>
                                         {!! Form::text('note', $grades->note, [
                                             'placeholder' => 'note',
                                             'class' => 'form-control',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
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
