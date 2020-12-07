@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="form-group bg-white">
        <div class="bd-example py-4">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <address>
                            <h1>{{$articles->title}}</h1><br>
                            <p>
                                <i class="fa fa-user"></i>
                                عبدالله العرموطي
                                <i class="fa fa-bars pr-3"></i>
                                طلبات الخدمات غير الموجودة
                                <i class="fa fa-clock-o pr-3"></i>
                                {{$articles->created_at->format('H:i:s')}}
                            </p>
                        </address>
                    </div>
                    <div class="col-4">
                        <a href="#addart" type="button" class="btn btn-success mb-3"> أضف تعليق</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="form-group bg-white article py-5 px-2 text-right">
        <!-- <label for="usr">body:</label> -->
        {{$articles->body}}
        {{$articles->body}}
    </div>
    <div class="form-group">
        <table class="table table-light text-right">
            <tr>
                <td>التعليقات</td>
            </tr>


            <!-- <!DOCTYPE html>

            <head>
                <title>Pusher Test</title>
                <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
                <script>
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

                var pusher = new Pusher('dc22364468bb6ca48c74', {
                    cluster: 'ap2',
                    forceTLS: true
                });

                var channel = pusher.subscribe('text-channel');
                channel.bind('text-event', function(data) {
                    alert(JSON.stringify(data));
                    //console.log(data);
                });
                </script>
            </head> -->

            <!-- <body>
                <h1>Pusher Test</h1>
                <p>
                    Try publishing an event to channel <code>my-channel</code>
                    with event name <code>my-event</code>.
                </p>
            </body> -->



            @foreach ($articles->comments as $c)
            <tr>
                <td>
                    <div class="media my-3">
                        <img src="/assets/img/team1.png" class="align-self-center mr-3 img-circle" alt="..." width="70">
                        <div class="media-body px-2">
                            <h5 class="mt-0"> {{ Auth::user()->name }}</h5>
                            <p class="mb-0">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{$c->created_at->format('H:i:s')}}
                            </p>
                            <!-- <p class="ml-3">
                                {{$c->comment}}</p> -->
                            <!-- <p class="mt-5">{{$c->comment}}</p> -->
                        </div>
                    </div>
                    <div class="discussion-message">
                        <article class="content replace_urls">
                            <article class="comment reply_content replace_urls px-2">
                                {{$c->comment}}
                                <a onclick="return confirm('Are you sure dude?')" href='/manage/read/{{$c->id}}/delete' class='btn btn-sm btn-danger'>حذف</a>
                                <form method='post' action='{{asset("manage/read/".$c->id)}}/delete'>
                                    @csrf
                                    @method("delete")
                                    <input type='submit' onclick='return confirm("هل بتأكيد تريد الحذف ?")' value='حذف'
                                        class='btn btn-danger btn-sm ' />
                                </form>
                            </article>
                        </article>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>

        <section id="addart">
            <form action="/read/{{$articles->id}}" method="POST">
                {{csrf_field()}}
                <table class="table table-light text-right">
                    <div class="form-group">
                        <tr>
                            <td> <label for="usr">أضف تعليق</label> </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea rows="4" cols="50" name="body" class="form-control"></textarea>
                            </td>
                        </tr>
                    </div>

                    <!-- <div class="form-group">
            <label for="usr">body:</label>
            <textarea rows="4" cols="50" name="body" class="form-control"">
                
            </textarea>
        </div> -->
                    <tr>
                        <td> <input type="submit" value=أرسل class="btn btn-success mb-3"></td>
                    </tr>
                </table>
            </form>
        </section>
        </tr>
    </div>
    @endsection