<?php

namespace Database\Seeders;

use App\Models\{User, Barang, Harga};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $barang = [
            [
                'name' => 'Beras',
                'unit' => 'Liter',
                'price' => 14375,
            ],
            [
                'name' => 'DAGING AYAM RAS',
                'unit' => 'Kg',
                'price' => 32000,
            ],
            [
                'name' => 'TELUR AYAM RAS',
                'unit' => 'Kg',
                'price' => 32000,
            ],
            [
                'name' => 'BAWANG MERAH',
                'unit' => 'Kg',
                'price' => 28000,
            ],
            [
                'name' => 'CABE MERAH',
                'unit' => 'Kg',
                'price' => 45000,
            ],
            [
                'name' => 'CABE RAWIT',
                'unit' => 'Kg',
                'price' => 65000,
            ],
            [
                'name' => 'MINYAK GORENG',
                'unit' => 'Kg',
                'price' => 16200,
            ],
            [
                'name' => 'GULA PASIR',
                'unit' => 'Kg',
                'price' => 18000,
            ],
            [
                'name' => 'BAWANG PUTIH',
                'unit' => 'Kg',
                'price' => 45000,
            ],
            [
                'name' => 'DAGING SAPI',
                'unit' => 'Kg',
                'price' => 130000,
            ],
            [
                'name' => 'TEPUNG TERIGU',
                'unit' => 'Kg',
                'price' => 10000,
            ],
            [
                'name' => 'UDANG',
                'unit' => 'Kg',
                'price' => 60000,
            ],
            [
                'name' => 'IKAN KEMBUNG',
                'unit' => 'Kg',
                'price' => 25000,
            ],
            [
                'name' => 'MIE INSTANT',
                'unit' => 'Bungkus',
                'price' => 3500,
            ],
            [
                'name' => 'TEMPE',
                'unit' => 'Kg',
                'price' => 20000,
            ],
            [
                'name' => 'TAHU MENTAH',
                'unit' => 'Kg',
                'price' => 10000,
            ],
            [
                'name' => 'PISANG GAPI',
                'unit' => 'Sisir',
                'price' => 15000,
            ],
            [
                'name' => 'SUSU BUBUK',
                'unit' => '400 gr',
                'price' => 51800,
            ],
            [
                'name' => 'SUSU KEMASAN',
                'unit' => '401 gr',
                'price' => 42800,
            ],
            [
                'name' => 'JERUK',
                'unit' => 'Kg',
                'price' => 15000,
            ],
        ];

        foreach ($barang as $item) {
            // dump($item['name']);
            $barang = Barang::create([
                'name' => $item['name'],
                'unit' => $item['unit'],
            ]);

            Harga::create([
                'date' => '2024-11-01',
                'barang_id' => $barang->id,
                'price' => $item['price']
            ]);
        }
    }
}
