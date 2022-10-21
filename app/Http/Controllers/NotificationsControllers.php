<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\NotificationsUser;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use Illuminate\Http\Request;
use App\Services\SessionMessage\SessionMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationsControllers extends Controller
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
        $this->authorize('read', 'notifications');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');
        $notifications = Notifications::paginate(10);

        $options = [
            'search' => true,
            'delete' => true,
            'add'    => [
                'href' => '/admin/notifications/add'
            ]
            ];

        return view('admin/notifications/index', compact(
            'options',
            'notifications',
            'message',
            'type'
        ));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', 'notifications');

        $notifications = Notifications::all();
        $method = 'add';

        return view('admin/notifications/addEdit', compact(
            'notifications',
            'method'
        ));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'notifications');

        $create->createNotifications($request);

        return redirect('/admin/notifications');
    }

    /**
     * Method for delete item menu
     *
     * @param Request $request
     * @param int $ID
     * @param DeleteServices $delete
     * @return mixed
     */
    public function delete(Request $request, int $ID, DeleteServices $delete)
    {
        $this->authorize('delete', 'notifications');

        $delete->deleteNotification($request, $ID);

        return redirect()->back();
    }

    /**
     * Method for delete several item menu
     *
     * @param Request $request
     * @param DeleteServices $delete
     * @return mixed
     */
    public function deleteSeveral(Request $request, DeleteServices $delete)
    {
        $this->authorize('delete', 'notifications');

        $delete->deleteSeveralNotification($request);

        return redirect()->back();
    }

    /**
     * @param int $ID
     * @return mixed
     */
    public function update(int $ID)
    {
        $this->authorize('update', 'notifications');

        SessionMessage::create(request(), 'Método indisponível!', 'cm-danger');

        return redirect()->back();
    }

    /**
     * @param int $ID
     * @return mixed
     */
    public function view(int $ID)
    {
        DB::beginTransaction();
            $not = NotificationsUser::where('user_id', Auth::user()
                ->id)->where('notifications_id', $ID)
                ->get()[0]
                ->update(['notification_status' => 'off']);
        DB::commit();

        return response()->json([
            'status'  => 'success',
            'message' => 'Notificação marcada como vista!'
        ], 201);
    }
}
