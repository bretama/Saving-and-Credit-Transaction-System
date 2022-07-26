<?php
use Illuminate\Support\Facades\Request;
use App\VoluntarySaving;
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/vert',function(){
	$pdf = \PDF::loadHTML('<h1>jvbhjvbhbjvhvj</h1>');
	return $pdf->stream();
});

Route::get('generate-pdf','PDFController@generatePDF');

Route::get('/indexx',function(){
	$pdf = PDF::loadView('hhome');
	return $pdf->download('inv.pdf');
});
Route::get('/alldata','AbalatController@all')->name('allmembers');
Route::get('/customers','MonthlySavingController@export_pdf');
Route::get('category', 'DatatablesController@index');
Route::get('get-category-data', 'DatatablesController@categoryData')->name('datatables.category');
Route::resource('ajax-crud-list', 'AbalatsController');
Route::post('ajax-crud-list/store', 'AbalatsController@store');
Route::get('ajax-crud-list/delete/{id}', 'AbalatsController@destroy');
Route::resource('ajaxproducts','ProductAjaxController');

Route::get('/', function () {
   return view('auth.login');
});
// Route::get('/home', function () {
//     return view('hhome');
    
// });

Route::get('/intervalreport','PersonalReportController@index1');
Route::get('/intervalreport1','PersonalReportController@register1');

Route::get('/notsaved','PersonalReportController@index11');
Route::get('/notsaved1','PersonalReportController@register11');

Route::get('/totalreport','PersonalReportController@index111');
Route::get('/totalreport1','PersonalReportController@register111');


Route::get('share','ShareController@index')->name('get.user');
Route::get('shares','ShareController@users')->name('get.user');
Route::get('/members', function () {
    return view('members.create');
});
Route::group(['prefix'=>'posts'],function(){
	Route::get('/searchable','PostController@index');
});
Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);
Route::get('/searchable','PostController@index');
Route::get('/search1','MaterialController@search');
Auth::routes();
Route::get('/importexcel1','AutocompleteController@import_excel1');
Route::get('/brhan','AutocompleteController@indexx');
Route::get('/pdff','AutocompleteController@pdf');
Route::post('/importexcel2','AutocompleteController@import_excel2');
Route::get('/admin', 'HomeController@homee');

Route::resource('ajax-posts', 'AbalatsController');
// Route::resource('ajax-crud', 'ajaxcrudcontroller');
// Route::get('/category', 'HomeController@index');
// Route::get('cat', 'HomeController@create');
// Route::post('store', 'HomeController@store');
//Route::get('edit/{id}', 'HomeController@edit')->name('edit');
//Route::put('update/', 'HomeController@update')->name('update');
//Route::get('/student','StudentController@index'); 
// Route::get('/addstd','StudentController@create');
// Route::post('/store', 'StudentController@store');
//Route::resource('/category', 'CategoriesController');

Route::get('/upload','AutocompleteController@index');
Route::post('/upload','AutocompleteController@action')->name('action');
Route::get('/uploaded','AutocompleteController@index');
Route::post('/uploaded','AutocompleteController@upload')->name('action');
Route::get('/register1', 'CreditController@create');
Route::post('register1', 'CreditController@store');

// Route::get('/listofmembers','ajaxcrudcontroller');
Route::get('/home','AbalatController@report');
Route::get('/listofmembers','AbalatController@display')->name('abalatss');
Route::get('/abalatsearch','AbalatController@search')->name('abalatss');
//Route::get('/abalats/edit','AbalatController@edit');
Route::get('/registerabalat','AbalatController@register');
Route::post('/register1','AbalatController@store');
Route::get('abalatedit/{id}','AbalatController@edit');
Route::post('abalatupdate/{id}','AbalatController@update');
Route::post('/abalatdelete/{id}','AbalatController@destroy');
Route::get('abalatsearch','AbalatController@search');

//==============================================//
// Route::get('/monthly','AbalatController@codemonth');
// Route::get('/children','AbalatController@codechild');
// Route::get('/freeinterest','AbalatController@codefreeinterest');
// Route::get('/timelimit','AbalatController@codetimelimit');
// Route::get('/investment','AbalatController@codeinvestment');
// Route::get('/voluntary','AbalatController@codevoluntary');
//====================================================//
// Route::resource('register','AbalatController1');
// Route::resource('/register1','AbalatController1');

