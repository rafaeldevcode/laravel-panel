<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * @var string|null
     */
    public $next;

    /**
     * @var string|null
     */
    public $previous;

    /**
     * @var int|null
     */
    public $current;

    /**
     * @var int|null
     */
    public $totalpages;

    /**
     * Create a new component instance.
     *
     * @param string|null $next
     * @param string|null $previous
     * @param int|null $current
     * @param int|null $totalpages
     * @return void
     */
    public function __construct(string|null $next, string|null $previous, int|null $current, string|null $totalpages)
    {
        $this->next = $next;
        $this->previous = $previous;
        $this->current = $current;
        $this->totalpages = $totalpages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination');
    }
}
