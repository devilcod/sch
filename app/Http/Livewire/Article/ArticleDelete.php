<?php

namespace App\Http\Livewire\Article;

use LivewireUI\Modal\ModalComponent;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Article\ArticleIndex;


class ArticleDelete extends ModalComponent
{
    public $articleId;

    public function mount(Article $article)
    {
        $this->articleId = $article;
    }

    public function deleteArticle()
    {
        $this->articleId->tags()->detach();
        Storage::delete($this->articleId->thumbnail);
        $this->articleId->delete();
        $this->closeModalWithEvents(['articlesUpdated',
        ArticleIndex::getName() => 'articlesUpdated']);
    }

    public function render()
    {
        return view('livewire.article.article-delete');
    }
}
