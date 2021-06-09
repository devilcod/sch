<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Category\IndexCategory;
use App\Http\Livewire\Article\ArticleIndex;

class DeleteCategory extends ModalComponent
{
    public $categoryId;

    public function mount(Category $category)
    {
        $this->categoryId = $category;
    }

    public function deleteCategory()
    {
        $this->categoryId->delete();
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexCategory::getName() => 'categoriesUpdated',
        ArticleIndex::getName() => 'categoriesUpdated']);
    }

    public function render()
    {
        return view('livewire.category.delete-category');
    }
}
