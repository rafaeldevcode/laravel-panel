<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tinymce extends Component
{
    public $name;

    public $value;

    public function __construct(string $name, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('components.tinymce');
    }
}
