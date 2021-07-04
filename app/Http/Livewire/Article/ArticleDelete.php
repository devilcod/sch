<?php

namespace App\Http\Livewire\Article;

use LivewireUI\Modal\ModalComponent;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Article\ArticleIndex;


class ArticleDelete extends ModalComponent
{
    public $articleId;

    public function mount($article)
    {
        $this->articleId = Article::findOrFail($article);
    }


    public function render()
    {
        return view('livewire.article.article-delete');
    }

    public function deleteArticle()
    {
        $this->articleId->tags()->detach();
        Storage::delete($this->articleId->thumbnail);
        $this->articleId->delete();
        $this->closeModalWithEvents(['articlesUpdated',
        ArticleIndex::getName() => 'articlesUpdated']);
    }

}
