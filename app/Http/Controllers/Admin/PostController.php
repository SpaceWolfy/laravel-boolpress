<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $categoriesAll = Category::all();
        $tags = Tag::all();

        return view("admin.posts.create", compact('categoriesAll', 'tags'));
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
            'postTitle' => 'required|min:5|max:50',
            'postText' => 'required|min:10|max:400',
            'postImage' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ]);

        /*  dd($validated); */

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
        $newPost->user_id = Auth::user()->id;
        $newPost->save($validated);

        //aggiungo le relazion icon i tag ricevuti
        /* va messo dopo il save altrimenti il post-id non viene trovato in quanto viene assegnato durante il save*/
        if (key_exists('tags', $validated)) {
            $newPost->tags()->attach($validated['tags']);
        }

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

        $categoriesAll = Category::all();
        $tags = Tag::all();

        return view("admin.posts.edit", compact('newPost', 'categoriesAll', 'tags'));
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
            'postTitle' => 'required|min:5|max:50',
            'postText' => 'required|min:10|max:400',
            'postImage' => 'nullable',
            'category_id' => 'nullable',
            'tags' => 'nullable|exists:tags,id'
        ]);

        /* dd($validated); */

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

        /* Aggiornamento informazioni tabella post_tag */
        //Per il post corrente, dalla tabella ponte, vado a rimuovere tutte le relazioni esistenti con i tag
        /* $newPost->tags()->detach(); */

        //aggiungo le relazion icon i tag ricevuti
        /* $newPost->tags()->attach($validated['tags']); */

        /* Confronta i dati presenti su db e in caso fa detach(solo degli elementi precedenti) e attach(solo dei nuovi elementi) 
        - I tag presenti in entrambi i francenti non verranno toccati*/

        if (key_exists('tags', $validated)) {
            $newPost->tags()->sync($validated['tags']);
        } else {
            $newPost->tags()->detach();
        }

        return redirect()->route("admin.posts.show", $newPost->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
