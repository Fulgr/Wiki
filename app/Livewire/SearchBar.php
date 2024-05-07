<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class SearchBar extends Component
{
    public $articles;
    public $searchQuery;

    public function search()
    {
        $this->articles = Article::where('title', 'like', '%' . $this->searchQuery . '%')->orderBy('views', 'desc')->take(5)->get();
    }

    public function mount()
    {
        $this->articles = Article::orderBy('views', 'desc')->take(5)->get();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
