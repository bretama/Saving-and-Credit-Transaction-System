<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Excel;
use PDF;

class AutocompleteController extends Controller
{
	function index()
	{
		return view('autocomplete');
	}
	function action(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

		]);
		if($validation->passes())
		{
           $image = $request->file('select_file');
           $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'),$new_name);
           return response()->json([
              'message'       =>  'image Upload Successfully',
              'uploaded_image' =>  '<img src="/images/'.$new_name.'" class = "img-thumbnail" width="300" />',
              'class_name'     =>  'alert-success'
           ]);
		}
		else
		{
			return response()->json([
               'message'        => $validation->errors()->all(),
               'uploaded_image' => '',
               'class_name'     => 'alert-danger'

			]);
		}
   }
   function import_excel1()
   {
   
   	return view('test.excel');
   }
   function import_excel2(Request $request)
   {
   	$validator = Validator::make($request->all(), [
   		'select_file' => 'required|mimes:xls,xlsx,csv'

   	]);
    if ($validator->passes()) {
      return redirect()->back()->with(['success'=>'File uploaded Successfully']);
      # code...
    }
    else{
      return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
    }
   	// $path = $request->file('select_file')->getRealPath();

   	// $data = Excel::load($path)->get();
   	// if ($data->count() > 0) {
   	// 	foreach ($data->toArray() as $key => $value) {
   	// 		foreach ($value as $row) {
   	// 			$insert_data[] = array(
   	// 				'first_sname' =>  $row['first_name'],
   	// 				'middle_name'=>  $row['middle_name'],
   	// 				'last_name'  =>  $row['last_name'],
   	// 				'email'		=>   $row['email']	

   	// 				 );
   	// 		}
   	// 		# code...
   	// 	}
   	// 	if (!empty($insert_data)) {
   	// 		DB::table('students')->insert($insert_data);
   	// 		# code...
   	// 	}
   	// }
    // return back()->with('success','action performed Successfully');
   }
   function indexx()
   {
   	$customer_data = $this->get_customer_data();
   	return view('pdf')->with('customer_data',$customer_data);
   }
   function get_customer_data(){
   	$customer_data =DB::table('students')->limit(10)->get();
   	return $customer_data;
   }
  function pdf(){
  	$pdf = \App::make('dompdf.wrapper');
  	$pdf->loadHTML($this->convert_customer_data_to_html());
  	$pdf->stream();
  }
  function convert_customer_data_to_html(){
  	$customer_data = $this->get_customer_data();
  	$output = '
     <h3 align = "center">Customer Data</h3>
     <table width = "100%" style="border-collapse:collapse; border:0px;">
     <tr>
        <th style="border:1px solid; padding:12px;" width="20%">first_name</th>
        <th style="border: 1px solid; padding:12px;" width="30%">middle_name</th>
        <th style="border:1px solid; padding:12px;" width="15%">last_name</th>
        <th style="border:1px solid; padding:12px;" width="15%">email</th>
        </tr>
  	';
  	foreach ($customer_data as $customer) {
  		$output .= '
         <tr>
            <td style = "border:1px solid; padding:12px;">' .$customer->first_name.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->middle_name.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->last_name.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->email.'</td>
  		';
  	}
  	$output .= '</table>';
  	return $output;
  }
}
