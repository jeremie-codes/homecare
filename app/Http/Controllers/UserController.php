<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $user = auth()->user();
        // $fields = $user->getFields() ?? [];

        // dd($fields);
        return view('user.index', compact('user'));
    }
}
