<div>
    @if($showCreateModal)
        <div class="modal">
            <div class="modal-content">
                <span class="close" wire:click="openCreateModal">&times;</span>
                <h2>Create Article</h2>
                <form wire:submit.prevent="create">
                    <label for="title">Title</label>
                    <input type="text" wire:model="title" id="title" required>
                    <label for="title">Slug</label>
                    <input type="text" wire:model="slug" id="title" required>
                    <label for="image">Image</label>
                    <input type="text" wire:model="image" id="image">
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    @endif
    <input type="text" wire:model="searchQuery" placeholder="Search..." class="search-bar" wire:keydown="search">
    <button wire:click="search" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    @if(Auth::check())
        <button wire:click="openCreateModal" class="search-button"><i class="fa-solid fa-plus"></i></button>
    @endif
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
