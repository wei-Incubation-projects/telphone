<?php

namespace App\Http\Controllers\Back;

use App\Exports\PhoneExport;
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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Jiannei\Response\Laravel\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

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
        $contents = Storage::get($validated['file']);
        if(empty($contents)) return Response::fail('no');
        $batch = Phone::query()->max('batch') ?? 0;
        $array =  preg_split('/\s+/',$contents);
        foreach ($array as $value){
            $data[] = [
                'leader_id'=>$validated['leader_id'],
                'phone' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status' => 0,
                'batch' => $batch + 1,
            ];
        }
        return Phone::insert($data) ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Clear the specified resource.
     */
    public function clear(): JsonResponse|JsonResource
    {
        //
        Phone::query()->truncate();
        return Response::ok('ok');
    }

    /**
     * Export the specified resource in storage.
     */
    public function export(PhoneUpdateRequest $request,PhoneFilter $filter): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        //
        $model = Phone::filter($filter)->get();
//        Phone::query()->truncate();
        return Excel::download($model, date('Y-m-d').'全部数据.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        return  Phone::where('batch',$request->batch)->delete() ? Response::ok() : Response::fail();
    }

    /**
     * Batchs a listing of the resource.
     */
    public function batchs(): JsonResponse|JsonResource
    {
        //
        $model = Phone::query()->select('batch')->groupBy('batch')->get();
        return Response::success($model);
    }
}
