<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use LivewireUI\Modal\ModalComponent;


class CreateTag extends ModalComponent
{
    public $name;

    protected $rules = ['name' => 'required'];

    public function render()
    {
        return view('livewire.tag.create-tag');
    }

    public function addTag()
    {
        $data = $this->validate();
        Tag::create($data);
        $this->reset();
        $this->closeModal();
        // return redirect()->route('articles.create');
    }

}
