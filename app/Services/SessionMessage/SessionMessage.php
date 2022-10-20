<?php

namespace App\Services\SessionMessage;

use Illuminate\Http\Request;

trait SessionMessage
{
    public static function create(Request $request, string $message, string $type)
    {
        $request->session()->flash('message', $message);
        $request->session()->flash('type', $type);
    }
}
