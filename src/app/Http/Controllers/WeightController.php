<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    public function index(Request $request) {

        $userId = Auth::id();

        //最新の目標体重
        $targetWeight = WeightTarget::where('user_id', $userId)
        ->latest('updated_at')
        ->first();

        //最新の体重ログ
        $currentWeight = WeightLog::where('user_id', $userId)
        ->latest('date')
        ->first();

        //目標まで
        $remaining = null;
        if($targetWeight && $currentWeight) {
            $remaining = $currentWeight->weight - $targetWeight->target_weight;
        }

        //検索用データ
        $query = WeightLog::where('user_id', $userId);

        //from/toが入力されていれば絞り込み
        if($request->filled('from')) {
            $query->where('date', '>=', $request->from);
        }
        if($request->filled('to')) {
            $query->where('date', '<=', $request->to);
        }

        //日付順に並べて取得
        $logs = $query->orderBy('date', 'desc')->paginate(8)->withQueryString();

        return view('weight.index', [
        'targetWeight' => $targetWeight ? $targetWeight->target_weight : null,
        'currentWeight' => $currentWeight ? $currentWeight->weight :null,
        'remaining' => $remaining,
        'logs' => $logs,
        'from' => $request->from,
        'to' => $request->to,
        ]);

    }

    public function create()
    {
        return view('weight.create');
    }

    public function store(WeightRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        WeightLog::create($data);
        return redirect()->route('weight.index')->with('message', '体重ログを追加しました');
    }

    public function update($id)
    {
        $log = WeightLog::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view ('weight.update', ['log' => $log]);
    }

    public function updatePost(WeightRequest $request, $id)
    {
        $log = WeightLog::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        $log->update($request->validated());


        return redirect()->route('weight.index')->with('message', '体重ログを変更しました');
    }

    public function target_edit() {

        return view('weight.target_edit');

    }

    public function goalSetting() {

    return view('weight.goal_setting');

    }

    public function goalUpdate(Request $request)
     {
        $request->validate(['weight' => ['required', 'numeric']
        ]);

        $target = WeightTarget::updateOrCreate(
            ['user_id' => Auth::id()],
            ['target_weight' => $request->weight]
        );

        return redirect('/weight_logs')->with('message','目標体重を変更しました');
     }

    public function logout() {

    return view('auth.logout');
    }

    public function destroy($id) {

    $log = WeightLog::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $log->delete();

    return redirect()->route('weight.index')
        ->with('message', 'データを削除しました');
    }
}
