<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\Back\Member\MemberDestroyRequest;
use App\Http\Requests\Back\Member\MemberIndexRequest;
use App\Http\Requests\Back\Member\MemberShowRequest;
use App\Http\Requests\Back\Member\UserStoreRequest;
use App\Http\Requests\Back\Member\UserUpdateRequest;
use App\Http\Resources\Back\UserResource;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Jiannei\Response\Laravel\Support\Facades\Response;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(MemberIndexRequest $request, UserFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = User::filter($filter)->where('is_leader', 0)->simplePaginate();
        return Response::success(UserResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $data = $request->validated();
        if (!empty($data['password'])) $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return User::create($data) ? Response::ok('ok') : Response::fail('no');
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
    public function update(UserUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::query()->findOrFail($request->id);
        $data = $request->validated();
        if (!empty($data['password'])) $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $model->fill(array_filter($data, fn($v, $k) => is_numeric($v) || !empty($v),ARRAY_FILTER_USE_BOTH))
            ->save() ? Response::ok() : Response::fail();
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
     * Batch a newly created resource in storage.
     */
    public function batch(UserStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $model = User::create($request->validated());
        return $model ? Response::ok('ok') : Response::fail('no');
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
        foreach ($result as $key => $value) {
            $result[$key] = ['label' => Phone::$statusText[$key], 'value' => $value];
        }
        return Response::success(array_values($result));
    }
}
