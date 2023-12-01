<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class UsersImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    /**
     * @param \Illuminate\Support\Collection $collections
     * @return void
     */
    public function collection(Collection $collections)
    {
        foreach ($collections as $row) {
            if (isset($row['nisn']) && isset($row['nama']) && isset($row['jk'])) {
                User::create([
                    'nisn'     => $row['nisn'],
                    'name'     => $row['nama'],
                    'gender'   => $row['jk'],
                    'password' => Hash::make($row['nisn'])
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
