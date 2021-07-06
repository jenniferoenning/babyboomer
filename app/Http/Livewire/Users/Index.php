<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Traits\WithSearchAndPagination;
use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    use WithSearchAndPagination;
    public $confirmDialog = false;
    public $deletedUser;

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.users.index', [ 'users' => $users ])->layout('layouts.app');
    }

    public function modalDeleteUser($id)
    {
        $this->confirmDialog = true;
        $this->deletedUser = User::find($id);
    } 

	  public function deleteUser()
    {
        $this->deletedUser->delete();

        $this->confirmDialog = false;
    }
}
