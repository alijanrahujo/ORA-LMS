{{-- @extends('layouts.institute')
@section('title', 'Invoice')
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
                                    <li class="breadcrumb-item active">Institute/Invoice</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Invoice details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row ">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <div class="row mt border border-4">
                                <div class="col-lg-6">
                                    <strong> Date</strong>
                                    {{ $invoice->date }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Amount</strong>
                                    {{ $invoice->amount }}
                                </div>
                            </div>

                            <div class="row mt-3 border border-4">
                                <div class="col-lg-6">
                                    <strong>Fee Type</strong>
                                    {{ $invoice->fee_type_id }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Class</strong>
                                    {{ $invoice->class_id }}
                                </div>
                            </div>
                            <div class="row mt-3 border border-4">
                                <div class="col-lg-6">
                                    <strong>section</strong>
                                    {{ $invoice->section_id }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Students</strong>
                                    {{ $invoice->student_id }}
                                </div>
                            </div>
                            <div class="row mt-3 border border-4">
                                <div class="col-lg-6">
                                    <strong>Remarks</strong>
                                    {{ $invoice->remarks }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Status</strong>
                                    {{ $invoice->status }}
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
            <!-- Buttons examples -->
            <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
            <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
            <script src="assets/libs/jszip/jszip.min.js"></script>
            <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
            <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
            <script src="assets/libs/datatables/buttons.html5.min.js"></script>
            <script src="assets/libs/datatables/buttons.print.min.js"></script>
            <script src="assets/libs/datatables/buttons.colVis.js"></script>

            <!-- Responsive examples -->
            <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
            <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

            <!-- Datatables init -->
            <script src="assets/js/pages/datatables.init.js"></script>

        @endsection  --}}


{{-- @extends('layouts.institute')
@section('title', 'Invoice')
@section('content') --}}

<!DOCTYPE html>
<html>

<head>
    <title>Receipt</title>
</head>
{{-- <style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style> --}}

<body>
    <div class="container-fluid" style="width: 50% ; margin:auto; ">
        <div>
            <h6 class="text-left m-0 p-0">Candidate Copy</h6>
            <h6 class="text-right m-0 p-0">Receipt #:____________</h6>

        </div>
        <div class="add-detail mt-10">
             
            <div class="w-50 float-left logo mt-10">
                {{-- <img src="https://techsolutionstuff.com/frontTheme/assets/img/logo_200_60_dark.png" alt="Logo"> --}}
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">From</th>
                    <th class="w-50">To</th>
                </tr>
                <tr>
                    <td>
                        <div class="box-text">
                            <p>Mountain View,</p>
                            <p>California,</p>
                            <p>United States</p>
                            <p>Contact: (650) 253-0000</p>
                        </div>
                    </td>
                    <td>
                        <div class="box-text">
                            <p> 410 Terry Ave N,</p>
                            <p>Seattle WA 98109,</p>
                            <p>United States</p>
                            <p>Contact: 1-206-266-1000</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-100">Payment Method</th>
                    <th class="w-100">Shipping Method</th>
                </tr>
                <tr>
                    <td>Cash On Delivery</td>
                    <td>Free Shipping - Free Shipping</td>
                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">SKU</th>
                    <th class="w-50">Product Name</th>
                    <th class="w-50">Price</th>
                    <th class="w-50">Qty</th>
                    <th class="w-50">Subtotal</th>
                    <th class="w-50">Tax Amount</th>
                    <th class="w-50">Grand Total</th>
                </tr>
                <tr align="center">
                    <td>M101</td>
                    <td>Andoid Smart Phone</td>
                    <td>$500.2</td>
                    <td>3</td>
                    <td>$1500</td>
                    <td>$50</td>
                    <td>$1550.20</td>
                </tr>
                <tr align="center">
                    <td>M102</td>
                    <td>Andoid Smart Phone</td>
                    <td>$250</td>
                    <td>2</td>
                    <td>$500</td>
                    <td>$50</td>
                    <td>$550.00</td>
                </tr>
                <tr align="center">
                    <td>T1010</td>
                    <td>Andoid Smart Phone</td>
                    <td>$1000</td>
                    <td>5</td>
                    <td>$5000</td>
                    <td>$500</td>
                    <td>$5500.00</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="total-part">
                            <div class="total-left w-85 float-left" align="right">
                                <p>Sub Total</p>
                                <p>Tax (18%)</p>
                                <p>Total Payable</p>
                            </div>
                            <div class="total-right w-15 float-left text-bold" align="right">
                                <p>$7600</p>
                                <p>$400</p>
                                <p>$8000.00</p>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

{{-- 
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
    <!-- Buttons examples -->
    <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
    <script src="assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables/buttons.print.min.js"></script>
    <script src="assets/libs/datatables/buttons.colVis.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatables init -->
    <script src="assets/js/pages/datatables.init.js"></script>

@endsection --}}
