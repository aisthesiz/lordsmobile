<?php

namespace App\Http\Controllers\Bot;

use App\Builder\AccountEntityBuilder;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\GFMissionName;
use App\Repository\AccountRepositoryEloquent;
use Core\Domain\Exception\NotFoundException;
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
        $missionsNamesRaw = GFMissionName::all();
        $missionsNames = [];
        foreach ($missionsNamesRaw as $item) {
            $missionsNames[$item->id] = $item->name;
        }

        if (!$account->is_active()) {
            return redirect()->route('bot.index')->withErrors(['error' => 'Esta conta esta inativa']);
        }
        if ($account->user_id != auth()->user()->id) {
            return redirect()->route('bot.index')->withErrors(['error' => 'Conta não encontrada']);
        }
        
        return view(
            view: 'bot.home.pages.show',
            data: compact('account', 'missionsNames'),
        );
    }


    /**
     * Display the specified resource.
     */
    public function updateSettings(Account $account, Request $request)
    {
        try {
            if (auth()->user()->id != $account->user_id) {
                throw new NotFoundException('Conta não encontrada (403)', 404);
            }
            $params = json_decode($request->getContent());
    
            $entity = AccountEntityBuilder::createFromAccountModel($account);
            $entity->updateParams($params);
    
            $resitory = new AccountRepositoryEloquent($account);
            $resitory->update($entity);
    
            return response()->json(['message' => 'Atualizado com sucesso'])->setStatusCode(200);
        } catch (Throwable $th) {
            $code = $th->getCode();
            if (empty($code)) {
                $code = 500;
            }
            return response()->json(['message' => $th->getMessage()])->setStatusCode($code)->withException($th);
        }
    }
}
