@extends('backend.admin_dashboard')
@section('title') Admin @endsection
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        @if(Session::has('massage'))
        <p class="alert alert-success">{{ Session::get('massage') }}</p>
        @endif
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ url('blogs-show') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Blogs</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Blogs/News</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="text-white" style="font-size: 20px">Blogs Main Informantion</p>

                        <form id="myForm" method="post" action="{{ url('blogs-update/'.$data2->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control" value="{{$data2->title}}" required>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" class="form-control" value="{{$data2->image}}" >
                                    </div>
                                    <img src="{{ asset($data2->image) }}" alt="" id="main_image_show"
                                        class="avatar-lg img-thumbnail" alt="profile-image"
                                        style="width: 120px;height:120px">
                                </div>


                                <div class="col-lg-12 mt-2">
                                    <div class="form-group mb-3">
                                        <label for="dis" class="form-label">Description
                                        </label>
                                        <textarea name="dis" class="form-control" id="dis" cols="30" rows="5"
                                           required>
                                        {{$data2->dis}}
                                  </textarea>
                                    </div>
                                </div>

                            </div>

                            <!-- end row-->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light "><i
                                        class="mdi mdi-content-save"></i>Submit</button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->


        {{-- image view js  --}}
        <script>
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#main_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });




            });
        </script>




@endsection
