<?php

namespace App\Services;

trait Session
{
    /**
     * @since 1.2.0
     *
     * @param mixed $request
     * @param string $message
     * @param string $type
     * @return void
     */
    public static function create(mixed $request, string $message, string $type): void
    {
        $request->session()->flash('message', $message);
        $request->session()->flash('type', $type);
    }
}
