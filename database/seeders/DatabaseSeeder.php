<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $barangs = [
            [
                'nama_barang' => 'Laptop Asus ROG Strix G15',
                'stok' => 12,
                'harga' => 18500000,
            ],
            [
                'nama_barang' => 'Mouse Wireless Logitech MX Master 3S',
                'stok' => 25,
                'harga' => 1450000,
            ],
            [
                'nama_barang' => 'Keyboard Mekanikal Keychron K2 V2',
                'stok' => 18,
                'harga' => 1250000,
            ],
            [
                'nama_barang' => 'Monitor Gaming LG UltraGear 27 Inch',
                'stok' => 8,
                'harga' => 3800000,
            ],
            [
                'nama_barang' => 'Headset Gaming SteelSeries Arctis 7',
                'stok' => 15,
                'harga' => 2100000,
            ],
            [
                'nama_barang' => 'Printer Epson L3210 All-in-One',
                'stok' => 5,
                'harga' => 2400000,
            ],
            [
                'nama_barang' => 'External SSD Samsung T7 1TB',
                'stok' => 20,
                'harga' => 1650000,
            ],
            [
                'nama_barang' => 'Webcam Logitech C920 HD Pro',
                'stok' => 10,
                'harga' => 980000,
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}