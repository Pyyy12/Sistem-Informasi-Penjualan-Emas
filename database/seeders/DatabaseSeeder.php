<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@aureliagold.test'], [
            'name' => 'Admin Aurelia', 'password' => Hash::make('password'), 'is_admin' => true,
        ]);

        $products = [
            ['Emas Batangan 1 Gram', 'batangan', 1, '999.9', 1450000, 25, 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=900'],
            ['Emas Batangan 5 Gram', 'batangan', 5, '999.9', 7100000, 12, 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=900'],
            ['Emas Batangan 10 Gram', 'batangan', 10, '999.9', 14000000, 8, 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=900'],
            ['Cincin Emas Klasik', 'perhiasan', 2.5, '750', 2850000, 10, 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=900'],
            ['Kalung Emas Elegan', 'perhiasan', 4, '750', 4750000, 6, 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=900'],
            ['Koin Emas Koleksi', 'koin', 1, '999.9', 1500000, 15, 'https://images.unsplash.com/photo-1624365169364-0640dd10e4f2?w=900'],
        ];
        foreach ($products as [$name, $category, $weight, $purity, $price, $stock, $image]) {
            Product::updateOrCreate(['name' => $name], [
                'slug' => Str::slug($name), 'category' => $category,
                'description' => 'Produk emas pilihan Aurelia Gold. Pastikan memeriksa detail berat, kadar, harga, dan sertifikat sebelum pembelian.',
                'weight_gram' => $weight, 'purity' => $purity, 'price' => $price,
                'stock' => $stock, 'image_url' => $image, 'is_active' => true,
            ]);
        }
    }
}
