<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class CreateCategory extends ModalComponent
{
public $name;

    protected $rules = ['name' => 'required'];

    public function render()
    {
        return view('livewire.category.create-category');
    }

    public function addCategory()
    {
        $data = $this->validate();
        Category::create($data);
        $this->reset();
        $this->closeModal();
        // return redirect()->route('articles.create');
    }
}
