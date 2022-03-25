<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected $panel = 'Dashboard';  //for section/moudule
    protected $folder = 'backend.dashboard.'; //for view file
    protected $base_route = 'backend.dashboard.'; //for route method
    protected $title;
    protected $model = 'Dashboard';

    public function index()
    {
        $data['posts'] = Post::count();
        $data['categories'] = Category::count();
        $data['users'] = User::count();
        return view($this->__loadDataToView($this->folder . 'index'), $data);
    }
}
