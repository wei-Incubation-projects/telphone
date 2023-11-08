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
        return Inertia::render('Dashboard', $this->getPhoneJob($leaderId));
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

    public function telphone(Request $request): \Illuminate\Http\JsonResponse
    {
        $model = Phone::query()->findOrFail($request->id);
        $res = $model->fill(array_merge($request->all(), ['user_id' => $request->user()->id]))->save();
        return response()->json([
            'code' => $res ? 200 : 400,
            'message' => 'ok',
            'data' => $this->getPhoneJob($request->user()->leader_id),
        ]);
    }

    private function getPhoneJob($leaderId): array
    {
        $result = $tel = [];
        $status = Phone::query()->selectRaw(DB::raw('status,count(1) as count'))
            ->where('leader_id', $leaderId)->groupBy('status')->get()->toArray();
        $status = !empty($status) ? array_column($status, 'count', 'status') : $status;
        foreach (Phone::$statusText as $k => $value) {
            $result[$k] = $status[$k] ?? 0;
        }
        $count = Phone::query()->where('leader_id', $leaderId)
            ->where('status', '!=', 0)->count();
        try {
            DB::beginTransaction();
            $remember = Phone::query()->where('status',0)
                ->where(['leader_id' => $leaderId, 'user_id' => request()->user()->id])
                ->whereNotNull('locked_at')->first();

            if (!empty($remember)) {
                if ($remember->locked_at > now()) {
                    $tel = $remember;
                } else {
                    $remember->save(['user_id' => null, 'locked_at' => null]);
                }
            }
            if (empty($tel)) {
                $tel = Phone::query()->where('leader_id', $leaderId)->whereNot('id',$remember?->id)
                    ->where('status',0)->whereNull('user_id')->first();
                $tel?->fill(['user_id' => request()->user()->id, 'locked_at' => date('Y-m-d H:i:s', strtotime('+5 minute', time()))])->save();
            }
            DB::commit();
        }catch (\Throwable $th){
            DB::rollBack();
        }
        return ['status' => $result, 'count' => $count, 'tel' => $tel];
    }
}
