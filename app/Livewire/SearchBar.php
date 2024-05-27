<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class SearchBar extends Component
{
    public $articles;

    public $allArticles;

    public $searchQuery;

    public function search()
    {
        $this->articles = $this->allArticles->filter(function ($article) {
            return str_contains(strtolower($article->title), strtolower($this->searchQuery));
        })->take(10);
    }

    public function mount()
    {
        $this->allArticles = Article::orderBy('views', 'desc')->get();
        $this->articles = $this->allArticles->take(10);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
