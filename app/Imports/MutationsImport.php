<?php

namespace App\Imports;

use App\Models\Mutation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MutationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Mutation([
            'employee_id'    => $row['employee_id'],
            'companies_id'   => $row['companies_id'],
            'department_id'  => $row['department_id'],
            'branch_id'      => $row['branch_id'],
            'position_id'    => $row['position_id'],
            'tglawal'        => Date::excelToDateTimeObject($row['tglawal']),
            'tglakhir'       => $row['tglakhir'] ? Date::excelToDateTimeObject($row['tglakhir']) : null
        ]);
    }
}
