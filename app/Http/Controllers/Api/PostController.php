<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
class PostController extends Controller
{
    //GET BLOG POSTS (ARCHIVIO)
    public function index() {
        // fare ciò che ti serve da ritornare
        //$posts = Post::all();

        $posts = Post::paginate(2);
         //restitutisce il date
        return response()->json($posts);
    }
}
