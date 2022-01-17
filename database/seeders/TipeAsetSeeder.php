<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeAsetModel;

class TipeAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeAsetModel::create([
            'nama_tipe_asset' => 'Komputer',
        ]);
    }
}
