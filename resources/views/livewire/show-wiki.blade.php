<div>
    <div class="sidebar"></div>
    <div class="content"> 
        <h1>{{$article->title}}</h1>
        <div class="links">
            <a href="{{route('wiki', $article->slug)}}" class="current-page">Article</a>
            <a href="{{route('wiki.edit', $article->slug)}}">Source</a>
            <a href="">History</a>
        </div>
        <div class="textarea-content">
            <pre>{{$article->content}}</pre>
        </div>
    </div class="sidebar"></div>
</div>
