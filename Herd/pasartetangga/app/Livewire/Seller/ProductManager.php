<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductManager extends Component
{
    use WithFileUploads;

    public $name, $category_id, $price, $stock, $description, $image;
    public $productId;
    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:1024', // Maksimal 1MB
    ];

    public function render()
    {
        $store = Auth::user()->store;
        $products = $store ? Product::where('store_id', $store->id)->get() : [];
        $categories = Category::all();

        return view('livewire.seller.product-manager', [
            'products' => $products,
            'categories' => $categories,
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate();

        $store = Auth::user()->store;

        if (!$store || $store->status !== 'approved') {
            session()->flash('error', 'Toko Anda harus disetujui terlebih dahulu sebelum menambah produk.');
            return;
        }

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        Product::create([
            'store_id' => $store->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Produk berhasil ditambahkan!');
        $this->reset(['name', 'category_id', 'price', 'stock', 'description', 'image']);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        // Pastikan produk milik toko seller yang sedang login
        if ($product->store_id === Auth::user()->store->id) {
            $product->delete();
            session()->flash('message', 'Produk berhasil dihapus.');
        }
    }
}
