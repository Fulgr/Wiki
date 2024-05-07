<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Edit;

class EditWiki extends Component
{
    public $article;
    public $content;
    public $comment;

    public function save()
    {
        $article = $this->article;
        $length = $article->content;
        if ($this->content == "") {
            $this->content = "This article is empty you can help expanding it <a href='/wiki/".$article->slug."/edit'>here</a>.";
        }
        $article->content = $this->content;
        $article->save();
        $edit = new Edit();
        $edit->content = $this->comment;
        $edit->user_id = auth()->id();
        $edit->article_id = $article->id;
        $edit->diff = strlen($this->content) - strlen($length);
        $edit->save();
        $this->article = $article;
        return redirect()->to('/wiki/'.$article->slug);
    }

    public function mount()
    {
        $slug = request()->route('slug');
        $this->article = Article::where('slug', $slug)->first();
        if (empty($this->article)) {
            return redirect()->to('/');
        }
        $this->content = $this->article->content;
    }

    public function render()
    {
        return view('livewire.edit-wiki');
    }
}
