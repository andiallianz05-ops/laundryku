<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserManager extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin.user-manager')->layout('layouts.app');
    }

    // Fungsi opsional untuk mengubah role pengguna langsung dari panel admin
    public function toggleRole($id)
    {
        $user = User::findOrFail($id);

        // Contoh sederhana: berganti role antara admin dan seller/user
        $newRole = $user->role === 'admin' ? 'seller' : 'admin';
        $user->update(['role' => $newRole]);

        session()->flash('message', 'Role pengguna ' . $user->name . ' berhasil diubah menjadi ' . $newRole . '.');
    }
}
