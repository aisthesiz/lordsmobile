<?php

namespace App\Observers;

use App\Models\Account;

class AccountObserver
{
    
    /**
     * Handle the Account before "create" event.
     */
    function creating(Account $account): void
    {
        if (now() > $account->time_start && now() < $account->time_end) {
            $account->activated_at = now()->format('Y-m-d H:i:s');
            $account->is_active = true;
        }
    }

    /**
     * Handle the Account "created" event.
     */
    public function created(Account $account): void
    {

    }

    /**
     * Handle the Account "updated" event.
     */
    public function updated(Account $account): void
    {
        //
    }

    /**
     * Handle the Account "deleted" event.
     */
    public function deleted(Account $account): void
    {
        //
    }

    /**
     * Handle the Account "restored" event.
     */
    public function restored(Account $account): void
    {
        //
    }

    /**
     * Handle the Account "force deleted" event.
     */
    public function forceDeleted(Account $account): void
    {
        //
    }
}
