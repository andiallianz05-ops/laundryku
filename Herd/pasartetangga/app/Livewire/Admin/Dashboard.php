<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalCategories' => Category::count(),
            'totalStores' => Store::count(),
            'pendingStores' => Store::where('status', 'pending')->count(),
            'totalUsers' => User::count(),
        ])->layout('layouts.app');
    }
}
