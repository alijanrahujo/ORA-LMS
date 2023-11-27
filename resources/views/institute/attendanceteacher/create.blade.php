 @extends('layouts.institute')
 @section('title', 'Teacher Attendance Create')
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Teacher Attendance</a></li>
                                     <li class="breadcrumb-item active">Add</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Teacher Attendance Create</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">

                         <div class="card-box">
                             {!! Form::open([
                                 'route' => ['institute.teacher_attendance.create'],
                                 'method' => 'post',
                                 'enctype' => 'multipart/form-data',
                                 'class' => 'parsley-examples',
                                 'novalidate' => '',
                             ]) !!}
                             <div class="row-6">
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
                                 'route' => ['institute.teacher_attendance.store'],
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
                                             <th>Email</th>
                                             <th>Phone</th>
                                             <th>Attendance</th>

                                         </tr>
                                         @foreach ($teachers as $teacher)
                                             <tr>
                                                 <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $teacher->name }}</td>
                                                 <td>{{ $teacher->email }}</td>
                                                 <td>{{ $teacher->phone }}</td>
                                                 <td>
                                                     {{--
                                                     {!! Form::select('attendance', [1 => 'present', 2 => 'lateExcuse', 3 => 'late', 4 => 'absent'], null, [
                                                         'placeholder' => 'Please Select',
                                                         'class' => 'form-control',
                                                         'data-toggle' => 'select2',
                                                         'parsley-trigger' => 'change',
                                                         'required' => 'required',
                                                     ]) !!} --}}
                                                     <div class="form-check">
                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $teacher->id }}"
                                                                 id="{{ $teacher->id }}" value="1">
                                                             <label class="form-check-label" for="present">
                                                                 Present
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $teacher->id }}"
                                                                 id="{{ $teacher->id }}" value="2">
                                                             <label class="form-check-label" for="lateExcuse">
                                                                 Late Present With Excuse
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $teacher->id }}"
                                                                 id="{{ $teacher->id }}" value="3">
                                                             <label class="form-check-label" for="late">
                                                                 Late Present
                                                             </label>
                                                         </div>

                                                         <div class="form-check-inline">
                                                             <input class="form-check-input" type="radio"
                                                                 name="attendance[].{{ $teacher->id }}"
                                                                 id="{{ $teacher->id }}" value="4">
                                                             <label class="form-check-label" for="absent">
                                                                 Absent
                                                             </label>
                                                         </div>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <input type="hidden" name="teacher_id[]" value="{{ $teacher->id }}">
                                         @endforeach

                                         <input type="hidden" name="date" value="{{ $date }}">
                                         <input type="hidden" name="status" value="{{ $status }}">

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
