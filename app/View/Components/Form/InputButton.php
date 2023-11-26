<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputButton extends Component
{
    public $style;

    public $type;

    public $title;

    public $value;

    public $attributes;

    public function __construct(string $style, string $type, string $title, string $value)
    {
        $this->style = $style;
        $this->type = $type;
        $this->title = $title;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('components.form.input-button');
    }
}
