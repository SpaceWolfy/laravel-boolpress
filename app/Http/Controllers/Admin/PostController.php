<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPosts = Post::all();

        return view("admin.posts.index", compact("dataPosts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'postTitle' => 'required|min:6|max:15',
            'postText' => 'required|min:10|max:200'
        ]);

        $newPost = new Post();
        $newPost->fill($validated);

        /* GESTIONE SLUG */

        /* Lo slug viene generato a partire dal titolo */
        $slug = Str::slug($newPost->postTitle);

        /* Controllo eseguito sul database - verifica dell'esistenza o meno di un elemento con il medesimo slug */
        $exists = Post::where("slug", $slug)->first();
        $counter = 1;

        /* Finché il valore di exists è diverso da false o null viene eseguito il while */
        while ($exists) {
            // Viene generato un nuovo slug, prendendo quello precedente e concatenando ad esso un numero incrementale
            $newSlug = $slug . "-" . $counter;
            $counter++;

            // Si esegue un controllo sul database,verificando se esista o meno un elemento con il nuovo slug generato
            $exists = Post::where("slug", $newSlug)->first();

            /*  Se non esiste, il nuovo slug viene salvato nella variabile $slug che verrà 
           successivamente usata per assegnare il valore all'interno del nuovo post. */

            if (!$exists) {
                $slug = $newSlug;
            }
        }
        /* ------------------------------- */

        /* Assegno il valore slug al post */
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route("admin.posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugId)
    {
        $newPost = Post::where("slug", $slugId)->first();

        return view("admin.posts.show", compact('newPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slugId)
    {
        $newPost = Post::where("slug", $slugId)->first();

        return view("admin.posts.edit", compact('newPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'postTitle' => 'required|min:6|max:15',
            'postText' => 'required|min:10|max:200'
        ]);

        $newPost = Post::findOrFail($id);

        if ($validated['postTitle'] !== $newPost->postTitle) {

            /* GESTIONE SLUG */

            /* Lo slug viene generato a partire dal titolo */
            $slug = Str::slug($validated['postTitle']);

            /* Controllo eseguito sul database - verifica dell'esistenza o meno di un elemento con il medesimo slug */
            $exists = Post::where("slug", $slug)->first();
            $counter = 1;

            /* Finché il valore di exists è diverso da false o null viene eseguito il while */
            while ($exists) {
                // Viene generato un nuovo slug, prendendo quello precedente e concatenando ad esso un numero incrementale
                $newSlug = $slug . "-" . $counter;
                $counter++;

                // Si esegue un controllo sul database,verificando se esista o meno un elemento con il nuovo slug generato
                $exists = Post::where("slug", $newSlug)->first();

                /*  Se non esiste, il nuovo slug viene salvato nella variabile $slug che verrà 
           successivamente usata per assegnare il valore all'interno del nuovo post. */

                if (!$exists) {
                    $slug = $newSlug;
                }
            }
            /* ------------------------------- */

            /* Assegno il valore slug al post */
            $newPost->slug = $slug;
            $validated['slug'] = $slug;
        }

        $newPost->update($validated);

        return redirect()->route("admin.posts.show", $newPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
