<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * get initial data
     *
     * send this request the first time app loaded to get info about user
     * if singed in or guest token.
     */
    public function initialData(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            /**
             * @var string|null
             */
            'gid' => request()->guest()?->token,
            /**
             * @var UserResource|null
             */
            'user' => request()->user() ? new UserResource(request()->user()) : null,
        ]);
    }
}
