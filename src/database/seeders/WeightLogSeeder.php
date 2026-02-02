<?php

namespace Database\Seeders;

use App\Models\WeightLog;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WeightLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now()->subDays(34);

        for ($i = 0; $i < 35; $i++)
            {
                WeightLog::create([
                    'user_id' => 1,
                    'date' => $startDate->copy()->addDays($i),
                    'weight' => 65 - ($i * 10),
                    'calories' => 1800 + ($i *10),
                    'exercise_time' => sprintf('00:%02d:00', 20 + ($i % 4) * 10),
                    'exercise_content' => ['ウォーキング', 'ランニング', 'ヨガ', '筋トレ'][$i % 4],
                ]);
            }
    }
}
