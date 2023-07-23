<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $users = User::paginate();
        return view('livewire.admin.user-index')
            ->with('users', $users);
    }
    public function editUser($userId)
    {
        return redirect()->route('admin.users.edit', $userId);
    }
}
