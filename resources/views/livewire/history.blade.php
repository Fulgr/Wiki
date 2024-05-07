<div>
    <div class="sidebar"></div>
    <div class="content"> 
        <h1>{{$article->title}}</h1>
        <div class="links">
            <a href="{{route('wiki', $article->slug)}}">Article</a>
            <a href="{{route('wiki.edit', $article->slug)}}">Source</a>
            <a href="{{route('wiki.history', $article->slug)}}" class="current-page">History</a>
        </div>
        @foreach($edits as $edit)
            <div class="edit">
                <div class="edit-header">
                    <div class="edit-info">
                        <span class="edit-author">{{$edit->user->name}}</span>
                        <span class="edit-date">&emsp;{{$edit->created_at->diffForHumans()}}&emsp;</span>
                        @if($edit->diff >= 0)
                            <span class="edit-diff-positive">+{{$edit->diff}}</span>
                        @else
                            <span class="edit-diff-negative">{{$edit->diff}}</span>
                        @endif
                        <span>&emsp;{{$edit->content}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div class="sidebar"></div>
</div>
