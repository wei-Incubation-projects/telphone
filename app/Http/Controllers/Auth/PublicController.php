<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class PublicController extends Controller
{
    public function index(): Response
    {
//        Phone::create(['phone'=>'17720492630','leader_id'=>0,'batch'=>1]);
        $user = request()->user();
        $status = Phone::query()->selectRaw(DB::raw('status,count(1) as count'))
            ->where('leader_id',$user?->leader_id)->groupBy('status')->get()->toArray();
        $status = $status ? array_column($status,'count','status') : [];
        $result = [];
        foreach (Phone::$statusText as $k=>$value){
            $result[$k] = $status[$k] ?? 0;
        }
        $count = Phone::query()->where('leader_id',$user?->leader_id)
            ->where('status','!=',0)->count();
        return Inertia::render('Dashboard',['status'=>$result,'count'=>$count]);
    }
}
