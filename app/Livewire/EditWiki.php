<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Edit;

class EditWiki extends Component
{
    public $article;
    public $content;

    public function save()
    {
        $article = $this->article;
        $article->content = $this->content;
        $article->save();
        $edit = new Edit();
        $edit->user_id = auth()->id();
        $edit->article_id = $article->id;
        $edit->diff = strlen($this->content) - strlen($this->article->content);
        $edit->save();
        $this->article = $article;
    }

    public function mount()
    {
        $slug = request()->route('slug');
        $this->article = Article::where('slug', $slug)->first();
        $this->content = $this->article->content;
    }

    public function render()
    {
        return view('livewire.edit-wiki');
    }
}
