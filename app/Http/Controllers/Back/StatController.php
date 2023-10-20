<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.数据列表
     */
    public function summary(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = Phone::filter($filter)->simplePaginate();
        return Response::success(PhoneResource::collection($model));
    }

    /**
     * Display a listing of the resource.电销统计
     */
    public function report(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = Phone::filter($filter)->simplePaginate();
        return Response::success(PhoneResource::collection($model));
    }

    /**
     * Display a listing of the resource.批次统计
     */
    public function index(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = Phone::filter($filter)->simplePaginate();
        return Response::success(PhoneResource::collection($model));
    }
}
