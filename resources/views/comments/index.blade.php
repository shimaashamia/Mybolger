@extends('layouts.app')
@section("content")
<div class="container">
<a href='{{route("admin.create")}}' class='btn btn-success'>  إضافة المنشور</a>
<a href='{{asset("comments")}}' class='btn btn-success'>  إضافة المنشور</a>
<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>التعليقات</th>
            <th width="22%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->comment }}</td>
            <td>
            <form method='post' action='{{asset("comments/".$item->id)}}'>
                    @csrf
                    @method("delete")
                    <input type='submit' onclick='return confirm("هل بتأكيد تريد الحذف ?")' value='حذف'
                        class='btn btn-danger btn-sm ' />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection