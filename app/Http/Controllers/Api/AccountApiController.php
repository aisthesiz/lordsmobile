<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountApiController extends Controller
{
    public function index(Request $request)
    {
        $accountsIdsRaw = request()->accounts;
        $accountsIds    = explode(',', $accountsIdsRaw);
        $accounts       = Account::whereIn('lord_account_id', $accountsIds)->get();

        $result = [];
        foreach ($accounts as $account) {
            $result[$account->lord_account_id] = $this->prepareParamsToResponse($account->params);
        }
        return response()->json($result, 200);
    }


    public function getById(Account $account)
    {
        return response()->json($account->params, 200);
    }

    protected function prepareParamsToResponse($params)
    {
        $params = (object) $params;
        return (object)[
            'speedUpSettings'    => $params->speedUpSettings    ?? (object)[],
            'connectionSettings' => $params->connectionSettings ?? (object)[],
            'gatherSettings'     => $params->gatherSettings     ?? (object)[],
            'rallySettings'      => $params->rallySettings      ?? (object)[],
            'cargoShipSettings'  => $params->cargoShipSettings  ?? (object)[],
            'supplySettings'     => $params->supplySettings     ?? (object)[],
        ];
    }
}
