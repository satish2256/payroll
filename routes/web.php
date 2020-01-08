<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/
Route::get('',function(){
    return view('auth.login');
});

//Route::get('employee',function(){
//    return view('auth.employeelogin');
//});

Route::get('/users', 'UserController@index');
Route::get('/users/print/{id}', 'UserController@report')->name('user.print');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('invoice',function(){
//    return view('invoice');
//});


Route::prefix('/backend/')->middleware('auth')->namespace('Backend')->group( function() {
//listing page
    Route::get('employee', 'EmployeeController@index')->name('employee.index');
//insert form
    Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
//data store
    Route::post('employee', 'EmployeeController@store')->name('employee.store');
//view details of employee
    Route::get('employee/{id}', 'EmployeeController@show')->name('employee.show');
//edit for employee
    Route::get('employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
//update for employee
    Route::put('employee/{id}', 'EmployeeController@update')->name('employee.update');
//delete for of employee
    Route::delete('employee/{id}', 'EmployeeController@destroy')->name('employee.destroy');

    Route::post('employee/cashadvance', 'EmployeeController@cashadvance')->name('employee.cashadvance');
    Route::post('employee/deduction', 'EmployeeController@deduction')->name('employee.deduction');

//listing page
    Route::get('department', 'DepartmentController@index')->name('department.index');
//insert form
    Route::get('department/create', 'DepartmentController@create')->name('department.create');
//data store
    Route::post('department', 'DepartmentController@store')->name('department.store');
//view details of department
    Route::get('department/{id}', 'DepartmentController@show')->name('department.show');
//edit for department
    Route::get('department/{id}/edit', 'DepartmentController@edit')->name('department.edit');
//update for department
    Route::put('department/{id}', 'DepartmentController@update')->name('department.update');
//delete for of department
    Route::delete('department/{id}', 'DepartmentController@destroy')->name('department.destroy');

        //listing page
    Route::get('user', 'UserController@index')->name('user.index');
//insert form
    Route::get('user/create', 'UserController@create')->name('user.create');
//data storez
    Route::post('user', 'UserController@store')->name('user.store');
//view details of user
    Route::get('user/{id}', 'UserController@show')->name('user.show');
//edit for user
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
//update for user
    Route::put('user/{id}', 'UserController@update')->name('user.update');
//delete for of user
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');

    //listing page
    Route::get('salary', 'SalaryController@index')->name('salary.index');
//insert form
    Route::get('salary/create', 'SalaryController@create')->name('salary.create');
//data store
    Route::post('salary', 'SalaryController@store')->name('salary.store');
//view details of salary
    Route::get('salary/{id}', 'SalaryController@show')->name('salary.show');
//edit for salary
    Route::get('salary/{id}/edit', 'SalaryController@edit')->name('salary.edit');
//update for salary
    Route::put('salary/{id}', 'SalaryController@update')->name('salary.update');
//delete for of salary
    Route::delete('salary/{id}', 'SalaryController@destroy')->name('salary.destroy');

    Route::get('cashadvance/deduction', 'CashadvanceController@cashadvance')->name('cashadvance.deduction');

    //listing page
    Route::get('deduction', 'DeductionController@index')->name('deduction.index');
//insert form
    Route::get('deduction/create', 'DeductionController@create')->name('deduction.create');
//data store
    Route::post('deduction', 'DeductionController@store')->name('deduction.store');
//view details of deduction
    Route::get('deduction/{id}', 'DeductionController@show')->name('deduction.show');
//edit for deduction
    Route::get('deduction/{id}/edit', 'DeductionController@edit')->name('deduction.edit');
//update for deduction
    Route::put('deduction/{id}', 'DeductionController@update')->name('deduction.update');
//delete for of deduction
    Route::delete('deduction/{id}', 'DeductionController@destroy')->name('deduction.destroy');

    //listing page
    Route::get('cashadvance', 'CashAdvanceController@index')->name('cashadvance.index');
//insert form
    Route::get('cashadvance/create', 'CashAdvanceController@create')->name('cashadvance.create');
//data store
    Route::post('cashadvance', 'CashAdvanceController@store')->name('cashadvance.store');
//view details of cashadvance
    Route::get('cashadvance/{id}', 'CashAdvanceController@show')->name('cashadvance.show');
//edit for cashadvance
    Route::get('cashadvance/{id}/edit', 'CashAdvanceController@edit')->name('cashadvance.edit');
//update for cashadvance
    Route::put('cashadvance/{id}', 'CashAdvanceController@update')->name('cashadvance.update');
//delete for of cashadvance
    Route::delete('cashadvance/{id}', 'CashAdvanceController@destroy')->name('cashadvance.destroy');

    //listing page
    Route::get('position', 'PositionController@index')->name('position.index');
//insert form
    Route::get('position/create', 'PositionController@create')->name('position.create');
//data store
    Route::post('position', 'PositionController@store')->name('position.store');
//view details of position
    Route::get('position/{id}', 'PositionController@show')->name('position.show');
//edit for position
    Route::get('position/{id}/edit', 'PositionController@edit')->name('position.edit');
//update for position
    Route::put('position/{id}', 'PositionController@update')->name('position.update');
//delete for of position
    Route::delete('position/{id}', 'PositionController@destroy')->name('position.destroy');


    //listing page
    Route::get('attendance', 'AttendanceController@index')->name('attendance.index');
//insert form
    Route::get('attendance/create', 'AttendanceController@create')->name('attendance.create');
//data store
    Route::post('attendance', 'AttendanceController@store')->name('attendance.store');
//view details of attendance
    Route::get('attendance/{id}', 'AttendanceController@show')->name('attendance.show');
//edit for attendance
    Route::get('attendance/{id}/edit', 'AttendanceController@edit')->name('attendance.edit');
//update for attendance
    Route::put('attendance/{id}', 'AttendanceController@update')->name('attendance.update');
//delete for of attendance
    Route::delete('attendance/{id}', 'AttendanceController@destroy')->name('attendance.destroy');
//

});