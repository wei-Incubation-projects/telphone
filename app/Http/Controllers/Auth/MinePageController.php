<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * 我的页面
 */
class MinePageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Mine');
    }

    public function history(Request $request): Response
    {
        $telHistory = [];
        $phones = Phone::query()->where('user_id', $request->user()->id)->get()->toArray();
        foreach ($phones as $phone) {
            $telHistory[] = [
                'phone' => $phone['phone'],
                'status' => Phone::$statusText[$phone['status']] ?? '待处理',
                'remark' => $phone['remark'],
            ];
        }
        return Inertia::render('History', ['telHistory' => $telHistory]);
    }
}
