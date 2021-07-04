<?php

namespace App\Http\Livewire\Category;

use LivewireUI\Modal\ModalComponent;
use App\Models\Category;

class IndexCategory extends ModalComponent
{
    public $search;
    public $categories;
    public $listeners = [
        'categoriesUpdated' => 'render'];

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        $this->categories = Category::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.category.index-category', ['categories' => $this->categories]);
    }
}
