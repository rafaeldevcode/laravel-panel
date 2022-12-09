<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesControllers extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $this->authorize('read', 'gallery');
        /**
         * @var User $user
         */
        $user = Auth::user();

        $folder = isset($request->query()['folder']) ? $request->query()['folder'] : '';
        $folder_name = (isset($request->query()['folder']) && !empty($request->query()['folder'])) ? "{$request->query()['folder']}" : null;
        $folders = isset($user->folders) ? json_decode($user->folders, true) : [];
        $folders = empty($folder) ? $folders : $folders[$folder];
        $files = $user->images()->where('folder_name', $folder_name)->get();

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');

        return view('admin/gallery/index', compact(
            'message',
            'type',
            'folders',
            'files',
            'folder'
        ));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $this->authorize('create', 'gallery');
        $folder = isset($request->folder) ? "/{$request->folder}" : '';

        DB::beginTransaction();
            User::find(Auth::user()->id)->images()->create([
                'name'        => $request->name,
                'folder_name' => $request->folder,
                'image'       => $request->file('image')->store("gallery{$folder}", 'public')
            ]);
        DB::commit();

        return redirect()->back();
    }

    /**
     * Adicionar um novo diretório
     *
     * @param Request $request
     * @return mixed
     */
    public function storeFolder(Request $request)
    {
        $this->authorize('create', 'gallery');
        /**
         * @var User $user
         */
        $user = Auth::user();
        $folders = isset($user->folders) ? json_decode($user->folders, true) : [];

        $folder = isset($request->folder) ? "{$request->folder}/" : '';
        if(isset($request->folder)):

            $folders[$request->folder]+=["{$folder}{$request->name}" => []];
            unset($folders["{$folder}{$request->name}"]);
        else:

            $folders = $folders+["{$folder}{$request->name}" => []];
        endif;

        DB::beginTransaction();
            User::find($user->id)->update([
                'folders' => json_encode($folders)
            ]);
            Storage::disk('public')->makeDirectory("gallery/{$folder}{$request->name}");
        DB::commit();

        return redirect()->back();
    }

    /**
     * Realizar dowload da imagem
     *
     * @param Request $request
     * @return mixed
     */
    public function imageDowload(Request $request)
    {
        $this->authorize('read', 'gallery');

        return Storage::download("public/{$request->image}");
    }

    /**
     * Remover imagem
     *
     * @param Request $request
     * @return mixed
     */
    public function imageRemove(Request $request)
    {
        $this->authorize('delete', 'gallery');

        /**
         * @var User $user
         */
        $user = Auth::user();

        DB::beginTransaction();
            $user->images()->where('image', $request->image)->delete();
            Storage::delete("public/{$request->image}");
        DB::commit();

        return redirect()->back();
    }

    /**
     * Remover diretório e todas as suas imagens
     *
     * @param Request $request
     * @return mixed
     */
    public function folderRemove(Request $request)
    {
        $this->authorize('delete', 'gallery');

        /**
         * @var User $user
         */
        $user = Auth::user();

        DB::beginTransaction();
            $images = $user->images()->where('folder_name', $request->folder_name)->get();

            foreach($images as $image):
                $user->images()->where('image', $image->image)->delete();
            endforeach;

            Storage::deleteDirectory("public/gallery/{$request->folder_name}");

            $folders = json_decode($user->folders, true);
            unset($folders[$request->folder_name]);
            User::find($user->id)->update(['folders' => json_encode($folders)]);
        DB::commit();

        return redirect()->back();
    }
}
