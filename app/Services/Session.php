<?php

namespace App\Services;

trait Session
{
    public static function create(mixed $request, string $message, string $type): void
    {
        $request->session()->flash('message', $message);
        $request->session()->flash('type', $type);
    }
}
