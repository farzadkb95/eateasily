<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Browser;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'current_url' => request()->fullUrl(), // Or url()->current() if you just want the path without query parameters

        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required', 'email',
            ],
            'password' => ['required'],
        ]);

        $user = User::where('is_admin', true)
            ->where('email', $request->email)
            ->whereNotNull('email_verified_at')
            ->whereNotNull('password')
            ->first();

        if (
            empty($user)
        ) {
            return response()->json(
                ['message' => ['کاربر پیدا نشد']],
                400
            );
        }

        if (
            empty($user->password) ||
            ! Hash::check($request->password, $user->password)
        ) {
            return response()->json(
                ['message' => ['رمز عبور اشتباه است']],
                400
            );
        }
        $token = $user->createToken($this->getTokenName($request))->plainTextToken;

        return response()->json(['user' => new UserResource($user), 'token' => $token]);
    }

    protected function getTokenName(Request $request)
    {
        return Browser::platformName().'-'.Browser::browserFamily().'-'.$request->ip();
    }
}
