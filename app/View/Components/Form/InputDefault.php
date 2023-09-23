<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputDefault extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $type;

    /**
     * @var ?string
     */
    public $value;

    /**
     * @var ?string
     */
    public $is_required;

    /**
     * @var mixed
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $icon
     * @param string $label
     * @param string $type
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, string $icon, string $label, string $type, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->icon = $icon;
        $this->label = $label;
        $this->type = $type;

        if(isset($this->attributes)):
            if($this->attributes['required'] && $this->attributes['required'] == true):
                $this->is_required = '*';
            endif;
        endif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-default');
    }
}
