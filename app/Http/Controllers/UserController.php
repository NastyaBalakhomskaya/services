<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SignUpRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signUpForm()
    {
        return view('sign-up');
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->validated();
        $this->userService->register($data);

        session()->flash('success', 'Success!');

        return redirect()->route('home');
    }

    public function verifyEmail(string $id, string $hash, Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }

        $user = User::query()->findOrFail($id);
        if (! hash_equals($hash, sha1($user->email))) {
            abort(403);
        }
        $user->email_verified_at = new \DateTime();
        $user->save();

        session()->flash('success', 'Success!');

        return redirect()->route('home');
    }
}
