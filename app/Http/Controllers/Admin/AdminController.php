<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // keep alert message with the redirection
        if (session()->has('alert.config')) {
            session()->flash('alert.config', session()->pull('alert.config'));
        }

        return redirect()->route('dashboard.index');
    }
}
