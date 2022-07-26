<?php

namespace App\Imports;
   
use App\Abalat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
    
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Abalat([
             
        
            'id' =>  $row['id'],
            'code'    => $row['code'],
            'name'     => $row['name'],
            'fname'    => $row['fname'], 
            'gfname'   => $row['gfname'],
            'mname'    => $row['mname'],
            // 'image'    => $row['image'],
            'gender'   => $row['gender'],
            'rbirr'    => $row['rbirr'],
            'receipt' => $row['receipt'],
            'bank'  => $row['bank'],
            'werasi' => $row['werasi'],
            'idnum' => $row['idnum'],
            'idgiven' => $row['idgiven'],
            'dob' => $row['dob'],
            'type' => $row['type'],
            'wereda' => $row['wereda'],
            'town' => $row['town'],
            'qebelie' => $row['qebelie'],
            'phone' => $row['phone'],
            'occupation' => $row['occupation'],
            'child' => $row['child'],
            'edulevel' => $row['edulevel'],
            'numfe' => $row['numfe'],
            'nummale' => $row['nummale'],
            'total' => $row['total'],
            'entrydates' => $row['entrydate'],
           // 'leavedate' => $row['leavedate'],
            'idea' => $row['idea'],
            
        ]);
        
    }
}