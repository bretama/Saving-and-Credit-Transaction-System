<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Excel;
use Illuminate\Support\Facades\File; 
class ImportExcelController extends Controller
{
    function index()
    {
    	$data = DB::table('submembers')->orderBy('id','DESC')->get();
    	return view('register.import_excel',compact('data'));
    }
    function import(Request $request)
    {
    	$this->validate($request, [
           'select_file' =>'required|mimes:xls,xlsx'
    	]);
    	$path = $request->file('select_file')->getRealPath();
    	$data = Excel::load($path)->get();
    	if ($data->count() > 0) {
    		foreach ($data->toArray() as $key => $value) {
    			foreach ($value as $row) {
    				# code...
    				$insert_data[] = array(
                     'code'  => $row['code'],
                     'name' => $row['name'],
                     'fname' => $row['fname'],
                     'number' => $row['number']
    				);
    			}
    		}
    		if (!empty($insert_data)) {
    			DB::table('submembers')->insert($insert_data);
    			# code...
    		}
    	}
    	return back()->with('success','excel data imported successfully!');
    }
}
