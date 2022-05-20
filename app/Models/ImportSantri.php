<?php

namespace App\Models;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ImportSantri implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Santri([
            'id' => $row[0],
            'name' => $row[1],
            'password' => Hash::make($row[2]),
            'role' => 'Santri',
            'status' => 'Aktif',
        ]);
    }
}
