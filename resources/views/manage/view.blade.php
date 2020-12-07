@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <table class="table table-striped">
        <tr>
            <td>Title</td>
        </tr>
        @foreach ($articles as $art)
        <tr>
            <td> <a href="{{"/read/".$art->id}}">{{$art->title}}></a></td>
        </tr>
        @endforeach
    </table>
    <a href="add" type="button" class="btn btn-success mb-3">Add new article</a>
</div> -->


<div class="container">
<div class="row">
    <div class="col">
    <h3 class="text-right">المواضيع الغير موجودة</h3>
    </div>
    <div class="col">
    <a href="add" type="button" class="btn btn-success mb-3 mt-5"> إضافة المنشور</a>
    </div>
  </div>
    <table class="table table-light text-right">
        <tbody>
            @foreach ($articles as $art)
            <tr>
                <td>
                    <!-- <div class="col-8"> -->
                    <div class="media">
                        <img src="assets/img/team1.png" class="align-self-center mr-3 img-circle" alt="..." width="70">
                        <div class="media-body">
                            <h5 class="mt-0"> <a href="{{"/read/".$art->id}}">{{$art->title}}</a></h5>
                            <p class="mb-0">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ Auth::user()->name }}
                                <i class="fa fa-clock-o ml-3" aria-hidden="true"></i>
                                {{$art->created_at->format('H:i:s')}}
                            </p>

                        </div>
                    </div>
                    <!-- </div> -->
                </td>
                <td>
                    <!-- <div class="col-4"> -->
                    <div class="media">
                        <img src="assets/img/comment_2.png" class="align-self-center mr-3 img-circle" alt="..."
                            width="70">
                        <div class="media-body">
                            <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                            <p class="mb-0"> {{$art->created_at->format('H:i:s')}}.</p>
                        </div>
                    </div>
                    <!-- </div> -->
                </td>
            </tr>
            @endforeach
            <!-- <tr>
                <td>Jacob</td>
                <td>Thornton</td>
            </tr>
            <tr>
                <td>Larry</td>
                <td>the Bird</td>
            </tr> -->
        </tbody>
    </table>
</div>

@endsection