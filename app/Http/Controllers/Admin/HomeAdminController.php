<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $totalAccounts = Account::count();
        $totalAccountsActivate = Account::where('is_active', true)->count();
        $totalAccountsWillInactiveIn15DaysOrLess = Account::
              where('is_active', true)
            ->where('time_end', '<', now()->addDays(15)->format('Y-m-d H:i:s'))
            ->count();
        $totalUsers = User::count();
        
        return view(
            view: 'admin.home.pages.index',
            data: compact(
                'totalAccounts',
                'totalAccountsActivate',
                'totalUsers',
                'totalAccountsWillInactiveIn15DaysOrLess'
            ),
        );
    }
}
