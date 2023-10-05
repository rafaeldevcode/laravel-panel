<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeColorSvg extends Command
{
    protected $signature = 'app:change-color-svg {old} {new}';
    protected $description = 'Change main colors of svg images';

    public function handle(): string
    {
        $old_color = $this->argument('old');
        $new_color = $this->argument('new');

        $path = public_path('assets/images/');
        $images = scandir($path);
        $images = array_filter($images, function($item){
            return strpos($item, '.svg') !== false ? true : false;
        });

        foreach($images as $image):
            $svg_content = file_get_contents("{$path}{$image}");

            $new_svg_content = str_replace($old_color, $new_color, $svg_content);

            file_put_contents("{$path}{$image}", $new_svg_content);
        endforeach;

        return Command::SUCCESS;
    }
}
