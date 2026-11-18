<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryManager extends Component
{
    public $categories;
    public $name;
    public $categoryId;
    public $isModalOpen = false;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.category-manager')->layout('layouts.app');
    }

    public function create()
    {
        $this->resetFields();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Kategori berhasil ditambahkan.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->isModalOpen = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:categories,name,' . $this->categoryId,
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->categoryId = null;
    }
}
