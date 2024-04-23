@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('sub_categories.store') }}">
                    @csrf
                
                    <div class="card-body">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" name="name" class="form-control"  placeholder="name" />
                            @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">
                                Category
                            </label>
                            <select name="category_id" id="category_id">
                                <option value="">Select a category</option>
                                @foreach ($items as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                             </select>
                        </div>
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Images</h4>


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
