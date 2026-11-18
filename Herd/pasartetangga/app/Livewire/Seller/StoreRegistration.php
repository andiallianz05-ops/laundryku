<?php

namespace App\Livewire\Seller;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StoreRegistration extends Component
{
    public $name, $description, $general_address, $contact_phone;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'general_address' => 'required|string',
        'contact_phone' => 'required|string|max:20',
    ];

    public function registerStore()
    {
        $this->validate();

        // Simpan data toko dan kaitkan dengan user yang sedang login
        Store::create([
            'user_id' => Auth::id(),
            'store_name' => $this->name,
            'description' => $this->description,
            'general_address' => $this->general_address,
            'contact_phone' => $this->contact_phone,
            'status' => 'pending', // Status awal menunggu persetujuan admin
        ]);

        session()->flash('message', 'Pendaftaran toko berhasil! Menunggu verifikasi dari Admin.');

        return redirect()->route('seller.dashboard');
    }

    public function render()
    {
        return view('livewire.seller.store-registration')->layout('layouts.app');
    }
}
