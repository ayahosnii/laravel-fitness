<?php
namespace Database\Seeders;

use App\Models\AddFood;
use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')->delete();

        AddFood::create([
            'id' => 1,
            'Food_Name'=>'Banana',
            'serving_size'=>100,
            'servings_per_container'=>1,
            'calories'=>88,
            'total_fat'=>0.3,
            'total_carbs'=>23,
            'protein'=>1.1,
            'add_food'=>0,
            'user_id '=>1,
        ]);

        AddFood::create([
            'id' => 2,
            'Food_Name'=>'rice',
            'serving_size'=>100,
            'servings_per_container'=>1,
            'calories'=>130,
            'total_fat'=>0.3,
            'total_carbs'=>28,
            'protein'=>2.7,
            'add_food'=>0,
            'user_id '=>1,
        ]);

        AddFood::create([
            'id' => 3,
            'Food_Name'=>'Yogurt',
            'serving_size'=>100,
            'servings_per_container'=>1,
            'calories'=>58,
            'total_fat'=>0.4,
            'total_carbs'=>3.6,
            'protein'=>10,
            'add_food'=>0,
            'user_id '=>1,
        ]);

    }
}
