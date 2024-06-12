<?php

namespace App\Imports;

use App\Models\Mutation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MutationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        \Log::info('Importing row:', $row);
        return new Mutation([
            'employee_id'   => $row['employee_id'],
            'mutation_ke'   => $row['mutation_ke'],
            'companies_id'  => $row['companies_id'],
            'departement_id'=> $row['departement_id'],
            'branch_id'     => $row['branch_id'],
            'position_id'   => $row['position_id'],
            'tglawal'       => $row['tglawal'],
            'tglakhir'      => $row['tglakhir'],
        ]);
    }
}
