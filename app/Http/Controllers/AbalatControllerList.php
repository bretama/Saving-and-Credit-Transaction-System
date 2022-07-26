<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbalatControllerList extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $abalats = Abalat::all();
        return view('members.abalatdisplay')->withabalats($abalats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('members.abalatregister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'code'=>'required',
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'mname' =>'required',
            'gender'=>'required',
            'rbirr' =>'required',
            'receipt'=>'required',
            'bank' =>'required',
            'werasi' =>'required',
            'idnum' =>'required',
            'idgiven'=>'required',
            'dob' => 'required',
            'type' => 'required',
            'wereda' => 'required',            
            'town' => 'required',
            'qebelie' => 'required',
            'phone' => 'required', 
            'occupation' => 'required',                         
            // 'tell' => 'digits:10',
            'edulevel' =>'required|in:1,2,3,4,5,6,7,8,9,10,11,12,ሰርቲፊኬት,ዲፕሎማ,ዲግሪ,ማስተርስ,ፒ.ኤች.ዲ, ዘይተምሃረ',
            'account' =>'required',
            'numfe' =>'required',
            'nummale' =>'required',
            //'total' =>'required',
            'entrydate' =>'required',

            'leavedate' => 'required',
            'idea' => 'required'

            // 'name' => 'required',
            
        ]);
        
        $abalat = new Abalat;
        $abalat->code=$request->code;
        $abalat->name = $request->name;
        $abalat->fname=$request->fname;
        $abalat->gfname=$request->gfname;
        $abalat->mname=$request->mname;
        $abalat->gender=$request->gender;
        $abalat->rbirr = $request->rbirr;
        $abalat->receipt = $request->receipt;
        $abalat->bank = $request->bank;
        $abalat->werasi = $request->werasi;

        $abalat->idnum = $request->idnum;
        $abalat->idgiven = $request->idgiven;
        $abalat->dob = $request->dob;
        $abalat->type = $request->type;
        $abalat->wereda = $request->wereda;
        $abalat->town = $request->town;

        $abalat->qebelie = $request->qebelie;
        $abalat->phone = $request->phone;
        $abalat->occupation = $request->occupation;
        $abalat->edulevel = $request->edulevel;
        $abalat->account = $request->account;

        $abalat->numfe = $request->numfe;
        $abalat->nummale = $request->nummale;

         $x=$abalat->numfe;
        $y=$abalat->nummale;
        $abalat->total = $x+$y;


        $abalat->entrydate = $request->entrydate;
        $abalat->leavedate = $request->leavedate;

        $abalat->idea = $request->idea;

     //    $entry = $request->entrydate;
     //    $entrydate = explode("-", $entry);
     //    $year = $entrydate[0];
     //    $month = $entrydate[1];
     //    $date = $entrydate[2];
     //    $intmonth = (int)$month;
     //    $intyear = (int)$month;
     //    //$date = (int)$date;
     //    //$date = 0;
     // // $d = strftime("%F", strtotime($year."-".$month."-".$day));
     //   $months = $intmonth+1;
     //   if ($months==13) {
     //    $months=01;
     //    $year = $intyear+1;
     //    $year = strval($year);
     //       # code...
     //   }
     //   $strmonth = strval($months);
     //   //$d =date("d-m-Y",mktime(0, 0, 0, $day, $month, $year));
     //    $d=$year."-".$strmonth."-".$date;
     //   // $d = strtotime($year."-".$strmonth."-".$date);
        
     //   // $a = date('y-m-d',$d);
      
     //    $timestamp = strtotime($d);
     //    $new_date_format = strtotime(date('Y-m-d', $timestamp));
     //    $today = strtotime(date('Y-m-d'));
     //    $ndays = ($today-$new_date_format)/86400;



       // $new_date_format = strtotime($new_date_format);


        // $startTime = new DateTime(date('Y-m-d'));
        // $endTime = new DateTime($new_date_format);
        // $duration = $startTime->diff($endTime);

       

        $abalat->save();
        
        // auth()->login($abalat);
        
        return redirect()->to('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
