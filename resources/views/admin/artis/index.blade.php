@extends("admin.layouts.master")
@section("title")
    Artis
@endsection
@section("content")
<a href="/admin/artis/baru" class="btn-link btn">Baru</a>
<ul class="list-group">
<?php
    foreach ($artis as $i){
        ?>
        <li id="<?php echo $i->id; ?>" class="list-group-item d-flex justify-content-between align-items-center"><?php echo $i->nama_lengkap; ?>
            <span class="badge badge-pill">
                <a href="/admin/artis/edit/<?php echo $i->id; ?>" style="margin-right: 10px;">Edit</a>
                <a href="/admin/artis/banner/<?php echo $i->id; ?>" style="margin-right: 10px;">Banner</a>
                <a href="/admin/artis/delete/<?php echo $i->id; ?>" onclick="return confirm('anda yakin menghapusnya?')" >Delete</a>
            </span>
        </li>
        <?php
    }
?>
</ul>
@endsection
