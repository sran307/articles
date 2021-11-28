@extends("layouts.layout")
@section("title")
article page
@endsection
@section("content")
<section>
    <div class="container">
        <div class="card text-center my-5 mx-auto" style="width: 35rem;">
            <div class="card-header">
                <h3>Articles</h3>
            </div>
            @foreach($articles as $article)
            <div class="card-body">
                <h5 class="card-title">{{$article->Name}}</h5>
                <img width="400rem" height="300px" src="/images/{{$article->Image}}" alt="article-image">
                <p class="card-text">{{$article->Description}}</p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-around">
                <button class="btn btn-primary" value="{{$article->id}}" id="edit-button">Edit</button>
                <button class="btn btn-danger" value="{{$article->id}}">delete</button>
                <button class="btn btn-primary">add tag</button>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection