@extends("layouts.headerfooter")
@section("title")
    Daftar
@endsection
@section("link")
    <link rel="stylesheet" href="css/daftar-style.css">
@section ("content")
<div class="daftarContent">
    <form method="post" action="/daftar">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputNama">Nama</label>
            <input type="text" name="name" class="form-control" id="exampleInputNama" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required>
        </div>
        <button name="btn_signUp" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
