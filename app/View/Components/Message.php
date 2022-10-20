<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    /**
     * @var string $type
     */
    public $type;

    /**
     * @var string $text
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $text
     * @return void
     */
    public function __construct(string $type, string $text)
    {
        $this->type = $type;
        $this->text = $text;
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
