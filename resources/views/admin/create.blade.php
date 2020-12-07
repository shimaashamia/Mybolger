@extends('layouts.app')

@section('content')
<div class="container">
    <form action='{{route("admin.index")}}' method="POST">
    @csrf
        <div class="form-group">
            <label for="usr">العنوان:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">المنشور:</label>
            <textarea rows="4" cols="50" name="body" class="form-control">
            </textarea>
        </div>
    </br>
    <!-- <input type="submit" value="add new" class="btn btn-primary"/> -->
    <button class="btn btn-primary" type="submit">إضافة</button>
    <a class='btn btn-light' href='{{route("admin.index")}}'>إغلاق</a>
    </form>
</div>
@endsection
