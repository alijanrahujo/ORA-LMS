 @extends('layouts.institute')
 @section('title', 'Student Attendance Create')
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Student Attendance</a></li>
                                     <li class="breadcrumb-item active">Add</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Student Attendance Create</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::open([
                                 'route' => ['institute.student_attendance.create'],
                                 'method' => 'post',
                                 'enctype' => 'multipart/form-data',
                                 'class' => 'parsley-examples',
                                 'novalidate' => '',
                             ]) !!}
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Date<span class="text-danger">*</span></label>
                                         {!! Form::date('date', now(), [
                                             'placeholder' => 'Date',
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
                                         <label>Subject<span class="text-danger">*</span></label>
                                         {!! Form::select('subject_id', $subjects, null, [
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
                                         <label>Status<span class="text-danger">*</span></label>
                                         {!! Form::select('status', [1 => 'Active', 0 => 'Deactive'], null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
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

             <div class="container-fluid">

                 <!-- start page title -->

                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::open([
                                 'route' => ['institute.student_attendance.store'],
                                 'method' => 'post',
                                 'enctype' => 'multipart/form-data',
                                 'class' => 'parsley-examples',
                                 'novalidate' => '',
                             ]) !!}
                             <div class="row">
                                 <div class="col-12">
                                     <table class="table table-stripped table table-bordered ">
                                         <tr>
                                             <th>S.No</th>
                                             <th>Name</th>
                                             <th>Roll-Number</th>
                                             <th>Email</th>
                                             <th>Attendance</th>

                                         </tr>
                                         @foreach ($students as $student)
                                             <tr>
                                                 <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $student->student_name }}</td>
                                                 <td>{{ $student->roll_number }}</td>
                                                 <td>{{ $student->email }}</td>
                                                 <td>
                                                     <div class="form-check">
                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $student->id }}"
                                                                 id="{{ $student->id }}" value="1">
                                                             <label class="form-check-label" for="present">
                                                                 Present
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $student->id }}"
                                                                 id="{{ $student->id }}" value="2">
                                                             <label class="form-check-label" for="lateExcuse">
                                                                 Late Present With Excuse
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $student->id }}"
                                                                 id="{{ $student->id }}" value="3">
                                                             <label class="form-check-label" for="late">
                                                                 Late Present
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $student->id }}"
                                                                 id="{{ $student->id }}" value="4">
                                                             <label class="form-check-label" for="absent">
                                                                 Absent
                                                             </label>
                                                         </div>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                         @endforeach

                                         <input type="hidden" name="date" value="{{ $date }}">
                                         <input type="hidden" name="status" value="{{ $status }}">
                                         <input type="hidden" name="class_id" value="{{ $classes }}">
                                         <input type="hidden" name="section_id" value="{{ $sections }}">
                                         <input type="hidden" name="subject_id" value="{{ $subjects }}">
 
                                     </table>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <div class="form-group text-right mb-0">
                                             <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                 Submit
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
