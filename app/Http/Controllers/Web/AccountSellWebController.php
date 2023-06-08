<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AccountSell;
use Illuminate\Http\Request;

class AccountSellWebController extends Controller
{
    public function index()
    {
        $accountsSales = AccountSell::where('is_active', '1')->get();
        return view(
            view: 'web.accounts-sales.pages.index',
            data: compact('accountsSales'),
        );
    }
}
