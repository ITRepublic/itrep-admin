<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function create() {
    	return view('pages.login');
    }

    public function store() {
    	return redirect('dashboard');
    }

    public function destroy() {
    	session()->flush();
    	return redirect('/');
    }
}
