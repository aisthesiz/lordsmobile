<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\AccountRepositoryEloquent;
use Core\Domain\Entity\Account as AccountEntity;
use App\Http\Requests\Admin\Account\{StoreAccountRequest, UpdateAccountRequest};
use App\Models\{User, Account as AccountModel};
use Carbon\Carbon;
use Core\Domain\ValueObject\Uuid;
use Illuminate\Http\Request;
use Throwable;

class AccountAdminController extends Controller
{
    public function __construct(
        protected AccountModel $repository,
        protected User $userRepository,
    ) {}

    public function index()
    {
        $accounts = $this->repository->paginate();
        return view(
            view: 'admin.accounts.pages.index',
            data: compact('accounts'),
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->userRepository->all();
        return view(
            view: 'admin.accounts.pages.create',
            data: compact('users'),
        );
    }

    public function store(StoreAccountRequest $request)
    {
        $data = $request->all();
        $repository = new AccountRepositoryEloquent(new AccountModel());

        try {
            $data['time_start'] = new Carbon($data['time_start']);
            $data['time_end']   = new Carbon($data['time_end']);
            $data['is_active']  = $data['is_active'] == '1' ? true : false;

            $params = json_decode(file_get_contents(storage_path('configs/settings.json')));
    ;
            $entity = new AccountEntity(
                userId:        $data['user_id'],
                lordAccountId: $data['lord_account_id'],
                params:        $params,
                timeStart:     $data['time_start'],
                name:          $data['name'],
                id:            Uuid::random(),
                timeEnd:       $data['time_end'],
            );
            
            if ($data['is_active']) {
                $entity->activate();
            } else {
                $entity->deactivate();
            }

            $repository->insert($entity);

            return redirect()
                ->route('admin.accounts.index')
                ->with('success', "Conta {$entity->name} foi criada");
        } catch (Throwable $th) {
            $response = redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function show(AccountModel $account)
    {
        // $settings = !empty($account->params) ? json_decode($account->params) : null;
        // $settings = json_encode($account->params);
        return view(
            view: 'admin.accounts.pages.show',
            data: compact('account'),
        );
    }

    /**
     * Display the specified resource.
     */
    public function updateSettings(AccountModel $account, Request $request)
    {
        $data = $request->all();
        $account->params = json_decode($data['params']);
        $account->params_updated_at = now();
        $account->save();
        return redirect()->back()->with('success', 'Configuracoes salvas com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountModel $account)
    {
        $users = $this->userRepository->select(['id', 'name'])->get();
        return view('admin.accounts.pages.edit', compact('account', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, AccountModel $account)
    {
        $account->update($request->all());
        return redirect()->route('admin.accounts.index')->with(['success' => 'Conta Editada com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountModel $account)
    {
        //
    }
}
