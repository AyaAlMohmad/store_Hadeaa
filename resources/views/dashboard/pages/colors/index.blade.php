@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

               

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Color code</th>
                       
                               
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($items as $data)
                                <tr>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/color/' . $data->image) }}"></td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->color_code }}</td>
                                 
                                  

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                            <a style="color:green" href="{{ route('colors.edit', $data->id) }}">
                                                <i class="fas fa-feather bigger-120" style="margin-right: 10px;"> </i>
                                            </a>
                                            <a style="color:blue" href="{{ route('colors.show', $data->id) }}">
                                                <i class="dripicons-zoom-in bigger-120" style="margin-right: 10px;"></i>
                                            </a>
                                            <form method="POST" action="{{ route('colors.destroy', $data->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border: none; color:white;">
                                                    <i class="ace-icon dripicons-trash bigger-120" style="color: red;"></i>
                                                  </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
