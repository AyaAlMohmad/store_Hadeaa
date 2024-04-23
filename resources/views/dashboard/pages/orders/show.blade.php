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
                                <th>user</th>
                                <th>mobile</th>
                                <th>email</th>
                                <th>product</th>
                                <th>image</th> 
                                <th>amount</th> 
                                <th>comment</th> 
                            </tr>
                        </thead>


                        <tbody>
                        
                                <tr>
                                    <td>

                                        {{ $item->user->name }}


                                    </td>
                                    <td>

                                        {{ $item->user->phone }}


                                    </td>
                                    <td>

                                        {{ $item->user->email }}


                                    </td>
                                    <td>

                                        {{ $item->product->name }}


                                    </td>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/product/' . $item->product->image_first) }}">
                                    </td>
                                    <td>


                                        {{ $item->amount }}


                                    </td> <td>


                                        {{ $item->comment }}


                                    </td>
                                </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
