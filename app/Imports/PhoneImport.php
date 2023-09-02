<?php

namespace App\Imports;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class PhoneImport implements ToModel
{
    private int $batch;
    public function __construct(private string $adminId)
    {
        $batch = Phone::query()->max('batch');
        $this->batch = $batch + 1;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row): Model
    {
        return new Phone([
            //
            'phone' => strval($row[0]),
            'admin' => $this->adminId,
            'status' => 1,
            'batch' => $this->batch,
        ]);
    }
}
