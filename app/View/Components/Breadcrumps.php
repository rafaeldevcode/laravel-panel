<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumps extends Component
{
    /**
     * @var string $color
     */
    public $color;

    /**
     * @var string $icon
     */
    public $icon;

    /**
     * @var string $title
     */
    public $title;

    /**
     * @var string $type
     */
    public $type;

    /**
     * @var ?array $options
     */
    public $options;

    /**
     * @var ?string $route
     */
    public $route;

    /**
     * @var array $breadcrumps
     */
    public $breadcrumps;

    /**
     * @var int $ID
     */
    public $ID;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $color, string $icon, string $title, string $type, ?array $options = null, ?string $route = null)
    {
        $breadcrumps = $this->normalizeBreadcrumps();

        $this->color       = $color;
        $this->icon        = $icon;
        $this->title       = $title;
        $this->type        = $type;
        $this->options     = $options;
        $this->route       = $route;
        $this->breadcrumps =  $breadcrumps[0];
        $this->ID          = $breadcrumps[1];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumps');
    }

    /**
     * @return array
     */
    private function normalizeBreadcrumps(): array
    {
        $breadcrumps_normalize = [];
        $breadcrumps = request()->route();
        $ID = isset($breadcrumps->parameters['ID']) ? $breadcrumps->parameters['ID'] : null;

        $breadcrumps = explode('/', $breadcrumps->uri);

        if(in_array('{ID}', $breadcrumps)):
            unset($breadcrumps[count($breadcrumps)-1]);
        endif;

        foreach($breadcrumps as $breadcrump):
            if(empty($breadcrumps_normalize)):
                $slug = "{$breadcrump}";
                array_push($breadcrumps_normalize, [
                    "name" => $breadcrump,
                    "slug" =>$slug
                ]);
            else:
                $slug = "{$breadcrumps_normalize[count($breadcrumps_normalize)-1]['slug']}/{$breadcrump}";
                array_push($breadcrumps_normalize, [
                    "name" => $breadcrump,
                    "slug" =>$slug
                ]);
            endif;
        endforeach;

        return [$breadcrumps_normalize, $ID];
    }
}
