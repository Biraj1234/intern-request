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


class UserController extends BackendBaseController
{
    protected $panel = 'User';  //for section/moudule
    protected $folder = 'backend.user.'; //for view file
    protected $base_route = 'backend.user.'; //for route method
    protected $title;
    protected $model = 'User';

    function __construct()
    {
        $this->model = new User();
    }



    public function index()
    {


        $data['rows'] = User::all();

        return view($this->__loadDataToView($this->folder . 'index'), compact('data'));
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
        $this->title = 'Edit';
        $data['row'] = $this->model->find($id);

        return view($this->__loadDataToView($this->folder . 'edit'), $data);
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
        return redirect()->route($this->base_route . 'show', auth()->user()->id);
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
