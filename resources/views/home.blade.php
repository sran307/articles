@extends("layouts.layout")
@section("title")
Home
@endsection
@section("content")
<div class="container">
    <div class="d-flex justify-content-around text-center my-5 wrap-nowrap">
        @foreach($articles as $article)
        <div class="articles">
            <img src="/images/{{$article->Image}}" class="d-block" alt="article_image" width="150px" height="200px">
            <a href="/show_article/{{$article->id}}">{{$article->Name}}</a>
        </div>
        @endforeach
    </div>
</div>

@endsection