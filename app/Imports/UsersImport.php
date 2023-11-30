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
     * @param \Illuminate\Support\Collection $collections
     * @return void
     */
    public function collection(Collection $collections)
    {
        foreach ($collections as $row) {
            $this->processDataRow($row);
        }
    }

    /**
     * Process a single row of data.
     *
     * @param array $row
     * @return void
     */
    private function processDataRow(array $row)
    {
        if (isset($row['nisn']) && isset($row['nama']) && isset($row['jk'])) {
            User::create([
                'nisn'     => $row['nisn'],
                'name'     => $row['nama'],
                'gender'   => $row['jk'],
                'password' => Hash::make($row['nisn'])
            ]);
        } else {
            // Handle if there is data that doesn't meet the criteria
        }
    }
}
