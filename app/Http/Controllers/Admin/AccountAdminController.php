<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use App\Http\Requests\Admin\Account\UpdateAccountRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountAdminController extends Controller
{
    public function __construct(
        protected Account $repository,
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $dataAccount = $request->all();
        $dataAccount['id'] = Str::uuid();
        $account = Account::create($dataAccount);
        $filePath = storage_path('configs/settings.json');
        $settingsContent = file_get_contents($filePath);
        $account->params = $settingsContent;
        $account->params_updated_at = now();
        $account->save();
        if ($account->time_start > now()) {
            $account->activate();
        }
        return redirect()->route('admin.accounts.index')->with(['success' => 'Account created with success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        $settings = !empty($account->params) ? json_decode($account->params) : null;
        return view(
            view: 'admin.accounts.pages.show',
            data: compact('account', 'settings'),
        );
    }

    /**
     * Display the specified resource.
     */
    public function updateSettings(Account $account, Request $request)
    {
        $data = $request->all();
        $account->params = $data['params'];
        $account->params_updated_at = now();
        $account->save();
        return redirect()->back()->with(['success' => 'Configuracoes salvas com sucesso']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $users = $this->userRepository->select(['id', 'name'])->get();
        return view('admin.accounts.pages.edit', compact('account', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
        return redirect()->route('admin.accounts.index')->with(['success' => 'Conta Editada com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
