<?php

namespace App\Exports;

use App\Models\Role;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('users.id', 'users.name', 'users.email', 'users.phone', 'roles.name as role_name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'role_name',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styles = [
            1 => ['font' => ['bold' => true]],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        return $styles;
    }

}
