<?php

namespace App\Providers;

use App\Models\Account;
use App\Observers\AccountObserver;
use Core\Services\AreaService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Account::observe(AccountObserver::class);

        if(AreaService::isBot()) {
            Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
                $accounts = Account::select(['id', 'name', 'user_id'])->where('user_id', Auth::user()->id ?? -1000)->get();
                $items = [];
                foreach($accounts as $item) {
                    $items[] = [
                        'key' => $item->id,
                        'text' => $item->name.'-'.$item->user_id,
                        'url' => "bot/accounts/{$item->id}/show",
                    ];
                }
                $event->menu->add([
                    'key' => 'accounts',
                    'text' => 'Contas',
                    'url' => 'bot',
                    'submenu' => $items,
                ]);
            });
        }
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
