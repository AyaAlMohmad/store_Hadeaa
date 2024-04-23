@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('socials.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"  placeholder="Title" />
                            @error('title')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <div>
                                <input type="text" name="type" class="form-control"  rows="5" placeholder="type">

                            </div>
                            @error('type')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>link</label>
                            <div>
                                <input type='text' name="link" class="form-control"  placeholder="link" rows="5">
                            </div>
                            @error('link')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>









                        <div class="card-body">

                            <h4 class="mt-0 header-title">Image</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="image" type="file" multiple="multiple">
                                    </div>
                                </form>
                            </div>

                            @error('image')
                                <div style="color: red">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <div class="col-sm-6 control-label no-padding-right">
                                <button type="submit" class="btn btn-sm btn-primary">save</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImage").attr("src", reader.result);
                }
                reader.readAsDataURL(file);


            }
        }
    </script>
@endsection
