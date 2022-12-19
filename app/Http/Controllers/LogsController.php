<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionMessage\SessionMessage;
use Illuminate\Http\Response;

class LogsController extends Controller
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
     * @param Request $resquest
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('read', 'logs');

        $log_query = isset($request->query()['log']) ? $request->query()['log'] : 'laravel';

        $logs_files = scandir(storage_path('logs'));
        $logs_files = array_diff($logs_files, ['.', '..', '.gitignore']);

        $logs = file(storage_path('logs')."/{$log_query}.log");

        return view('admin/logs/index', compact(
            'logs_files',
            'logs',
            'log_query'
        ));
    }

    /**
     * @param Request $resquest
     * @return Response
     */
    public function clear(Request $request)
    {
        $this->authorize('update', 'logs');

        unlink(storage_path('logs')."/{$request->file}.log");
        file_put_contents(storage_path('logs')."/{$request->file}.log", '', FILE_APPEND );
        SessionMessage::create(request(), 'Arquivo de log limpado com sucesso!', 'cm-success');

        return redirect()->back();
    }
}
