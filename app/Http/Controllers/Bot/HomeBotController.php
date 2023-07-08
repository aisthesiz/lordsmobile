<?php

namespace App\Http\Controllers\Bot;

use App\Builder\AccountEntityBuilder;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Repository\AccountRepositoryEloquent;
use Illuminate\Http\Request;
use Throwable;

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
        try {
            $params = json_decode(json_encode($request->all()));
    
            $entity = AccountEntityBuilder::createFromAccountModel($account);
            $entity->updateParams($params);
    
            $resitory = new AccountRepositoryEloquent($account);
            $resitory->update($entity);
    
            return response()->noContent();
        } catch (Throwable $th) {
            return response()->json()->setStatusCode($th->getCode());
        }
    }
}
