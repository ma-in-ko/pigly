<?php

namespace Database\Seeders;

use App\Models\WeightTarget;
use Illuminate\Database\Seeder;

class WeightTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeightTarget::create([
            'user_id' => 1,
            'target_weight' => 60.0,
        ]);
    }
}
