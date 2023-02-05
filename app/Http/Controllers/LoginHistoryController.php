<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Support\Facades\Auth;

class LoginHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = LoginHistory::all()
            ->where('user_id', Auth::id())
            ->sortByDesc('created_at');

        return view('login-history', ['visits' => $visits]);
    }
}
