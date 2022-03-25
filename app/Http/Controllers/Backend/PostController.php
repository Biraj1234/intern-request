<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends BackendBaseController
{
    protected $panel = 'Post';  //for section/moudule
    protected $folder = 'backend.post.'; //for view file
    protected $base_route = 'backend.post.'; //for route method
    protected $title;
    protected $model = 'Post';

    function __construct()
    {
        $this->model = new Post();
    }


    public function index()
    {
        $data['posts'] = Post::where('user_id', Auth::user()->id)->get();
        return view($this->__loadDataToView($this->folder . 'index'), compact('data'));
    }

    public function create()
    {
        $this->title = 'Create';

        $data['categories'] = Category::pluck('title', 'id');

        return view($this->__loadDataToView($this->folder . 'create'), $data);
    }


    public function store(PostStoreRequest $request)
    {
        // dd($request->all());

        $file = $request->file('image_file');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('uploads/posts'), $fileName);
        $request->request->add(['image' => $fileName]);

        $id = Auth::user()->id;

        $request->request->add(['user_id' => $id]);
        $data['row'] = $this->model::create($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'Post successfully added');
        } else {
            $request->session()->flash('error', 'Error in creating post');
        }
        return redirect()->route($this->base_route . 'index');
    }


    public function show($id)
    {

        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            request()->session()->flash('error', 'Record not found in ' . $this->panel);
            return redirect()->route($this->base_route . 'index');
        }
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder . 'show'), $data);
    }


    public function edit($id)
    {
        $this->title = 'Create';
        $data['categories'] = Category::pluck('title', 'id');
        $data['row'] = $this->model->find($id);

        return view($this->__loadDataToView($this->folder . 'edit'), $data);
    }


    public function update(PostUpdateRequest $request, $id)
    {
        // dd($request->status);

        $data['row'] = $this->model->find($id);

        if ($request->hasFile('image_file')) {

            $oldFile = 'uploads/posts/' . $data['row']->image;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('image_file');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/posts'), $fileName);
            $request->request->add(['image' => $fileName]);
        }

        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'Post successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating post');
        }
        return redirect()->route($this->base_route . 'index');
    }


    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        //deleting old photo if post is deleted
        $oldFile = 'uploads/posts/' . $data['row']->image;
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }
        $data['row']->delete();
        if ($data['row']) {
            request()->session()->flash('success', 'Post successfully deleted');
        } else {
            request()->session()->flash('error', 'Error in deleting post');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
