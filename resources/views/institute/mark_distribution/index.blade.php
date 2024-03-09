 @extends('layouts.institute')
 @section('title', 'Mark Distribution')
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
                                     <li class="breadcrumb-item active">Institute</li>
                                 </ol>
                             </div>
                             <h4 class="page-title">Add Mark Distribution</h4>
                         </div>
                     </div>
                 </div>
                 <!-- end page title -->
                 <div class="row">

                     <div class="col-md-6 ">
                         <a href="{{ route('institute.mark_distribution.create') }}" class="btn btn-success mb-2">
                             <i class="fa fa-plus"></i> Add Mark Distribution
                         </a>
                     </div>
                     <div class="col-md-4">

                     </div>
                     <div class="col-md-2 text-right">
                         <form action="">
                             <input type="search" name="search" placeholder="Search here" class="form-control">
                         </form>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-12">
                         <div class="card-box table-responsive">

                             <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                 style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                 <thead>
                                     <tr>
                                         <th>S.N0</th>
                                         <th>Mark Distribution</th>
                                         <th>Mark Value(%)</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($mark as $marks)
                                         <tr>
                                             <td>{{ $loop->iteration }}</td>
                                             <td>{{ $marks->mark_distribution }}</td>
                                             <td>{{ $marks->mark_value }}</td>

                                             {{-- <td>{{$teacher->status}}</td>
                                             <td>{{$teacher->action}}</td> --}}

                                             <td>
                                                 <a class="btn btn-warning btn-xs"
                                                     href="{{ route('institute.mark_distribution.edit', $marks->id) }}">
                                                     <i class="far fa-edit"></i>
                                                 </a>
                                             </td>

                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <!-- end row -->

             </div> <!-- end container-fluid -->

         </div> <!-- end content -->
     </div>

 @endsection

 @section('style')
     <!-- third party css -->
     <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
     <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
     <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
 @endsection

 @section('script')

     <!-- Required datatable js -->
     <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
     <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
     <!-- Buttons mark_distributionples -->
     <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
     <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
     <script src="assets/libs/jszip/jszip.min.js"></script>
     <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
     <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
     <script src="assets/libs/datatables/buttons.html5.min.js"></script>
     <script src="assets/libs/datatables/buttons.print.min.js"></script>
     <script src="assets/libs/datatables/buttons.colVis.js"></script>

     <!-- Responsive mark_distributionples -->
     <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
     <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

     <!-- Datatables init -->
     <script src="assets/js/pages/datatables.init.js"></script>

 @endsection
