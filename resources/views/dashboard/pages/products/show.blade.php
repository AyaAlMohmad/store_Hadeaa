@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">


                    <table id="itemtable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
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
                      
                            <tr>
                                <td><img style="width: 90px; height: 90px;"
                                        src="{{ asset('images/product/' . $item->image_first) }}">
                                </td>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>

                                <td>
                                    @foreach ($item->colors as $color)
                                        {{ $color->title }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $item->sub_category->name }}</td>
                                <td>{{ $item->sub_category->category->name }}</td>
                                <td style="word-break: break-all;">{{ $item->description }}</td>


                                </tr>
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
