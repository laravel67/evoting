<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $collections)
    {
        foreach ($collections as $colect) {
            if (isset($colect["nisn"]) && isset($colect["nama"]) && isset($colect['jk'])) {
                User::create([
                    'nisn' => $colect["nisn"],
                    'name' => $colect["nama"],
                    'gender' => $colect['jk'],
                    'password' => Hash::make($colect["nisn"])
                ]);
            } else {
                // Log or handle the missing keys appropriately
            }
        }
    }
}
