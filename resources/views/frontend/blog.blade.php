<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Document</title>
	<title>blog</title>
    <style>
        li{
            list-style-type: none;
            display: inline-block
        }
    </style>
</head>
<body>
    <div class="container">


        {{-- error  --}}
        @if(Session::has('massage'))
        <p class="alert alert-success mt-4">{{ Session::get('massage') }}</p>
        @endif


        {{-- post  --}}
        <div class="row mt-5">
            <div class="col-md-6">
                <img style="width:100%;" src="{{$data1->image}}" alt="">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div>
                    <h3>{{$data1->title}}</h3>
                    <p>
                        {{$data1->dis}}
                    </p>
                </div>
            </div>
        </div><br><br><br>


        {{-- comment  --}}
       @auth
       <div class="row">

        {{-- comment error  --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- comment form  --}}
        <form method="POST" action="{{url('/comment')}}">
            @csrf
            <div class="mb-3">
              <label for="comment" class="form-label">Comment</label>
                <input type="hidden" name="blog_id" value="{{$data1->id}}">
              <textarea name="comment" id="comment" cols="30" rows="10" style="width:100%; height:150px;"></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
       @endauth



       {{-- comment list  --}}
       <div class="mt-5">
            <ul>
                @php
                    use App\Models\comment;
                    use App\Models\user;
                    use Illuminate\Support\Facades\Auth;
                    $comments = comment::latest()->get();

                 @endphp
                 @foreach ($comments as $comment)
                        @php
                            $author = $comment->user_id;
                            $author_name = user::where('id','=', $author)->first();
                        @endphp
                    <li>{{$comment->comment}} <br> <a class="btn btn-info"> <i class="fa-solid fa-user"></i> comment by :  {{$author_name->name}}</a></li>
                   @auth
                   @if ($comment->user_id == auth::user()->id )
                   <li><a class="btn btn-danger" href="{{url('delete-comment/'.$comment->id)}}">Delete</a></li>
                   @endif
                   @endauth
                    <hr>
                 @endforeach

            </ul>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
