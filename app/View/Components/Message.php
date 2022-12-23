<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    /**
     * @var string|null $type
     */
    public $type;

    /**
     * @var string|null $text
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->type = request()->session()->get('type');
        $this->text = request()->session()->get('message');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}
