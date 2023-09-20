<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\PhoneFilter;
use App\Http\Requests\Back\Tel\UserTelDestroyRequest;
use App\Http\Requests\Back\Tel\UserTelIndexRequest;
use App\Http\Requests\Back\Tel\UserTelShowRequest;
use App\Http\Requests\Back\Tel\UserTelStoreRequest;
use App\Http\Requests\Back\Tel\UserTelUpdateRequest;
use App\Http\Resources\Back\UserTelResource;
use App\Models\UserPhone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class UserTelController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UserTelIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = UserPhone::filter($filter)->simplePaginate();
        return Response::success(UserTelResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserTelStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = UserPhone::create($validated);
        return $model ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserTelShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = UserPhone::query()->findOrFail($request->id);
        return Response::success(new UserTelResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserTelUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = UserPhone::query()->findOrFail($request->id);
        return $model->save($validated) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTelDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = UserPhone::query()->findOrFail($request->id);
        return  $model->delete() ? Response::ok() : Response::fail();
    }

}
