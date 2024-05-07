<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Edit;

class History extends Component
{
    public $edits;
    public $article;

    public function mount()
    {
        $slug = request()->route('slug');
        $this->article = Article::where('slug', $slug)->first();
        $this->edits = $this->article->edits->sortByDesc('created_at');
    }

    public function render()
    {
        return view('livewire.history');
    }
}
