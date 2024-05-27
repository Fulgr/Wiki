<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class SearchBar extends Component
{
    public $articles;

    public $allArticles;

    public $searchQuery;

    public $showCreateModal = false;

    public $title;

    public $slug;

    public $image;

    public function create()
    {
        if (auth()->check()) {
            $article = Article::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'image' => $this->image,
            ]);
        }
        $this->showCreateModal = false;
    }

    public function search()
    {
        $this->articles = $this->allArticles->filter(function ($article) {
            return str_contains(strtolower($article->title), strtolower($this->searchQuery));
        })->take(10);
    }

    public function openCreateModal()
    {
        if ($this->showCreateModal) {
            $this->showCreateModal = false;

            return;
        }
        $this->showCreateModal = true;
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
