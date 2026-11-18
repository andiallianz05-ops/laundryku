<?php

namespace App\Livewire\Seller;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        $store = $user->store; // Asumsikan relasi user memiliki satu store

        return view('livewire.seller.dashboard', [
            'store' => $store
        ])->layout('layouts.app');
    }
}
