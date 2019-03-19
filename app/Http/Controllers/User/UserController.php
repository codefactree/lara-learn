<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SaveUserRequest;
use App\Jobs\User\CreateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\UpdateUser;
use App\Model\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRepositoryInterface $userRepo)
    {
        //Only Login user can access the 
        $this->authorize('view',Auth::user(), User::class);
        return view('users.index', [
            'users' => $userRepo->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\SaveUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $this->authorize('create', User::class);
        dispatch_now(new CreateUser($request->all()));       
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', Auth::user(), User::class);
        dispatch_now(new UpdateUser($user, $request->all()));       
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', Auth::user());
        dispatch_now(new DeleteUser($user->id));       
        return redirect()->route('user.index');
    }
}
