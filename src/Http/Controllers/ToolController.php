<?php

namespace Runline\ProfileTool\Http\Controllers;

use Illuminate\Routing\Controller;

class ToolController extends Controller
{
    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        auth()->user()->update(request()->only('name', 'email'));

        return response()->json(__("Your profile has been updated!"));
    }
}
