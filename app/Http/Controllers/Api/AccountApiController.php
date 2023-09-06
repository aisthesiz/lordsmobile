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
        return [
            'speedUpSettings'    => $params->speedUpSettings    ?? (object)[],
            'gatherSettings'     => $params->gatherSettings     ?? (object)[],
            'rallySettings'      => $params->rallySettings      ?? (object)[],
            'connectionSettings' => $params->connectionSettings ?? (object)[],
            'cargoShipSettings'  => $params->cargoShipSettings  ?? (object)[],
            'supplySettings'     => $params->supplySettings     ?? (object)[],
            'heroSettings'       => $params->heroSettings       ?? (object)[],
            'heroStageSettings'  => $params->heroStageSettings  ?? (object)[],
            'arenaSettings'      => $params->arenaSettings      ?? (object)[],
            'buildSettings'      => $params->buildSettings      ?? (object)[],
            'eventSettings'      => $params->eventSettings      ?? (object)[],
            'researchSettings'   => $params->researchSettings   ?? (object)[],
            'troopSettings'      => $params->troopSettings      ?? (object)[],
            'miscSettings'       => $params->miscSettings       ?? (object)[],
            'monsterSettings'    => $params->monsterSettings    ?? (object)[],
        ];
    }
}
