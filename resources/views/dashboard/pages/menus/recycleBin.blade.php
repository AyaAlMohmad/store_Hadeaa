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
                                <th>Name</th>
                                <th>Title</th>
                                <th>Short_description</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($items as $data)
                                <tr>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/Menu/' . $data->image) }}"></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td style="word-break: break-all;">{{ $data->short_description }}</td>
                                    <td style="word-break: break-all;">{{ $data->description }}</td>

                                    <td>
                                        <a  href="{{ route('menus.restore', $data->id) }}">
                                            <i class="ace-icon fa fa-undo bigger-120"> </i>
                                        </a>
                                        <a style="color:red" href="{{ route('menus.finaldelete', $data->id) }}">
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
