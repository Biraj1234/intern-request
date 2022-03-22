<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->model = Post::class;
    }
    public function home()
    {
        $data['row'] = $this->model::orderBy('position', 'ASC')->where('status', 1)->paginate(4);
        return view('frontend.home', $data);
    }
    public function detail($id)
    {
        $data['row'] =  $this->model::find($id);
        return view('frontend.detail', $data);
    }
}
