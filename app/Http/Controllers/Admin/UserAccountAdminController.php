<?php

namespace App\Http\Controllers\Admin;

use App\Builder\AccountEntityBuilder;
use App\Http\Controllers\Controller;
use App\Repository\AccountRepositoryEloquent;
use Core\Domain\Entity\Account as AccountEntity;
use App\Http\Requests\Admin\Account\{StoreAccountRequest, UpdateAccountRequest};
use App\Models\{User, Account as AccountModel, GFMissionName};
use Carbon\Carbon;
use Core\Domain\Exception\NotFoundException;
use Core\Domain\ValueObject\Uuid;
use Illuminate\Http\Request;
use Throwable;

class UserAccountAdminController extends Controller
{
    
    public function __construct(
        protected AccountModel $repository,
        protected User $userRepository,
    ) {}

    public function index(User $user)
    {
        // $accounts = $this->repository->paginate();
        $accounts = $user->accounts()->paginate();

        return view(
            view: 'admin.users-accounts.pages.index',
            data: compact('accounts', 'user'),
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        // $users = $this->userRepository->all();
        return view(
            view: 'admin.users-accounts.pages.create',
            data: compact('user'),
        );
    }

    public function store(StoreAccountRequest $request, User $user)
    {
        $data = $request->all();
        $data['user_id'] = $user->id;
        $repository = new AccountRepositoryEloquent(new AccountModel());

        try {
            $data['time_start'] = new Carbon($data['time_start']);
            $data['time_end']   = new Carbon($data['time_end']);
            $data['is_active']  = $data['is_active'] == '1' ? true : false;

            $params = json_decode(file_get_contents(storage_path('configs/settings.json')));

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
                ->route('admin.user.accounts.index', $user)
                ->with('success', "Conta {$entity->name} foi criada");
        } catch (Throwable $th) {

            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function show(User $user, AccountModel $account)
    {
        $missionsNamesRaw = GFMissionName::all();
        $missionsNames = [];
        foreach ($missionsNamesRaw as $item) {
            $missionsNames[$item->id] = $item->name;
        }
        if ($user->id != $account->user_id) {
            return redirect()->back()->withErrors(['not_founded' => 'Counta não encontrada']);
        }
        return view(
            view: 'admin.users-accounts.pages.show',
            data: compact('account', 'user', 'missionsNames'),
        );
    }

    /**
     * Display the specified resource.
     */
    public function updateSettings(User $user, AccountModel $account, Request $request)
    {
        try {
            if ($account->user_id != $user->id) {
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, AccountModel $account)
    {
        if ($user->id != $account->user_id) {
            return redirect()->back()->withErrors(['not_founded' => 'Counta não encontrada']);
        }
        // $users = $this->userRepository->select(['id', 'name'])->get();
        return view('admin.users-accounts.pages.edit', compact('account', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, User $user, AccountModel $account)
    {
        if ($user->id != $account->user_id) {
            return redirect()->back()->withErrors(['not_founded' => 'Counta não encontrada']);
        }
        $repository = new AccountRepositoryEloquent(new AccountModel());
        $entity = AccountEntityBuilder::createFromAccountModel($account);
        $dataInput = $request->all();

        try {
            $dataInput['time_start'] = new Carbon($dataInput['time_start']);
            $dataInput['time_end']   = new Carbon($dataInput['time_end']);
    
            $entity->update(
                name:          $dataInput['name'],
                userId:        $user->id,
                lordAccountId: $dataInput['lord_account_id'],
                timeStart:     $dataInput['time_start'],
                timeEnd:       $dataInput['time_end'],
            );

            if (!$entity->canActivate() && $dataInput['is_active']) {
                return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withErrors([
                        'is_active' => 'A Conta não pode ser ativa porque a data final é menor que hoje.',
                        'time_end' =>  'A Conta não pode ser ativa porque a data final é menor que hoje.',
                    ]);
            }

            if ($entity->canActivate() && $dataInput['is_active']) {
                $entity->activate();
            } else {
                $entity->deactivate();
            }

            $repository->update($entity);
    
            return redirect()
                ->route('admin.user.accounts.index', $user)
                ->with(['success' => 'Conta Editada com sucesso']);
        } catch (Throwable $th) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, AccountModel $account)
    {
        if ($user->id != $account->user_id) {
            return redirect()->back()->withErrors(['not_founded' => 'Counta não encontrada']);
        }
        $account->delete();
        return back()->with(['success' => 'Conta Excluida com sucesso!']);
    }
}
