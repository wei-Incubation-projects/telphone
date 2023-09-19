<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\Back\User\UserDestroyRequest;
use App\Http\Requests\Back\User\UserIndexRequest;
use App\Http\Requests\Back\User\UserShowRequest;
use App\Http\Requests\Back\User\UserStoreRequest;
use App\Http\Requests\Back\User\UserUpdateRequest;
use App\Http\Resources\Back\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UserIndexRequest $request, UserFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = User::filter($filter)->simplePaginate();
        return Response::success(UserResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = User::create($validated);
        return $model?->roles()->sync($validated['role']) ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::query()->findOrFail($request->id);
        return Response::success(new UserResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = User::query()->findOrFail($request->id);
        return $model->save($validated) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::query()->findOrFail($request->id);
        return  $model->delete() ? Response::ok() : Response::fail();
    }
}
