<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputSearch extends Component
{
    /**
     * @var mixed $attributes
     */
    public $attributes;

    /**
     * @var ?string $value
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param ?string $value
     * @return void
     */
    public function __construct(?string $value = null)
    {
        // $attr = null;

        // if(isset($attributes)):
        //     if(is_array($attributes)):
        //         foreach($attributes as $indice => $attribute):
        //             $attr .= "{$indice}={$attribute} ";
        //         endforeach;
        //     else:
        //         $attr = $attributes;
        //     endif;
        // endif;

        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-search');
    }
}
