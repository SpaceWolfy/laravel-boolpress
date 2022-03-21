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
