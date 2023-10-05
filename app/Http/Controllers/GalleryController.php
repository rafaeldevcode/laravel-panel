<?php

namespace App\Http\Controllers;

use App\Actions\GalleryActions;
use App\Models\Gallery;
use App\Services\Gallery as ServicesGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use App\Services\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @since 1.9.0
     *
     * @return View
     */
    public function index(): View
    {
        $this->authorize('read', 'gallery');

        return view('admin.gallery.index', [
            'method' => 'read',
            'images' => Gallery::paginate(30),
            'action' => GalleryActions::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @since 1.9.0
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = [];

        foreach($request->file('images') as $file):
            $response = ServicesGallery::saveImage($file);

            array_push($data, $response);
        endforeach;

        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @since 1.9.0
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        foreach($request->ids as $ID):
            ServicesGallery::removeImage($ID);
        endforeach;

        Session::create($request, 'Imagens removidas com sucesso!', 'success');

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @since 1.9.0
     *
     * @param Request $request
     * @return Response
     */
    public function get(Request $request)
    {
        $data = [[], []];
        $next = null;
        $gallery = isset($request->search)
            ? Gallery::where('name', 'LIKE', "%{$request->serach}%")->paginate($request->count, ['*'], 'page', $request->page)
            : Gallery::paginate($request->count, ['*'], 'page', $request->page);

        foreach($gallery as $image):
            array_push($data[0], [
                'file_path' => URL::to("storage/{$image->file}"),
                'id' => $image->id,
                'name' => $image->name
            ]);
        endforeach;

        $next = $gallery->hasMorePages() ? $gallery->currentPage()+1 : null;

        array_push($data[1], ['next' => $next]);

        return response()->json($data, 200);
    }
}
