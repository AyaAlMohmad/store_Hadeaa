@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">


                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                             
                            <th>Action</th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($items as $data)
                            <tr>
                                <td> <img src="{{ asset('images/subcategory/' . $data->image) }}" width="100" height="100"></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->category->name }}</td>
                                    <td>
                                        <a  href="{{ route('sub_categories.restore', $data->id) }}">
                                            <i class="ace-icon fa fa-undo bigger-120"> </i>
                                        </a>
                                        <a style="color:red" href="{{ route('sub_categories.finaldelete', $data->id) }}">
                                            <i class="ace-icon dripicons-trash bigger-120"></i>
                                        </a>
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
