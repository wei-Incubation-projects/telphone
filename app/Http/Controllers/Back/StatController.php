<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\PhoneFilter;
use App\Http\Requests\Back\Phone\PhoneIndexRequest;
use App\Http\Resources\Back\PhoneResource;
use App\Http\Resources\Back\UserResource;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Jiannei\Response\Laravel\Support\Facades\Response;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.数据列表
     */
    public function summary(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        $model = Phone::filter($filter)
            ->select(DB::raw('batch,status,any_value(created_at) as created_at, any_value(leader_id) as leader_id,count(1) as count'))
            ->groupBy('batch')->groupBy('status')->get()->toArray();
        $result = [];
        $keys = Phone::statusKey();
        $leader_id = array_column($model, 'leader_id');
        $leaders = User::query()->whereIn('id', $leader_id)->get()->toArray();
        $leaders = array_column($leaders, 'username', 'id');
        foreach ($model as $item) {
            if (!isset($result[$item['batch']])) $result[$item['batch']] = $keys;
            $result[$item['batch']][$item['status']] = $item['count'];
            $result[$item['batch']]['batch'] = $item['batch'];
            $result[$item['batch']]['leader_id'] = $item['leader_id'];
            $result[$item['batch']]['created_at'] = $item['created_at'];
            $result[$item['batch']]['leader_id'] = $leaders[$item['leader_id']] ?? $item['leader_id'];
        }
        foreach ($result as $k => $row) {
            foreach ($row as $s => $value) {
                if (key_exists($s, $keys)) {
                    $result[$k]['a' . $s] = $value;
                    unset($result[$k][$s]);
                }
            }
        }
        return Response::success(array_values($result));
    }

    /**
     * Display a listing of the resource.电销统计
     */
    public function report(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = User::filter($filter)->simplePaginate();
        return Response::success(UserResource::collection($model));
    }

    /**
     * Display a listing of the resource.批次统计
     */
    public function batch(PhoneIndexRequest $request): JsonResponse|JsonResource
    {
        $model = Phone::query()->selectRaw('batch,count(1) as count, any_value(created_at) as created_at')
            ->groupBy('batch')->simplePaginate($request->size);
        return Response::success($model);
    }
}
