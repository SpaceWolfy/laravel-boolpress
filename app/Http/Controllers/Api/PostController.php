<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\Traits\SlugGenerator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts->load("tags", "user", "category");

        /* return response()->json([
            "isWorking" => 'yes',
            'dataInvioRichiesta' => now()->format('d-m-Y, H:i'),
            'postsData' => $posts
        ]); */

        return response()->json($posts);
    }

    /* public function store(Request $request)
    {
        $postData = $request->validate([
            "postTitle" => "required|min:5",
            "postText" => "required|min:20",
            "category_id" => "nullable",
            "tags" => "nullable"
        ]);

        $newPost = new Post();
        $newPost->fill($postData);
        $newPost->user_id = 1;
        $newPost->slug = $this->generateUniqueSlug($postData["title"]);
        $newPost->save();

        if (key_exists("tags", $postData)) {
            $newPost->tags()->attach($postData["tags"]);
        }

        return response()->json($newPost);
    } */

    /*  public function show(Post $getPost)
    { */
    /* $getPost = Post::where("id", $id)->with(["tags", "user", "category"])->first(); */
    /* join su altre tabelle collegate alla tabella che stiamo usando, (post in questo caso) */
    /*      $getPost->load("tags", "user", "category");
        return response()->json($getPost);
    } */
}
