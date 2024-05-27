<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ShowWiki extends Component
{
    public $article;

    public function inclusions()
    {
        $content = $this->article->content;
        $pattern = '/%(.*?)%/';
        preg_match_all($pattern, $content, $matches);
        $inclusions = $matches[1];
        foreach ($inclusions as $inclusion) {
            $inclusion = trim($inclusion, "'");
            $inclusion = trim($inclusion, '"');
            $inclusion = trim($inclusion);
            ray($inclusion);
            $inclusionContent = Article::where('slug', $inclusion)->first()->content;
            $content = str_replace('%'.$inclusion.'%', $inclusionContent, $content);
        }
        $this->article->content = $content;
    }

    public function mount()
    {
        $slug = request()->route('slug');
        $this->article = Article::where('slug', $slug)->first();
        if (empty($this->article)) {
            return redirect()->to('/');
        }
        $this->article->views += 1;
        $this->article->save();
        $this->inclusions();
    }

    public function render()
    {
        return view('livewire.show-wiki');
    }
}
