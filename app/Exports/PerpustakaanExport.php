<?php

namespace App\Exports;

use App\Models\perpustakaan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PerpustakaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perpustakaan::orderBy('created_at', 'DESC')->get();
    }
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Judul Buku',
            'Jenis Buku',
            'Lama Peminjaman',
            'created_at',
            'updated_at',
        ];
    }
    /**
     * @param mixed $perpustakaan
     * @return array
     */
    public function map($perpustakaan): array
    {
        static $no = 1;
        return [
            $no++,
            $perpustakaan->nama,
            $perpustakaan->type,
            $perpustakaan->lama,
            Carbon::parse($perpustakaan->created_at)->locale('id')->isoformat('dddd, D MMMM Y'),
            Carbon::parse($perpustakaan->updated_at)->locale('id')->isoformat('dddd, D MMMM Y'),
        ];
    }
}
