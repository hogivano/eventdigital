@extends("admin.layouts.master")
@section("title")
    End Point
@endsection
@section("content")
<div class="">
    <table>
        <thead>
            <th>Method</th>
            <th>Url</th>
            <th>Value</th>
            <th>Response</th>
            <th>Keterangan</th>
        </thead>
        <tbody>
            <tr>
                <td>POST</td>
                <td>api/login</td>
                <td>{
                    "email", "password"
                }</td>
                <td>
                    {
                        "error" => boolean,
                        "message" => string
                    }
                </td>
                <td>
                    Login Akun Event Digital
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
