<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsTemplateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mengembalikan collection kosong agar hanya header yang dibuat
        return collect([]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Tentukan header kolom sesuai template Excel Anda
        return [
            'Nama Produk',
            'Nama Penjual',
            'Harga',
            'Kategori (Sayuran, Buah-buahan, Kerajinan Tangan, Makanan Olahan, Minuman, Jasa)',
            'Deskripsi',
            'Tags',
            'Link Shopee',
            'WhatsApp',
        ];
    }
}