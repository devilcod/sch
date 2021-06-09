<?php

namespace App\Http\Livewire\Category;

use LivewireUI\Modal\ModalComponent;
use App\Models\Category;

class IndexCategory extends ModalComponent
{
    public $listeners = [
        'categoriesUpdated' => 'render'];

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.index-category', compact('categories'));
    }
}
