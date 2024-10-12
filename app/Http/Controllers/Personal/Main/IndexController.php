<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts;
        $postsCount = $posts->count();

        $comments = auth()->user()->comments;
        $commentsCount = $comments->count();

        return view('personal.main.index', compact('postsCount', 'commentsCount'));
    }
}
