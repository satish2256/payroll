<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payroll | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
{{--        {{dd($data)}}--}}
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 class="page-header">
                    <i class="fas fa-globe"></i> PaySlip<br>
                  @foreach($data['salaries'] as $salary)
{{--                        <td><td class="sorting_1">{{$salary->employee->created_at}} </td>--}}
                   @endforeach
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col center-block">

                <address>
                    <strong><td class="sorting_1">{{$salary->employee->name}}</td><br>
                    Address:<td class="sorting_1">{{$salary->employee->address}}<br>
                    Phone: <td class="sorting_1">{{$salary->employee->phone}}<br>
                    UserName: <td class="sorting_1">{{$salary->employee->username}}<br>
                    Email: <td class="sorting_1">{{$salary->employee->email}}</td>
                    </strong>
                </address>
            </div>
        </div>
        <br>


        <div class="row invoice-info">
            <div class="col-12">
                <table class="" border="1px">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>Basic</th>
                        <th>Deduction </th>
                        <th>Medical Allowance</th>
                        <th>Dearnee Allowance</th>
                        <th>Travelling Allowance</th>
                        <th>House Rent Allowance</th>
                        <th>Bonous</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['salaries'] == $data['salaries']->count() > 0 )

                        @foreach($data['salaries'] as $salary)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{$salary->employee->name}}</td>
                                <td class="sorting_1">{{ $salary->basic }}</td>
                                <td class="sorting_1">{{ $salary->deduction_id }}</td>
                                <td class="sorting_1">{{ $salary->medical_allowance }}</td>
                                <td class="sorting_1">{{ $salary->dearness_allowance }}</td>
                                <td class="sorting_1">{{ $salary->travelling_allowance }}</td>
                                <td class="sorting_1">{{ $salary->house_rent_allowance }}</td>
                                <td class="sorting_1">{{ $salary->bonus }}</td>
                                <td class="sorting_1">{{ $salary->total_amount }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Data Not Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

{{--        <div class="row">--}}
{{--            <!-- accepted payments column -->--}}
{{--            <div class="col-6">--}}
{{--                <p class="lead">Payment Methods:</p>--}}
{{--                <img src="/backend/dist/img/credit/visa.png" alt="Visa">--}}
{{--                <img src="/backend/dist/img/credit/mastercard.png" alt="Mastercard">--}}
{{--                <img src="/backend/dist/img/credit/american-express.png" alt="American Express">--}}
{{--                <img src="/backend/dist/img/credit/paypal2.png" alt="Paypal">--}}

{{--                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">--}}
{{--                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr--}}
{{--                    jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--            <div class="col-6">--}}
{{--                <p class="lead">Amount Due 2/22/2014</p>--}}

{{--                <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">Subtotal:</th>--}}
{{--                            <td>{{ $salary->total_amount }}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Tax (9.3%)</th>--}}
{{--                            <td>$10.34</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Shipping:</th>--}}
{{--                            <td>$5.80</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Total:</th>--}}
{{--                            <td>$265.24</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

