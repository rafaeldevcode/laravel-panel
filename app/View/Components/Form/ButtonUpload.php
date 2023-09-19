<?php

namespace App\View\Components;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonUpload extends Component
{
    /**
     * @var string
     */
    public $name;

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
    public $is_required = null;

    /**
     * @var ?Gallery
     */
    public $images = null;

    /**
     * Create a new component instance.
     *
     * @since 1.9.0
     *
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $value
     * @return void
     */
    public function __construct(string $name, string $label, ?string $type = 'radio', ?string $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;

        if(isset($this->attributes)):
            if($this->attributes['required'] && $this->attributes['required'] == true):
                $this->is_required = '*';
            endif;
        endif;

        if(isset($value)):
            $this->images = [Gallery::find($value)];
        endif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @since 1.9.0
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.button-upload');
    }
}
