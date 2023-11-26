<?php

namespace App\View\Components\Form;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonUpload extends Component
{
    public $name;

    public $label;

    public $type;

    public $value;

    public $is_required = null;

    public $images = null;

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

    public function render(): View|Closure|string
    {
        return view('components.form.button-upload');
    }
}
