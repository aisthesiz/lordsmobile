<?php

namespace App\Http\Controllers;

use App\Builder\AccountEntityBuilder;
use App\Http\Requests\Admin\TransferAccount\TransferAccountRequest;
use App\Models\Account;
use App\Models\User;
use App\Repository\AccountRepositoryEloquent;
use Core\Domain\Exception\NotFoundException;
use Illuminate\Http\Request;

class AccountTransferAdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.account-transfer.index', compact('users'));
    }

    public function searchAccount(Request $request)
    {
        $igg = $request->get('account');
        if (!$accountDb = Account::where('lord_account_id', $igg)->first()) {
            return response()->json(['message' => 'Conta não encontrada'])->setStatusCode(404);
            // return response()->withException(new NotFoundException('Conta não encontrada', 404))->setStatusCode(404);
            // throw new NotFoundException('Conta né nula', 404);
        }
        $account = AccountEntityBuilder::createFromAccountModel($accountDb);
        return response()->json([
            'account'      => $account->id(),
            'igg'          => $account->lordAccountId,
            'user_id'      => $account->userId,
            'user_name'    => $accountDb->user->name,
            'user_email'   => $accountDb->user->email,
        ]);
    }

    public function transferAccount(TransferAccountRequest $request)
    {
        $accountDb = Account::find($request->get('id'));
        $user = User::find($request->get('user_id'));

        $account = AccountEntityBuilder::createFromAccountModel($accountDb);

        $account->changeOwnner($user->id);

        $accountRepository = new AccountRepositoryEloquent(new Account);
        $accountRepository->update($account);

        return response()->json(['message' => 'Conta alterada com sucesso.'])->setStatusCode(200);
    }
}
