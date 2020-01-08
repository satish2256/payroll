@extends('layouts.app')
@section('title','Payroll')
@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Payroll.
                                        <small class="float-right">Date: 9/2/2019</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
{{--                            <!-- info row -->--}}
{{--                            <div class="row invoice-info">--}}
{{--                                <div class="col-sm-4 invoice-col">--}}
{{--                                    From--}}
{{--                                    <address>--}}
{{--                                        <strong>Admin, Inc.</strong><br>--}}
{{--                                        795 Folsom Ave, Suite 600<br>--}}
{{--                                        San Francisco, CA 94107<br>--}}
{{--                                        Phone: (804) 123-5432<br>--}}
{{--                                        Email: info@almasaeedstudio.com--}}
{{--                                    </address>--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-4 invoice-col">--}}
{{--                                    To--}}
{{--                                    <address>--}}
{{--                                        <strong>John Doe</strong><br>--}}
{{--                                        795 Folsom Ave, Suite 600<br>--}}
{{--                                        San Francisco, CA 94107<br>--}}
{{--                                        Phone: (555) 539-1037<br>--}}
{{--                                        Email: john.doe@example.com--}}
{{--                                    </address>--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-4 invoice-col">--}}
{{--                                    <b>Invoice #007612</b><br>--}}
{{--                                    <br>--}}
{{--                                    <b>Order ID:</b> 4F3S8J<br>--}}
{{--                                    <b>Payment Due:</b> 2/22/2014<br>--}}
{{--                                    <b>Account:</b> 968-34567--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Employee Name</th>
                                            <th>Cash Advance</th>
                                            <th>Deduction Amount</th>
                                            <th>Basic Salary</th>
                                            <th>Description</th>
                                            <th>Net Pay</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Call of Duty</td>
                                            <td>9000</td>
                                            <td>5000</td>
                                            <td>20000</td>
                                            <td>El snort testosterone trophy driving gloves handsome</td>
                                            <td>$64.50</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Need for Speed IV</td>
                                            <td>4000</td>
                                            <td>4000</td>
                                            <td>25000</td>
                                            <td>Wes Anderson umami biodiesel</td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Monsters DVD</td>
                                            <td>6000</td>
                                            <td>3000</td>
                                            <td>30000</td>
                                            <td>Terry Richardson helvetica tousled street art master</td>
                                            <td>$10.70</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Grown Ups Blue Ray</td>
                                            <td>8000</td>
                                            <td>2000</td>
                                            <td>35000</td>
                                            <td>Tousled lomo letterpress</td>
                                            <td>$25.99</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
{{--                                <div class="col-6">--}}
{{--                                    <p class="lead">Payment Methods:</p>--}}
{{--                                    <img src="/backend/dist/img/credit/visa.png" alt="Visa">--}}
{{--                                    <img src="/backend/dist/img/credit/mastercard.png" alt="Mastercard">--}}
{{--                                    <img src="/backend/dist/img/credit/american-express.png" alt="American Express">--}}
{{--                                    <img src="/backend/dist/img/credit/paypal2.png" alt="Paypal">--}}

{{--                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">--}}
{{--                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem--}}
{{--                                        plugg--}}
{{--                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
{{--                                    </p>--}}
{{--                                </div> <!-- accepted payments column -->--}}
{{--                              --}}
{{--                                <!-- /.col -->--}}
                                <div class="col-12">
                                    <p class="lead">TOTAL SALARY 9/2/2019</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$250.30</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>$265.24</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                        <i class="fa fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
@endsection
