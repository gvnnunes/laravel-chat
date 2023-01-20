<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserApiController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $users = $this->user->inRandomOrder()->where('id', '!=', Auth::user()->id)->get();
        return UserResource::collection($users);
    }
}
