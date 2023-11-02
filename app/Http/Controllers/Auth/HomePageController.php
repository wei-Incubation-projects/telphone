<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

/**
 * 工作台
 */
class HomePageController extends Controller
{
    public function index(): Response
    {
        $leaderId = request()->user()?->leader_id;
        $result = [];
        $status = Phone::query()->selectRaw(DB::raw('status,count(1) as count'))
            ->where('leader_id', $leaderId)->groupBy('status')->get()->toArray();
        $status = !empty($status) ? array_column($status, 'count', 'status') : $status;
        foreach (Phone::$statusText as $k => $value) {
            $result[$k] = $status[$k] ?? 0;
        }
        $count = Phone::query()->where('leader_id', $leaderId)
            ->where('status', '!=', 0)->count();
        DB::beginTransaction();
        $remember = Phone::query()->where(['leader_id'=>$leaderId,'user_id'=>request()->user()->id])
            ->whereNotNull('locked_at')->first();
        $tel = [];
        if(!empty($remember)){
            if($remember->locked_at > now()){
                $tel = $remember;
            }else{
                $remember->save(['user_id'=> null,'locked_at'=>null]);
            }
        }
        if(empty($tel)){
            $tel = Phone::query()->where('leader_id', $leaderId)->whereNull('user_id')->first();
            if(!empty($tel)){
                $tel->save(['user_id'=>request()->user()->id,'locked_at'=>date('Y-m-d H:i:s', strtotime('+5 minute',time()))]);
            }
        }
        return Inertia::render('Dashboard', ['status' => $result, 'count' => $count,'tel'=>$tel]);
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate(['phone' => 'required|string|min:8,max:26']);
        $phone = Phone::query()->where('phone', $request->input('phone'))->first();
        return response()->json([
            'code' => 200,
            'message' => 'ok',
            'data' => $phone,
        ]);
    }

    public function telphone(Request $request):  \Illuminate\Http\JsonResponse
    {
        $model = Phone::query()->findOrFail($request->id);
        $res = $model->fill(array_merge($request->all(),['user_id'=>$request->user()->id]))->save();
        return response()->json([
            'code' => $res ? 200 : 400,
            'message' => 'ok',
            'data' => [],
        ]);
    }
}
