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
                <p class="card-text my-3">{{$article->Description}}</p>
                @if(count($tag)==0)
                    <p class="card-text my-3">Tag: No tag added</p>
                @else
                @foreach($tag as $value)
                    <p class="card-text my-3">Tag: {{$value->Tag}}</p>
                @endforeach
                @endif
            </div>
            <div class="card-footer text-muted d-flex justify-content-around">
                <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal" >Edit</button>
                <form action="{{route('articleModel.destroy', $article->id)}}" method="post" >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" value="{{$article->id}}">delete</button>
                </form>
                <select name="select-tag" id="select-tag" class="bg-primary">
                    <option value="">Tag</option>
                    <option value="0{{$article->id}}">Add Tag</option>
                    <option value="1{{$article->id}}">Edit Tag</option>
                    <option value="2{{$article->id}}">Delete Tag</option>
                </select>
            </div>
            @endforeach
        </div>
    </div>
    <!-- modal for edit -->
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @foreach($articles as $article)
                    <form action="{{route('articleModel.update', $article->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Article Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{$article->Name}}" placeholder="Enter article name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Article Description</label>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control" rows="5" cols="50" required> {{$article->Description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Article Image</label>
                            <div class="col-md-3">
                                <input type="file" name="image" required>
                            </div>
                            <div class="col-md-3">
                                <img id="article-image" src="/images/{{$article->Image}}" width="50px" height="50px">
                            </div>
                        </div>
                        <button type="sumbmit" value={{$article->id}} class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">close</button>
                    </form>
                @endforeach    
                </div>
            </div>
        </div>
    </div>
    <!-- Add Tag model -->
    <div class="modal fade" id="add-tag">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD TAG</h5>
                    <button type="button" class="close" data-dismiss="modal" area-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tagModel.store')}}" method="post">
                        @csrf
                    <input type="text" name="tag_id" id="tag-id" hidden>
                    <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Tag</label>
                            <div class="col-md-6">
                                <input type="text" name="add_tag" id="add_tag" class="form-control" placeholder="Enter Tag" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Tag</button>
                        <button type="close" data-dismiss="modal" class="btn btn-dark">close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit tag modal -->
    <div class="modal fade" id="edit-tag">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT TAG</h5>
                    <button type="button" class="close" data-dismiss="modal" area-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($tag)==0)
                    <p>Tag:No tag added</p>
                    @else
                    @foreach($tag as $value)
                    <form action="{{route('tagModel.update', $value->id)}}" method="post">
                        @csrf
                        @method("PUT")
                    <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">TAG</label>
                            <div class="col-md-6">
                                <input type="text" name="edit_tag" value="{{$value->Tag}}" class="form-control" placeholder="Enter Tag" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Tag</button>
                        <button type="close" data-dismiss="modal" class="btn btn-dark">close</button>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal -->
    <div class="modal fade" id="delete-tag">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">DELETE TAG</h5>
                    <button type="button" class="close" data-dismiss="modal" area-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($tag)==0)
                    <p>SORRY! NO TAG ADDED FOR DELETE</p>
                    @else
                    @foreach($tag as $value)
                    <form action="{{route('tagModel.destroy', $value->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <p>ARE YOU SURE TO DELETE THE TAG?</p>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection