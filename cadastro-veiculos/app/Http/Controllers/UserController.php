<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest('id')->get();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Cadastrar novo usuario";
        return view('admin.add_edit_user', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(  Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'cpf' => 'required| string|max:15',
                'email' => 'required|email|unique:users',
                'photo' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );

        $filePath = public_path('uploads');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('password');


        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $user->photo = $file_name;
        }

        $result = $user->save();
        Session::flash('success', 'Usuario cadastrado com sucesso');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Update User";
        $edit = User::findOrFail($id);
        return view('admin.add_edit_user', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'cpf' => 'required| string|max:15',
                'email' => 'required|email|unique:users,email,' . $id,
                'photo' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
        $update = User::findOrFail($id);
        $update->name = $request->name;
        $update->username = $request->cpf;
        $update->cpf = $request->username;
        $update->email = $request->email;

        if ($request->hasfile('photo')) {
            $filePath = public_path('uploads');
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            // delete old photo
            if (!is_null($update->photo)) {
                $oldImage = public_path('uploads/' . $update->photo);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $update->photo = $file_name;
        }

        $result = $update->save();
        Session::flash('success', 'Usuario atualizado com sucesso');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userData = User::findOrFail($request->user_id);
        $userData->delete();
        // delete foto se existir
        if (!is_null($userData->photo)) {
            $photo = public_path('uploads/' . $userData->photo);
            if (File::exists($photo)) {
                unlink($photo);
            }
        }
        Session::flash('success', 'Usuario exluido com sucesso');
        return redirect()->route('user.index');
    }
}
