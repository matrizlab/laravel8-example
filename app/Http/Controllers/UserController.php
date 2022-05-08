<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInfoRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function index()
    {
        //return User::all();
        //return User::paginate();
        //return User::with('role')->paginate();
        $users = User::paginate();

        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return new UserResource($user);
    }

    public function store(UserCreateRequest $request)
    {
        //$user = User::create($request->all());

//        $user = User::create([
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'email' => $request->input('email'),
//            'password' => Hash::make('password')
//            ]
//        );

        $user = User::create(
            $request->only('first_name', 'last_name', 'email', 'role_id')
            + ['password' => Hash::make(1234)]
        );

        //return response($user, Response::HTTP_CREATED);
        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

//        $user->update([
//                'first_name' => $request->input('first_name'),
//                'last_name' => $request->input('last_name'),
//                'email' => $request->input('email'),
//                //'password' => Hash::make($request->input('password'))
//            ]
//        );

        $user->update($request->only('first_name','last_name','email', 'role_id'));

        //return response($user, Response::HTTP_ACCEPTED);
        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function user()
    {
        //return Auth::user();
        $user = Auth::user();

        //return (new UserResource($user));
        return (new UserResource($user))->additional([
            'data' => [
                'permissions' => $user->permissions(),
            ],
        ]);
    }

    public function updateInfo(UpdateInfoRequest $request)
    {
        $user = Auth::user();

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
