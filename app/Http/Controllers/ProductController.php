<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product as Product;
use PDF;
class ProductController extends Controller
{
    public function htmltopdfview(Request $request)
    {
        $products = Products::all();
        view()->share('products',$products);
        if($request->has('download')){
            $pdf = PDF::loadView('htmltopdfview');
            return $pdf->download('htmltopdfview');
        }
        return view('htmltopdfview');
    }
}