// Route::post('/register1','AbalatController1');

Route::get('/savingdisplay','CreditController@display');
Route::get('/addsaving','SavingController@registersaving');


//saving routes
Route::get('/monthlydisplay','MonthlySavingController@index');
Route::get('/live_search/action','MonthlySavingController@action')->name('live_search.action');
Route::get('/monthlyregister','MonthlySavingController@register');
Route::post('/monthlyregister1','MonthlySavingController@store');
Route::get('monthlyedit/{id}','MonthlySavingController@edit');
Route::post('/monthlyupdate/{id}','MonthlySavingController@update');
Route::post('/monthlydelete/{id}','MonthlySavingController@destroy');
Route::get('/monthlyregister11','MonthlySavingController@updates');
Route::get('/monthlysearch','MonthlySavingController@search');
Route::get('/monthlypayment','MonthlySavingController@sykefelu');
Route::get('/monthlydisplay', 'HomeController@month');
Route::get('/monthlyregister', 'HomeController@monthreg');
Route::get('/monthlydisplay1', 'HomeController@aboveone');
Route::get('/monthlydisplay2', 'HomeController@abovetwo');
Route::get('/monthlydisplay3', 'HomeController@abovethree');
Route::get('/monthlydisplay4', 'HomeController@abovefour');
Route::get('/monthlydisplay5', 'HomeController@abovefive');
Route::get('/monthlydisplay6', 'HomeController@abovesix');
Route::get('/monthlydisplay7', 'HomeController@aboveseven');
Route::get('/monthlydisplay8', 'HomeController@aboveeight');
Route::get('/monthlydisplay12', 'MonthlySavingController@index1');
Route::get('/monthlydisplay13', 'MonthlySavingController@index2');
Route::get('/monthlydisplay14', 'MonthlySavingController@index3');
Route::get('/monthlydisplay15', 'MonthlySavingController@index4');
Route::get('/monthlydisplay16', 'MonthlySavingController@index5');
Route::get('/monthlydisplay17', 'MonthlySavingController@index6');

//saving routes
Route::get('/sharedisplay','ShareController@index');
// Route::get('/live_search/action','MonthlySavingController@action')->name('live_search.action');
Route::get('/shareregister','ShareController@register')->name('shares');
Route::post('/shareregister1','ShareController@store');
Route::get('shareedit/{id}','ShareController@edit');
Route::post('shareupdate/{id}','ShareController@update');
Route::post('/sharedelete/{id}','ShareController@destroy');
Route::get('/searchshare','ShareController@search');

// Route::get('/monthlyregister11','MonthlySavingController@updates');

Route::get('/freeinterestdisplay','FreeInterestSavingController@index');
Route::get('/freeinterestregister','FreeInterestSavingController@register');
Route::post('/freeinterestregister1','FreeInterestSavingController@store');
Route::get('freeinterestedit/{id}','FreeInterestSavingController@edit');
Route::post('/freeinterestupdate/{id}','FreeInterestSavingController@update');
Route::post('/freeinterestdelete/{id}','FreeInterestSavingController@destroy');
Route::get('/freeinterestsearch','FreeInterestSavingController@search');

Route::get('/timelimitdisplay','TimeLimitedSavingController@index');
Route::get('/timelimitregister','TimeLimitedSavingController@register');
Route::post('/timelimitregister1','TimeLimitedSavingController@store');
Route::get('timelimitedit/{id}','TimeLimitedSavingController@edit');
Route::post('/timelimitupdate/{id}','TimeLimitedSavingController@update');
Route::post('/timelimitdelete/{id}','TimeLimitedSavingController@destroy');
Route::get('/timelimitedsearch','TimeLimitedSavingController@search');

Route::get('/voluntarydisplay','VoluntarySavingController@index');
Route::get('/voluntaryregister','VoluntarySavingController@register');
Route::post('/voluntaryregister1','VoluntarySavingController@store');
Route::get('voluntaryedit/{id}','VoluntarySavingController@edit');
Route::post('/voluntaryupdate/{id}','VoluntarySavingController@update');
Route::post('/voluntarydelete/{id}','VoluntarySavingController@destroy');
Route::get('/searchvoluntary', 'VoluntarySavingController@search');
 

