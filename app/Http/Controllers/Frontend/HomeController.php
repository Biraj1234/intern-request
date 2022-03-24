<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $data['row'] = Post::orderBy('position', 'ASC')->where('status', 1)->paginate(4);
        $data['categories'] = Category::paginate(3);
        $data['allCategories'] = Category::all();
        return view('frontend.home', $data);
    }
    public function detail($id)
    {
        $data['row'] =  $this->model::find($id);
        $data['categories'] = Category::paginate(3);
        return view('frontend.detail', $data);
    }
}
