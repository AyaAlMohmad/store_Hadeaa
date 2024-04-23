@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">


                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <th>Image </th>
                            <th>Name</th>
                            <th>Category</th>


                            </tr>
                        </thead>


                        <tbody>

                            <tr>
                                <td> <img src="{{ asset('images/subcategory/' . $item->image) }}" width="100"
                                        height="100"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>


                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
