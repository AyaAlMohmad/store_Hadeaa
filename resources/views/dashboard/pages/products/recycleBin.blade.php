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
                            <th>Main Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Colors</th>
                            <th>Sub Category</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($items as $data)
                            <tr>
                                <td><img style="width: 90px; height: 90px;"
                                        src="{{ asset('images/product/' . $data->image_first) }}">
                                </td>

                                <td>{{ $data->name }}</td>
                                <td>{{ $data->price }}</td>

                                <td>
                                    @foreach ($data->colors as $color)
                                        {{ $color->title }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $data->sub_category->name }}</td>
                                <td>{{ $data->sub_category->category->name }}</td>
                                <td style="word-break: break-all;">{{ $data->description }}</td>


                                    <td>
                                        <a  href="{{ route('products.restore', $data->id) }}">
                                            <i class="ace-icon fa fa-undo bigger-120"> </i>
                                        </a>
                                        <a style="color:red" href="{{ route('products.finaldelete', $data->id) }}">
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
