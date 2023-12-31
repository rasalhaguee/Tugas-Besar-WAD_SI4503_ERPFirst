<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Costumer::factory(5)->create();

        \App\Models\Category::factory()->create([
            'name' => 'Kain',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Baju',
        ]);


        \App\Models\Category::factory(2)->create();

        \App\Models\Gudang::factory()->create([
            'name' => 'Gudang Bahan Baku',
            'location' => 'Jl. Raya Bogor KM 30',
            'description' => 'Gudang Bahan Baku',
            'type' => 'material',
        ]);

        \App\Models\Gudang::factory()->create([
            'name' => 'Gudang Produk',
            'location' => 'Jl. Raya Bogor KM 30',
            'description' => 'Gudang Produk',
            'type' => 'product',
        ]);

        \App\Models\Gudang::factory(3)->create();

        \App\Models\Item::factory()->create([
        // nama, deskripsi, harga, stok, gudang_id
            'name' => 'Kain Katun',
            'description' => 'Kain Katun',
            'category_id' => 1,
            'gudang_id' => 1,
            'stock' => 100,
            'price' => 10000,
            'image' => '/assets/images/item/kain.jpg',
        ]);

        \App\Models\Item::factory()->create([
        // nama, deskripsi, harga, stok, gudang_id
            'name' => 'Baju wanita',
            'description' => 'Ini adalah baju wanita',
            'category_id' => 2,
            'gudang_id' => 2,
            'stock' => 50,
            'price' => 10000,
            'image' => '/assets/images/item/baju.jpg',
        ]);

        \App\Models\Transaction::factory()->create([
            'costumer_id' => 1,
            'transaksi_id' => "ERP-JQL-123-FIRST",
            'status' => 'unpurchased',
        ]);

        \App\Models\Transaction::factory()->create([
            'costumer_id' => 2,
            'transaksi_id' => "ERP-GTC-456-FIRST",
            'status' => 'purchased',
        ]);

        \App\Models\TransactionItems::factory()->create([
            'transaction_id' => 1,
            'item_id' => 1,
            'qty' => 2,
        ]);

        \App\Models\TransactionItems::factory()->create([
            'transaction_id' => 1,
            'item_id' => 2,
            'qty' => 1,
        ]);

        \App\Models\TransactionItems::factory()->create([
            'transaction_id' => 2,
            'item_id' => 2,
            'qty' => 4,
        ]);

        \App\Models\TransactionItems::factory()->create([
            'transaction_id' => 2,
            'item_id' => 2,
            'qty' => 3,
        ]);
    }
}
