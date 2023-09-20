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
use App\Imports\PhoneImport;
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
        $validated['admin_id'] = auth('admin')->id();
        $model = Phone::create($validated);
        return $model ? Response::ok('ok') : Response::fail('no');
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
        $validated['admin_id'] = auth('admin')->id();
        return $model->save($validated) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = Phone::query()->findOrFail($request->id);
        return  $model->delete() ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function upload(Object $request): JsonResponse|JsonResource
    {
        //
        $request->validate(['file'=>'required|mimes:xls,xlsx,csv']);
        if($request->hasFile('file')){
            $file = $request->file('file');
            \Maatwebsite\Excel\Facades\Excel::import(new PhoneImport(auth('admin')->id()),$file);
            return Response::ok() ;
        }
        return Response::fail('上传失败');
    }
}
