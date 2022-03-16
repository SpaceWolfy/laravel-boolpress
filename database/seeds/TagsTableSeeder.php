<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Errore Grave', 'Errore Semplice', 'Bug Grave', 'Bug Semplice', 'Cambio di Stile', 'Nuova Feature'];

        //cancella tutte le righe della tabella, resettando l'id autoincrementale.
        /*  Tag::truncate(); */

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->type = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();
        }
    }
}
