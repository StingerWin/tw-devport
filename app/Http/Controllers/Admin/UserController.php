<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreOrUpdateUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        private UserService $service
    )
    {
    }

    public function index()
    {
        $users = $this->service->getList();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreOrUpdateUserRequest $request)
    {
        $this->service->store($request->getDto());

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $modelValues = $user->toArray();

        return view('admin.users.edit', compact('user', 'modelValues'));
    }

    public function update(StoreOrUpdateUserRequest $request, User $user)
    {
        $this->service->update($user, $request->getDto());

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);

        return redirect()->route('admin.users.index');
    }
}
