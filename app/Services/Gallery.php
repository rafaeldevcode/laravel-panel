<?php

namespace App\Services;

use App\Models\Gallery as ModelsGallery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Gallery
{
    /**
     * @since 1.9.0
     *
     * @param mixed $file
     * @return array
     */
    public static function saveImage(mixed $file): array
    {
        $size = $file->getSize();
        $type = $file->extension();
        $name = str_replace(".{$type}", '', $file->getClientOriginalName());
        $name = str_replace(['_', '-', '.'], ' ', $name);
        $file = $file->store('gallery/'.Carbon::now()->format('Y/m'));

        DB::beginTransaction();
            $gallery = User::find(Auth::user()->id)->gellery()->create([
                'name' => $name,
                'file' => $file,
                'size' => $size,
                'type'=> 1
            ]);
        DB::commit();

        return [
            'status' => true,
            'file_path' => URL::to("storage/{$gallery->file}"),
            'id' => $gallery->id,
            'name' => $gallery->name
        ];
    }

    /**
     * @since 1.9.0
     *
     * @param int $gallery_id
     * @return void
     */
    public static function removeImage(int $gallery_id): void
    {
        $gallery = ModelsGallery::find($gallery_id);

        DB::beginTransaction();
            if (Storage::exists($gallery->file)):
                Storage::delete($gallery->file);
            endif;
        DB::commit();

        $gallery->delete();
    }
}
