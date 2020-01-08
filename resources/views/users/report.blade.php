<!doctype html>
{{--<html lang="{{ app()->getLocale() }}">--}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body onload="window.print();">
        <div class="row">
        <div class="col-12">
            <h1>
                <i class="fas fa-globe"></i> Silver Education Foundation
            </h1>
                Salary Slip
        </div>
            <br>
            <div class="row invoice-info">
                <div class="col-sm-12 invoice-col center-block">

                    <address>
                        <strong>
                                Name:<td class="sorting_1">{{$data['salaries']->employee->name}}</td><br>
                                Address:<td class="sorting_1">{{$data['salaries']->employee->address}}<br>
                                Phone: <td class="sorting_1">{{$data['salaries']->employee->phone}}<br>
                                UserName: <td class="sorting_1">{{$data['salaries']->employee->username}}<br>
                                Email: <td class="sorting_1">{{$data['salaries']->employee->email}}</td>
                        </strong>
                    </address>
                </div>
            </div>
        <!-- /.col -->
    </div>
        <br>
        <div class="row">
            <div class="col-6 table-responsive">
                <table class="table table-striped" border="2px">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>Basic</th>
                        <th>Deduction Amount</th>
                        <th>Medical Allowance</th>
                        <th>Dareness Allowance</th>
                        <th>Travel Allowance</th>
                        <th>House Rent Allowance</th>
                        <th>Bonus</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="sorting_1">{{$data['salaries']->employee->name}}</td>
                        <td class="sorting_1">{{ $data['salaries']->basic }}</td>
                        <td class="sorting_1">{{$data['salaries']->deduction_id }}</td>
                        <td class="sorting_1">{{$data['salaries']->medical_allowance }}</td>
                        <td class="sorting_1">{{$data['salaries']->dearness_allowance }}</td>
                        <td class="sorting_1">{{$data['salaries']->travelling_allowance }}</td>
                        <td class="sorting_1">{{$data['salaries']->house_rent_allowance }}</td>
                        <td class="sorting_1">{{$data['salaries']->bonus }}</td>
                        <td class="sorting_1">{{$data['salaries']->total_amount }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <p class="lead">TOTAL SALARY</p>--}}

{{--                <div class="col-12">--}}
{{--                    <table class="table" border="2px">--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">Subtotal:</th>--}}
{{--                            <td>{{$data['salaries']->total_amount }}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Tax (10%)</th>--}}
{{--                            <td>5000</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Total:</th>--}}
{{--                            <td>25000</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}

    </body>
</html>