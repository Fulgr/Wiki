<div>
    <input type="text" wire:model="searchQuery" placeholder="Search..." class="search-bar">
    <button wire:click="search" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    @foreach($articles as $article)
        <a class="article" href="/wiki/{{$article->slug}}">
            @if($article->image)
                <img src="{{$article->image}}" alt="{{$article->title}}">
            @else
                <img src="/images/placeholder.png" alt="{{$article->title}}">
            @endif
            <h2>{{$article->title}}</h2>
        </a>
    @endforeach
</div>
