<?php

namespace App\Exports;

use App\Models\Role;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserExport implements WithHeadings, WithStyles, WithMapping, FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::with('role')->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone',
            'Role_Name',
            'Created_At',
        ];
    }
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone,
            $user->role->name,
            $user->created_at->format('m/d/y'),
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
