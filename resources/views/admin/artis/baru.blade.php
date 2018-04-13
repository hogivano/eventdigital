@extends("admin.layouts.master")
@section("title")
    Artis Baru
@endsection
@section("content")
<h1>Artis</h1>
<form action="/admin/artis" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>nama lengkap</label>
        <input name="nama_lengkap" type="text" class="form-control" placeholder="nama lengkap">
    </div>
    <div class="form-group">
        <label>nama panggung</label>
        <input type="text" name="nama_panggung" class="form-control" placeholder="nama panggung" value="">
    </div>
    <div class="form-group">
        <label>tempat lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" placeholder="tempat lahir" value="">
    </div>
    <div class="form-group">
        <label>tanggal lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" placeholder="tanggal lahir" value="">
    </div>
    <div class="form-group">
        <label>pekerjaan</label>
        <input name="pekerjaan" type="text" class="form-control" placeholder="pekerjaan">
    </div>
    <div class="form-group">
        <label>deskripsi</label>
        <textarea name="deskripsi" type="text" class="form-control" placeholder="deskripsi"></textarea>
    </div>
    <div class="form-group">
        <label>prestasi</label>
        <textarea name="prestasi" type="text" style="height:200px" class="form-control" placeholder="prestasi"></textarea>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input name="images_artis" type="file" class="form-control-file">
    </div>
    <div class="form-group">
        <h4>Banner</h4>
        <input id="jmlFile" type="number" name="" value="">
        <button id="setBtn" type="button" name="button" onclick="show()">Set</button>
    </div>
    <div id="dynamicBanner">
    </div>
    <input type="text" id="jmlBanner" name="jmlBanner" hidden="true" value="">
    <button name="btn_artis" type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
@section("script")
<script type="text/javascript">
    function show(){
        var value = Number($("#jmlFile").val());
        var string = "";
        $("#dynamicBanner").empty();
        console.log(value);
        for (var i = 1; i <= value; i++) {
            console.log(i);
            string = string +
            "<div class='form-group'>" +
                "<label>Banner " + i + "</label>" +
                "<input type='file' name='banner_"+ i +"' >" +
            "</div>";
        }
        if (value == 0){
            $("#jmlBanner").val("");
        } else {
            $("#jmlBanner").val(value);
        }
        if (value > 0){
            $("#dynamicBanner").append(string);
            // $("#formGaleri").html(string);
        }
    }
</script>
@endsection
