<div>
    <div class="sidebar"></div>
    <div class="content"> 
        <h1>{{$article->title}}</h1>
        <div class="links">
            <a href="{{route('wiki', $article->slug)}}">Article</a>
            <a href="{{route('wiki.edit', $article->slug)}}" class="current-page">Source</a>
            <a href="">History</a>
        </div>
        <div class="textarea-content">
            <textarea wire:model="content"></textarea>
        </div>
        <button wire:click="save">Save</button>
    </div class="sidebar"></div>
</div>