Route::get('/investmentdisplay','InvestmentSavingController@index');
Route::get('/investmentregister','InvestmentSavingController@register');
Route::post('/investmentregister1','InvestmentSavingController@store');
Route::get('investmentedit/{id}','InvestmentSavingController@edit');
Route::post('/investmentupdate/{id}','InvestmentSavingController@update');
Route::post('/investmentdelete/{id}','InvestmentSavingController@destroy');
Route::get('investmentsearch','InvestmentSavingController@search');

Route::get('/childrendisplay','ChildrenSavingController@index');
Route::get('/childrenregister','ChildrenSavingController@register');
Route::post('/childrenregister1','ChildrenSavingController@store');
Route::get('childrenedit/{id}','ChildrenSavingController@edit');
Route::post('/childrenupdate/{id}','ChildrenSavingController@update');
Route::post('/childrendelete/{id}','ChildrenSavingController@destroy');
Route::resource('childrenregistration','ChildrenRegistrationController');
Route::get('childrensearch','ChildrenSavingController@search');

Route::get('/penalitydisplay','PenalityController@index');
Route::get('/penalityregister','PenalityController@register');
Route::post('/penalityregister1','PenalityController@store');
Route::get('penalityedit/{id}','PenalityController@edit');
Route::post('/penalityupdate/{id}','PenalityController@update');
Route::post('/penalitydelete/{id}','PenalityController@destroy');
Route::get('penalitysearch','PenalityController@search');

Route::get('/normalcreditdisplay','NormalcreditController@index');
Route::get('/normalcreditregister','NormalcreditController@register');
Route::post('/normalcreditregister1','NormalcreditController@store');
Route::get('/normalcreditedit/{id}','NormalcreditController@edit');
Route::post('/normalcreditupdate/{id}','NormalcreditController@update');
Route::post('/normalcreditdelete/{id}','NormalcreditController@destroy');
Route::get('/creditbutton','NormalcreditController@credit');
Route::get('/normalcreditsearch','NormalcreditController@search');
Route::get('/normalsearch','NormalcreditController@searchnormal');

Route::get('/withdrawaldisplay','WithdrawalController@index');
Route::get('/withdrawalregister','WithdrawalController@register');
Route::post('/withdrawalregister1','WithdrawalController@store');
Route::get('/withdrawaledit/{id}','WithdrawalController@edit');
Route::post('/withdrawalupdate/{id}','WithdrawalController@update');
Route::post('/withdrawaldelete/{id}','WithdrawalController@destroy');
Route::get('/withdrawalbutton','WithdrawalController@credit');
Route::get('/withdrawalsearch','WithdrawalController@search');

Route::get('/materialdisplay','MaterialController@index');
Route::get('/materialregister','MaterialController@register');
Route::post('/materialregister1','MaterialController@store');
Route::get('materialedit/{id}','MaterialController@edit');
Route::post('/materialupdate/{id}','MaterialController@update');
Route::post('/materialdelete/{id}','MaterialController@destroy');
Route::get('materialsearch','MaterialController@search');

//Route::post('/monthlyregister1','MonthlySavingController@store');
//Route::get('/voluntaryregister','VoluntarySavingController@index');
//Route::get('/investmentregister','InvestmentSavingController@index');

//Route::get('/timelimitedregister','TimeLimitedSavingController@index');

//Route::get('/childrenregister','ChildrenSavingController@index');
//Route::post('/childrenregister1','ChildrenSavingController@store');

//Route::get('/freeinterestregister','FreeInterestSavingController@index');
Route::get('/submemberdisplay','SubmembersController@index');
Route::get('/submemberregister','SubmembersController@register');
Route::post('/submemberregister1','SubmembersController@store');
Route::get('/submemberedit/{id}','SubmembersController@edit');
Route::post('/submemberupdate/{id}','SubmembersController@update');
Route::post('/submemberdelete/{id}','SubmembersController@destroy');
Route::get('/submembersearch','SubmembersController@search');

Route::get('/paymentdisplay','PaymentController@index');
Route::get('/paymentregister','PaymentController@register');
Route::post('/paymentregister1','PaymentController@store');
Route::get('paymentedit/{id}','PaymentController@edit');
Route::post('/paymentupdate/{id}','PaymentController@update');
Route::post('/paymentdelete/{id}','PaymentController@destroy');
Route::get('/sampleindex','PaymentController@getdata')->name('sample.index');
Route::get('paymentsearch','PaymentController@search');


