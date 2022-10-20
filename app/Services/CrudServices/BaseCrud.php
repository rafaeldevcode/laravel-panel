<?php

namespace App\Services\CrudServices;

use App\Models\Permissions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Services\SessionMessage\SessionMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseCrud
{
    /**
     * @param string $name
     * @return string
     */
    public function normalizeName(string $name): string
    {
        $name = strtolower($name);
        $name = str_replace(' ', '_', $name);
        $name = str_replace('-', '_', $name);
        $name = preg_replace(["/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"], explode(" ","a A e E i I o O u U n N c C"), $name);

        return $name;
    }

    /**
     * @param string $name
     * @return string
     */
    public function normalizeSlug(string $name): string
    {
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        $name = preg_replace(["/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"], explode(" ","a A e E i I o O u U n N c C"), $name);

        return $name;
    }

    /**
     * Verificar formatos dos arquivos de configurações e autenticação do google
     *
     * @param Request $request
     * @return bool
     */
    public function verifyFormatArchives(Request $request): bool
    {
        $is_valid = true;

        $file_access_token_json_extension =$request->access_token_json->extension();
        $file_adsapi_ini_extension = $request->adsapi_ini->extension();

        if($file_access_token_json_extension !== 'json'):
            SessionMessage::create($request, 'Formato de arquivo inválido, aceito somente .json', 'cm-danger');

            $is_valid = false;
        elseif($file_adsapi_ini_extension !== 'txt'):
            SessionMessage::create($request, 'Formato de arquivo inválido, aceito somente .ini', 'cm-danger');
            $is_valid = false;
        endif;

        return $is_valid;
    }

    /**
     * @param string $name
     * @param string $access_token_json
     * @param string $adsapi_ini
     * @return array
     */
    public function createFilesSettings(string $name, string $access_token_json, string $adsapi_ini): array
    {
        $storage_path = storage_path();
        $name = str_replace(' ', '-', $name);
        $name = strtolower($name);
        $date = Carbon::now()->format('Y-m-d_H-i-s');
        $path_file_ini = "accounts-settings/adsapi_{$name}-{$date}.ini";
        $path_file_json = "accounts-settings/adsapi_{$name}-{$date}.json";

        $adsapi_ini = str_replace('path_file_json_not_edit_this_line', "{$storage_path}/app/public/{$path_file_json}", $adsapi_ini);
        $adsapi_ini = str_replace('path_file_log_soap_not_edit_this_line', "{$storage_path}/logs/soap.log", $adsapi_ini);
        $adsapi_ini = str_replace('path_file_log_downloader_not_edit_this_line', "{$storage_path}/logs/downloader.log", $adsapi_ini);

        Storage::disk('public')->put($path_file_ini, $adsapi_ini);
        Storage::disk('public')->put($path_file_json, $access_token_json);

        return [
            'path_file_json' => $path_file_json,
            'path_file_ini'  => $path_file_ini
        ];
    }

    /**
     * @param string $prefix
     * @return void
     */
    public function createPermissionForAdmin(string $prefix): void
    {
        $permission_admin = DB::table('permissions')
            ->where('eng_name', 'admin')
            ->get()[0];

            $old_permission = json_decode($permission_admin->permissions, true);

            $new_permissions = [
                "read_{$prefix}"   => 'on',
                "create_{$prefix}" => 'on',
                "update_{$prefix}" => 'on',
                "delete_{$prefix}" => 'on'
            ];

            $permissions = array_merge($old_permission, $new_permissions);
            $permissions = json_encode($permissions);

            DB::beginTransaction();
                Permissions::find($permission_admin->id)->update([
                    'permissions' => $permissions
                ]);
            DB::commit();
    }

    /**
     * @param array permissions
     * @param ?string $extra_permissions
     * @return array
     */
    protected function getPermissionsInJson(array $permissions, ?string $extra_permissions): array
    {
        $extra_permissions_array = [];
        $extra_permissions_json = [];

        // Formatar as permissões extras
        if(!is_null($extra_permissions)):
            $extra_permissions = explode(',', $extra_permissions);

            foreach($extra_permissions as $permission):

                $permission = explode('=', $permission);
                array_push($extra_permissions_array, [$permission[0] => $permission[1]]);
            endforeach;

            for ($i = 0; $i < count($extra_permissions_array) ; $i++):

                $permissions = array_merge($permissions, $extra_permissions_array[$i]);
                $extra_permissions_json = array_merge($extra_permissions_json, $extra_permissions_array[$i]);
            endfor;
        endif;

        $extra_permissions_json = empty($extra_permissions) ? null : json_encode($extra_permissions_json);

        return [
            'permissions' => json_encode($permissions),
            'extra_permissions' => $extra_permissions_json,
        ];
    }
}
