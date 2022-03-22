<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->middleware('auth')->only('index');
    }
    public function index()
    {
        $data['count'] = Post::where('user_id', Auth::user()->id)->count();
        return view('backend.user.index', $data);
    }

    public function store(UserStoreRequest $request)
    {
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

    public function edit($id)
    {
        $data['row'] = $this->model->find($id);

        return view('backend.user.edit', compact('data'));
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