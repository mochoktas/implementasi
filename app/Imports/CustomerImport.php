<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class CustomerImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'id_customer' => $row['id_customer'],
            'nama' => $row['nama'] ?? $row['jeneng'] ?? $row['nama_lengkap'],
            'alamat' => $row['alamat'],
            'subdis_id' => $row['kodepos'],


        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
