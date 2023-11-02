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
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
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
        $model = User::create(array_merge($request->validated(),['is_leader'=>1]));
        return $model->fill(['leader_id'=>$model->id])->save() ? Response::ok('ok') : Response::fail('no');
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
        return $model->fill($request->validated())->save() ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->ids as $id) {
                    User::query()->findOrFail($id)->delete();
                }
            });
            return Response::ok();
        } catch (\Throwable $th) {
            return Response::fail($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function all(): JsonResponse|JsonResource
    {
        //
        $model = User::where('is_leader',1)->get();
        return Response::success(UserResource::collection($model));
    }

    /**
     * Stat a listing of the resource.
     */
    public function stat(Request $request): JsonResponse|JsonResource
    {
        //
        $model = Phone::query()->where('user_id', $request->id)
            ->selectRaw('status,count(1) as count')
            ->groupBy('status')->get()->toArray();
        $result = Phone::statusKey();
        foreach ($model as $item) {
            $result[$item['status']] = $item['count'];
        }
        foreach ($result as $key => $value){
            $result[$key] = ['label'=>Phone::$statusText[$key],'value'=>$value];
        }
        return Response::success(array_values($result));
    }
}
