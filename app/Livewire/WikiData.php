<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class WikiData extends Component
{
    public $data;

    public function mount()
    {
        $slug = request()->route('slug');
        $article = Article::where('slug', $slug)->first();
        if (empty($article)) {
            return redirect()->to('/');
        }
        $this->data = $article->data;
    }

    public function render()
    {
        return view('livewire.wiki-data');
    }
}
