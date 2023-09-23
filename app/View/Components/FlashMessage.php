<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashMessage extends Component
{
    /**
     * @var ?string
     */
    public $message;

    /**
     * @var ?string
     */
    public $color;

    /**
     * @var ?string
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = request()->session()->get('message');
        $this->color = request()->session()->get('type');
        $this->icon = $this->getIcon();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return string|View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return isset($this->message) ? view('components.flash-message') : '';
    }

    /**
     * @return string
     */
    private function getIcon(): string
    {
        $class_icon = '';

        switch ($this->color):
            case 'danger':
                $class_icon = 'bi-dash-circle';
                break;

            case 'success':
                $class_icon = 'bi-check2-circle';
                break;

            case 'warning':
                $class_icon = 'bi-exclamation-circle-fill';
                break;

            case 'info':
                $class_icon = 'bi-info-circle';

            default:
                $class_icon = 'bi-dash-circle';
                break;
        endswitch;

        return $class_icon;
    }
}
