<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class UserController extends Controller
{

    /**
     * Need to login to visit the pages
     * and not be a member.
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isMember');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // TODO: add check if current user is admin before he can add another admin

        $a = new User();

        if(!$a->validate(Input::all())) {
            return redirect('user/create')
                ->withErrors($a->errors())
                ->withInput();
        }

        $a->fill(Input::all());
        $a->save();

        $a->roles()->attach(Input::get('role'));

        Flash::success('New user is created');
        return Redirect::to('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // TODO: add check if current user is admin before he can add another admin
        $a = User::findOrFail($id);

        if(!$a->validate(Input::all(), true)) {
            return redirect('user/'.$id.'/edit')
                ->withErrors($a->errors())
                ->withInput();
        }
        if(!empty(Input::get('pass_new')))
            $a->password = bcrypt(Input::get('pass_new'));

        $a->fill(Input::all());
        $a->save();

        $a->detachAllRoles();
        $a->roles()->attach(Input::get('role'));

        Flash::success('User is updated');
        return Redirect::to('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
