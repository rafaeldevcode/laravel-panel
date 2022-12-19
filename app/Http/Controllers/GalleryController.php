<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class GalleryController extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('read', 'gallery');
        /**
         * @var User $user
         */
        $user = Auth::user();

        $folder = isset($request->query()['folder']) ? "{$request->query()['folder']}" : '';
        $folder_name = (isset($request->query()['folder']) && !empty($request->query()['folder'])) ? "{$request->query()['folder']}" : null;
        $folders = Storage::directories("public/gallery/{$folder}");
        $files = $user->gallery()->where('folder_name', $folder_name)->get();

        return view('admin/gallery/index', compact(
            'folders',
            'files',
            'folder'
        ));
    }

    /**
     * Upload a file
     *
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $this->authorize('create', 'gallery');

        $folder = isset($request->folder) ? "{$request->folder}/" : '';
        $mime_type = $request->path->getMimeType();
        $file_name = Carbon::now()->format('Y-m-d_His').str_replace(' ', '', $request->path->getClientOriginalName());
        $path = "gallery/{$folder}{$file_name}";
        $type = strpos($mime_type, 'image') === false ? 'video' : 'image';
        $is_uploaded = Storage::disk('public')->put($path, file_get_contents($request->path));

        if($is_uploaded):
            DB::beginTransaction();
                User::find(Auth::user()->id)->gallery()->create([
                    'title'       => $request->title,
                    'folder_name' => $request->folder,
                    'path'        => $path,
                    'type'        => $type
                ]);
            DB::commit();
        endif;

        return redirect()->back();
    }

    /**
     * Add a new directory
     *
     * @param Request $request
     * @return Response
     */
    public function storeFolder(Request $request)
    {
        $this->authorize('create', 'gallery');

        $folder = isset($request->folder) ? "{$request->folder}/" : '';

        Storage::disk('public')->makeDirectory("gallery/{$folder}{$request->name}");

        return redirect()->back();
    }

    /**
     * Download a specific file
     *
     * @param Request $request
     * @return Response
     */
    public function dowloadFile(Request $request)
    {
        $this->authorize('read', 'gallery');

        return Storage::download("public/{$request->path}");
    }

    /**
     * Remove a specific image
     *
     * @param Request $request
     * @return Response
     */
    public function destroyFile(Request $request)
    {
        $this->authorize('delete', 'gallery');

        /**
         * @var User $user
         */
        $user = Auth::user();

        DB::beginTransaction();
            $user->gallery()->where('path', $request->path)->delete();

            Storage::delete("public/{$request->path}");
        DB::commit();

        return redirect()->back();
    }

    /**
     * Destroy the directory with all the images
     *
     * @param Request $request
     * @return Response
     */
    public function destroyFolder(Request $request)
    {
        $this->authorize('delete', 'gallery');

        /**
         * @var User $user
         */
        $user = Auth::user();
        $folder_name = str_replace('public/gallery/', '', $request->folder_name);

        DB::beginTransaction();
            $files = $user->gallery()->where('folder_name', $folder_name)->get();

            foreach($files as $file):
                $user->gallery()->where('path', $file->path)->delete();
            endforeach;

            Storage::deleteDirectory($request->folder_name);
        DB::commit();

        return redirect()->back();
    }
}
