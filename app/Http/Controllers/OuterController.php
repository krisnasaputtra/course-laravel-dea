<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $posts = Posts::search($request->search)->paginate(4);
        } else if ($request->query()) {
            $posts = Posts::search($request->query('query'))->paginate(4);
        } else {
            $posts = Posts::paginate(4);
        }

        return view('home', [
            'title' => 'Home Page',
            'posts' => $posts,
        ]);
    }

    public function post_detail($id)
    {
        return view('post', [
            'title' => 'Post Page',
            'post' => Posts::find($id),
        ]);
    }

    public function about_me()
    {
        return view('about', [
            'title' => 'About Page',
            'name' => 'Krisna Saputra',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae, consectetur. Accusamus fuga consequatur nulla
            consequuntur doloremque ad, ipsa inventore aut minus expedita exercitationem porro ducimus ipsum quas quisquam alias
            sint aliquam suscipit facere unde! Pariatur deleniti expedita eius suscipit architecto recusandae vero? Quod corrupti,
            fugiat perspiciatis beatae vel dolorum maxime quos facilis unde fuga officiis odit non deleniti harum quidem
            exercitationem? Officiis, molestias in unde autem nesciunt doloremque inventore animi, laborum modi quasi eveniet
            repellat odit officia? Repellendus explicabo distinctio temporibus id. Provident rem laudantium deserunt, itaque dolore
            corrupti! Repudiandae temporibus excepturi itaque obcaecati, illum magnam quas quae fugit? Harum.',
        ]);
    }
}