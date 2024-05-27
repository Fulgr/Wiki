<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'content'];

    public function edits()
    {
        return $this->hasMany(Edit::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (! $article->content) {
                $article->content = 'This article is empty you can help expanding it <a href=\'/wiki/'.$article->slug.'/edit\'>here</a>.';
            }
        });
    }
}
