<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function index()
    {
        $data['count'] = Post::count();
        return view('user.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(UserStoreRequest $request)
    {
        // dd($request->all());

        $file = $request->file('profile');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('uploads/users'), $fileName);
        $request->request->add(['image' => $fileName]);
        $request->request->add(['password' => Hash::make($request->input('password'))]);

        $data['row'] = $this->model::create($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'Your account is successfully created. Please enter your credentials');
        } else {
            $request->session()->flash('error', 'Error in creating user');
        }
        return redirect()->route('login');
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = $this->model->find($id);

        return view('user.edit', compact('data'));
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $data['row'] = $this->model->find($id);


        if ($request->hasFile('profile')) {

            $oldFile = 'uploads/users/' . $data['row']->image;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $file = $request->file('profile');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/users'), $fileName);
            $request->request->add(['image' => $fileName]);
        }


        $data['row']->update($request->all());
        if ($data['row']) {
            $request->session()->flash('success', 'User successfully updated');
        } else {
            $request->session()->flash('error', 'Error in updating User');
        }
        return redirect()->route('user.index');
    }


    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        //deleting profile picture if account is deleted
        $oldFile = 'uploads/users/' . $data['row']->image;
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }
        $data['row']->delete();
        return redirect()->route('/');
    }
}
