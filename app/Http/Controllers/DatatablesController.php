<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Category;

class DatatablesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categoryData()
    {
        return Datatables::of(Category::query())->make(true);
    }
    
}