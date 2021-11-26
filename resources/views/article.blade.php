@extends("layouts.layout")
@section("title")
Article
@endsection
@section("content")
<section>
    <div class="container">
        <form action="">
            <legend class="col-form-label">Article</legend>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Article Name</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Enter article name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Article Name</label>
                <div class="col-md-6">
                    <textarea name="text" class="form-control" rows="5" cols="50" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Article Name</label>
                <div class="col-md-6">
                    <input type="file" name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <button type="submit">Add The Article</button>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection