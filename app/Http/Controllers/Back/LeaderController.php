<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\Back\Member\LeaderStoreRequest;
use App\Http\Requests\Back\Member\LeaderUpdateRequest;
use App\Http\Requests\Back\Member\MemberDestroyRequest;
use App\Http\Requests\Back\Member\MemberIndexRequest;
use App\Http\Requests\Back\Member\MemberShowRequest;
use App\Http\Resources\Back\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class LeaderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(MemberIndexRequest $request, UserFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = User::filter($filter)->where('is_leader',1)->simplePaginate();
        return Response::success(UserResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaderStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::create($request->validated());
        return $model ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::query()->findOrFail($request->id);
        return Response::success(new UserResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaderUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::query()->findOrFail($request->id);
        return $model->save($request->validated()) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        try{
            User::query()->findOrFail($request->id)->delete();
            return  Response::ok();
        }catch (\Throwable $th){
            return  Response::fail($th->getMessage());
        }
    }

}
