<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $next;

    public $previous;

    public $current;

    public $totalpages;

    public function __construct(string|null $next, string|null $previous, int|null $current, string|null $totalpages)
    {
        $this->next = $next;
        $this->previous = $previous;
        $this->current = $current;
        $this->totalpages = $totalpages;
    }

    public function render(): View|Closure|string
    {
        return view('components.pagination');
    }
}
