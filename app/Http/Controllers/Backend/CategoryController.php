<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends BackendBaseController
{
    protected $panel = 'Category';  //for section/moudule
    protected $folder = 'backend.category.'; //for view file
    protected $base_route = 'backend.category.'; //for route method
    protected $title;
    protected $model = 'Category';

    function __construct()
    {
        $this->model = new Category();
    }


    public function index()
    {
        $this->title = 'List';
        $data['posts'] = $this->model->all();
        return view($this->__loadDataToView($this->folder . 'index'), compact('data'));
    }

    public function create()
    {
        $this->title = 'Create';

        return view($this->__loadDataToView($this->folder . 'create'));
    }

    public function store(CategoryRequest $request)
    {
        $data['row'] = $this->model::create($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'Post successfully added');
        } else {
            $request->session()->flash('error', 'Error in creating post');
        }
        return redirect()->route($this->base_route . 'index');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $data['row'] = $this->model->find($id);

        return view($this->__loadDataToView($this->folder . 'edit'), compact('data'));
    }


    public function update(CategoryRequest $request, $id)
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

        $data['row']->delete();
        if ($data['row']) {
            request()->session()->flash('success', 'Post successfully deleted');
        } else {
            request()->session()->flash('error', 'Error in deleting post');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
