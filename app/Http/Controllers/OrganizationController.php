<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function create()
    {
        return view('organization.register');
    }

    public function store(Request $request)
    {
        //
    }
}