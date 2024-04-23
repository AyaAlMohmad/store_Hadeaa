@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('contacts.store') }}">
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
                            <label>Address</label>
                            <div>
                                <textarea name="address" class="form-control"  rows="5" placeholder="address"></textarea>

                            </div>
                            @error('address')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Map</label>
                            <input type="text" name="map" class="form-control"  placeholder="map" />
                            @error('map')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>  
                         <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="fax" class="form-control"  placeholder="fax" />
                            @error('fax')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control"  placeholder="mobile" />
                            @error('mobile')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"  placeholder="email" />
                            @error('email')
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
