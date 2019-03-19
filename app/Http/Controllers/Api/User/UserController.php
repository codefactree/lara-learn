<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SaveUserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Jobs\User\CreateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\UpdateUser;
use App\Model\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRepositoryInterface $userRepo)
    {
        $data = UserCollection::collection($userRepo->all());
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $this->authorize('create', User::class);
        $data = dispatch_now(new CreateUser($request->all()));
        return response([
            'data' => new UserResource($data)
        ],Response::HTTP_CREATED);
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
        $data = new UserResource($user);
         return response()->json($data);
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
        $data = dispatch_now(new UpdateUser($user, $request->all()));   
        return response([
            "data" => new UserResource($data)
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\ResponseR̥
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', Auth::user());
        dispatch_now(new DeleteUser($user->id));       
        return response("User Deleted Successfully", Response::HTTP_OK);
    }
}
