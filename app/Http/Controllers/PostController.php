<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }


    public function index()
    {
        dd('hello');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $data['row'] = $this->model->find($id);

        return view('post.edit', compact('data'));
    }


    public function update(PostUpdateRequest $request, $id)
    {

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
        return redirect()->route('home');
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
        return redirect()->route('home');
    }
}
