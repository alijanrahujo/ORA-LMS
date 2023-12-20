 @extends('layouts.institute')
 @section('title', 'Exam Attendance Create')
 @section('content')

     <div class="content-page">
         <div class="content">
             {!! Form::open([
                 'route' => ['institute.exam_attendance.store'],
                 'method' => 'post',
                 'enctype' => 'multipart/form-data',
                 'class' => 'parsley-examples',
                 'novalidate' => '',
             ]) !!}
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
                             <h4 class="page-title">Exam Attendance Create</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card-box">
                             <div class="row">
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
                                         <label>Exam<span class="text-danger">*</span></label>
                                         {!! Form::select('exam_id', $exam, null, [
                                             'placeholder' => 'Please Select',
                                             'class' => 'form-control',
                                             'data-toggle' => 'select2',
                                             'parsley-trigger' => 'change',
                                             'required' => 'required',
                                         ]) !!}
                                     </div>
                                 </div>
                                 {{--
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
                                 </div> --}}
                             </div>

                             <div class="form-group text-right mb-0">
                                 <button class="btn btn-primary waves-effect waves-light mr-1 getStudent" type="button">
                                     Submit
                                 </button>
                             </div>
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
                             <div class="row">
                                 <div class="col-12">
                                     <table id="attendanceTable" class="table table-stripped table table-bordered">
                                         <thead>
                                             <tr>
                                                 <th>S.No</th>
                                                 <th>Name</th>
                                                 <th>Section</th>
                                                 <th>Roll-Number</th>
                                                 <th>Mobile</th>
                                                 <th>Attendance</th>
                                             </tr>
                                         </thead>
                                         <tbody></tbody>
                                     </table>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <div class="form-group text-right mb-0">
                                             <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                 Submit
                                             </button>

                                         </div>

                                     </div> <!-- end card-box -->
                                 </div>
                                 <!-- end col -->
                             </div>

                             <!-- end row -->
                         </div> <!-- end card -->
                     </div> <!-- end col -->
                 </div> <!-- end row -->
             </div> <!-- end container-fluid -->
             {!! Form::close() !!}
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
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
     <script>
         $(document).ready(function() {
             var dataTable = $('#attendanceTable').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: {
                     url: "{{ Route('institute.exam_attendance.create') }}", // Replace with your actual server-side endpoint
                     type: 'POST',
                     data: function(d) {
                         d.class_id = $('select[name="class_id"]').val();
                         d.section_id = $('select[name="section_id"]').val();
                         d.exam_id = $('select[name="exam_id"]').val();
                         d.subject_id = $('select[name="subject_id"]')
                             .val(); // Uncomment this line if subject_id is needed
                         //  d.status = $('select[name="status"]').val();
                         //  d.date = $('input[name="date"]').val();
                         d._token = "{{ csrf_token() }}";
                     },
                 },
                 columns: [
                     // Define your DataTable columns here based on your server-side response
                     {
                         data: 'id',
                         classname: 'id'
                     },
                     {
                         data: 'name',
                         classname: 'name'
                     },
                     {
                         data: 'section_id',
                         classname: 'section_id'
                     },
                     {
                         data: 'roll_number',
                         classname: 'roll_number'
                     },
                     {
                         data: 'mobile',
                         classname: 'mobile'
                     },
                     {
                         data: 'action',
                         classname: 'action'
                     },
                     // Add more columns as needed
                 ],
             });

             $('.getStudent').click(function() {
                 // Refresh DataTable on button click

                 dataTable.ajax.reload();

             });
         });
     </script>

 @endsection
