@extends("layouts.headerfooter")
@section("title")
    Masuk
@endsection
@section("link")
    <link rel="stylesheet" href="css/masuk-style.css">
@endsection
@section("content")
<div class="container form-container">
    <h1>Masuk aja bosku</h1>
    <form method="post" action="l4s0k">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="btn_login" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
