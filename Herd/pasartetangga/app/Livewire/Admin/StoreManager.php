<?php

namespace App\Livewire\Admin;

use App\Models\Store;
use Livewire\Component;

class StoreManager extends Component
{
    public $stores;

    public function render()
    {
        // Mengambil semua data toko beserta data pemiliknya (user)
        $this->stores = Store::with('user')->get();
        return view('livewire.admin.store-manager')->layout('layouts.app');
    }

    // Fungsi untuk menyetujui toko
    public function approve($id)
    {
        $store = Store::findOrFail($id);
        $store->update(['status' => 'approved']); // Pastikan kolom status ada di migrasi stores
        session()->flash('message', 'Toko ' . $store->name . ' berhasil disetujui.');
    }

    // Fungsi untuk menolak/menonaktifkan toko
    public function reject($id)
    {
        $store = Store::findOrFail($id);
        $store->update(['status' => 'rejected']);
        session()->flash('message', 'Toko ' . $store->name . ' ditolak.');
    }
}
