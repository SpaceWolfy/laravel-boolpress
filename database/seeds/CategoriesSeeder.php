<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["catName" => "Error Correction", "catDesc" => "Correzione di errori"],
            ["catName" => "Bug Correction", "catDesc" => "Correzione di Bug"],
            ["catName" => "Change of Style", "catDesc" => "Cambio di stile"],
            ["catName" => "New Feature", "catDesc" => "Aggiunta di nuove funzionalità"],
        ];

        foreach ($categories as $category) {
            $newCat = new Category();

            $newCat->fill($category);
            $newCat->save();
        }
    }
}
