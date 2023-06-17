<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class HomeBotController extends Controller
{
    public function index()
    {
        $accounts = Account::where('is_active', '1')->where('user_id', auth()->user()->id)->paginate();
        return view(
            view: 'bot.home.pages.index',
            data: compact('accounts'),
        );
    }

    public function show(Account $account)
    {
        if (!$account->is_active()) {
            return redirect()->route('bot.index')->withErrors(['error' => 'Esta conta esta inativa']);
        }
        if ($account->user_id != auth()->user()->id) {
            return redirect()->route('bot.index')->withErrors(['error' => 'Conta não encontrada']);
        }
        
        return view(
            view: 'bot.home.pages.show',
            data: compact('account'),
        );
    }


    /**
     * Display the specified resource.
     */
    public function updateSettings(Account $account, Request $request)
    {
        $data = $request->all();
        $account->params = $data['params'];
        $account->params_updated_at = now();
        $account->save();
        return redirect()->back()->with('success', 'Configuracoes salvas com sucesso');
    }
}