Route::get('/abeldisplay','AbelController@index');
Route::get('/abelregister','AbelController@register');
Route::post('/abelregister1','AbelController@store');
Route::get('abeledit/{id}','AbelController@edit');
Route::post('/abelupdate/{id}','AbelController@update');
Route::post('/abeldelete/{id}','AbelController@destroy');
Route::get('abelsearch','AbelController@search');

Route::get('/comissiondisplay','ComissionController@index');
Route::get('/comissionregister','ComissionController@register');
Route::post('/comissionregister1','ComissionController@store');
Route::get('comissionedit/{id}','ComissionController@edit');
Route::post('/comissionupdate/{id}','ComissionController@update');
Route::post('/comissiondelete/{id}','ComissionController@destroy');
Route::get('comissionsearch','ComissionController@search');

Route::get('/teacoffeedisplay','TeaCoffeeController@index');
Route::get('/teacoffeeregister','TeaCoffeeController@register');
Route::post('/teacoffeeregister1','TeaCoffeeController@store');
Route::get('teacoffeeedit/{id}','TeaCoffeeController@edit');
Route::post('/teacoffeeupdate/{id}','TeaCoffeeController@update');
Route::post('/teacoffeedelete/{id}','TeaCoffeeController@destroy');
Route::get('teacoffeesearch','TeaCoffeeController@search');

Route::get('/waterdisplay','WaterController@index');
Route::get('/waterregister','WaterController@register');
Route::post('/waterregister1','WaterController@store');
Route::get('wateredit/{id}','WaterController@edit');
Route::post('/waterupdate/{id}','WaterController@update');
Route::post('/waterdelete/{id}','WaterController@destroy');
Route::get('/full_text_search/action','WaterController@action')->name('full-text-search.action');
Route::get('watersearch','WaterController@search');

Route::get('/additionalexpensedisplay','AdditionalExpensesController@index');
Route::get('/additionalexpenseregister','AdditionalExpensesController@register');
Route::post('/additionalexpenseregister1','AdditionalExpensesController@store');
Route::get('additionalexpenseedit/{id}','AdditionalExpensesController@edit');
Route::post('/additionalexpenseupdate/{id}','AdditionalExpensesController@update');
Route::post('/additionalexpensedelete/{id}','AdditionalExpensesController@destroy');
Route::get('additionalexpensesearch','AdditionalExpensesController@search');

Route::get('/monthlyreport','MonthlyReportController@index');
Route::get('/sixmonthreport','SixMonthReportController@index');
Route::get('/yearlyreport','YearlyReportController@index');
Route::get('/monthlyexpensereport','MonthlyReportController@expenses');
Route::get('/sixmonthexpensereport','SixMonthReportController@expenses');
Route::get('/yearlyexpensereport','YearlyReportController@expenses');
Route::get('/daylyreport','DaylyController@index');
Route::get('/daylyexpensereport','DaylyController@expenses');
Route::get('/weeklyreport','WeeklyController@index');
Route::get('/weeklyexpensereport','WeeklyController@expenses');

Route::get('/personalreport','PersonalReportController@index');
Route::get('/personalreport1','PersonalReportController@register');

Route::get('/returnnormaldisplay','ReturnNormalController@index');
Route::get('/returnnormalregister','ReturnNormalController@register');
Route::post('/returnnormalregister1','ReturnNormalController@store');
Route::get('returnnormaledit/{id}','ReturnNormalController@edit');
Route::post('/returnnormalupdate/{id}','ReturnNormalController@update');
Route::post('/returnnormaldelete/{id}','ReturnNormalController@destroy');
Route::get('/returnnormalsearch','ReturnNormalController@search');

Route::get('/registeruser','RegisterController@register');
//Route::get('/','MainController@index');
Route::post('/registeruser','RegisterController@store');
Route::get('/logout','SessionController@destroy');
Route::get('/dynamic_pdf','TeaCoffeeController@indexx');
Route::get('/pdff','TeaCoffeeController@pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import_excel','ImportExcelController@index');
Route::post('/import_excel/import','ImportExcelController@import');

Route::get('dynamic_pdf/pdf','SubmembersController@pdf');
Route::get('importExportView', 'MyController@importExportView');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');

Route::get('generate-pdf','PDFController@generatePDF');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'ProductController@htmltopdfview'));
Route::get('/customers/pdf','ShareController@export_pdf');


Route::resource('sample', 'SampleController');

Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');