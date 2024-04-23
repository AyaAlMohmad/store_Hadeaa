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
                                <th>Type</th>
                                <th>Link</th>
                         

                            </tr>
                        </thead>


                        <tbody>

                                <tr>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/Social/' . $item->image) }}"></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td style="word-break: break-all;">{{ $item->link }}</td>

                                  
                                </tr>
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
