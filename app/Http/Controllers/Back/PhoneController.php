<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\PhoneFilter;
use App\Http\Requests\Back\Phone\PhoneDestroyRequest;
use App\Http\Requests\Back\Phone\PhoneIndexRequest;
use App\Http\Requests\Back\Phone\PhoneShowRequest;
use App\Http\Requests\Back\Phone\PhoneStoreRequest;
use App\Http\Requests\Back\Phone\PhoneUpdateRequest;
use App\Http\Resources\Back\PhoneResource;
use App\Models\Phone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class PhoneController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(PhoneIndexRequest $request, PhoneFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = Phone::filter($filter)->simplePaginate();
        return Response::success(PhoneResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhoneStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = Phone::create($validated);
        return $model?->roles()->sync($validated['role']) ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = Phone::query()->findOrFail($request->id);
        return Response::success(new PhoneResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhoneUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = Phone::query()->findOrFail($request->id);
        return $model->save($validated) && $model->roles()->sync($validated['role'])
            ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = Phone::query()->findOrFail($request->id);
        $model->roles()->detach();
        return  $model->delete() ? Response::ok() : Response::fail();
    }
}
