<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Document</title>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Auth;
    use App\Models\user;
    @endphp
	<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand active ms-5" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        {{-- Content visible to authenticated users --}}
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/dashboard')}}">Dashboard</a>
                          </li>
                    @else
                        {{-- Content visible to guests --}}
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/login')}}">login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{url('/register')}}">register</a>
                          </li>
                    @endauth




                </ul>

              </div>
            </div>
          </nav>
        <div class="row mt-3">

            @foreach ($data as $blog)


             <div class="col-md-3">
                 <div class="card" >
                     <img src="{{asset($blog->image)}}" class="card-img-top" alt="...">
                     <div class="card-body">
                       <h5 class="card-title">{{$blog->title}}</h5>
                       <p class="card-text">{{$blog->dis}} </p>
                       <a href="{{url('single-blog/'.$blog->id)}}" class="btn btn-primary">read more</a>
                       @php
                           $author = $blog->user_id;
                           $author_name = user::where('id','=', $author)->first();
                       @endphp
                       <a class="btn btn-info"> <i class="fa-solid fa-user"></i> {{$author_name->name}}</a>
                     </div>
                   </div>
             </div>
             @endforeach
         </div>
         {{ $data->links() }}
    </div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
