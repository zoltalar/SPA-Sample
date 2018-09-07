<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
        //
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }
}
