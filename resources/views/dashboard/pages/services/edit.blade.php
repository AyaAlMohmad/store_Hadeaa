@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('services.update',$item->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"  placeholder="Title" value="{{ $item->title }}" />
                        </div>
                        @error( 'title')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                        <div class="form-group">
                            <label>Short Description</label>
                            <div>
                                <textarea name="short_description" class="form-control"  rows="5" >{{ $item->short_description }}</textarea>
                            </div>
                            @error( 'short_description')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control"  rows="5">{{ $item->description }}</textarea>
                            </div>
                            @error('description')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        </div>









                        <div class="card-body">

                            <h4 class="mt-0 header-title">Images</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <img >
                                        <img src="{{ asset('images/Service/' . $item->image) }}" width="100" height="100">
                                        <input name="image" type="file" id="id-input-file-3" />
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
