<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $posts->load("tags", "user", "category");

        /* return response()->json([
            "isWorking" => 'yes',
            'dataInvioRichiesta' => now()->format('d-m-Y, H:i'),
            'postsData' => $posts
        ]); */

        //per visualizzare le immagini inviate dal backend
        $posts->each(function ($post) {
            //formo l'url completo per l'immagine del post
            if ($post->postImage) {
                $post->postImage = asset('storage/' . $post->postImage);
            }
        });

        return response()->json($posts);
    }

    public function show($slug)
    {
        $postDetails = Post::where("slug", $slug)
            ->with(["tags", "user", "category"])
            ->first();

        if (!$postDetails) {
            abort(404);
        }

        return response()->json($postDetails);
    }
}
