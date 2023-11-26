<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSearch extends Component
{
    public $value;

    public $attributes;

    public function __construct(?string $value = null)
    {
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('components.form.input-search');
    }
}
