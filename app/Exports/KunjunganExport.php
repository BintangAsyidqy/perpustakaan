<?php

namespace App\Exports;

use App\Models\Kunjungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KunjunganExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kunjungan::orderBy('created_at', 'DESC')->get();
    }
    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'nama_pengunjung',
            'tanggal_kunjungan',
            'keperluan',
        ];
    }
    /**
     * @param mixed $kunjungan
     * @return array
     */
    public function map($kunjungan): array
    {
        return [
            $kunjungan->nama_pengunjung,
            $kunjungan->tanggal_kunjungan,
            $kunjungan->keperluan,
        ];
    }
}
