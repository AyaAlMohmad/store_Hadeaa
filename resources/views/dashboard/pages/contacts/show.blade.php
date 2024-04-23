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
                                <th>Title</th>
                                <th>Address</th>
                                <th>Map</th>
                                <th>Fax</th>
                                <th>Mobile</th>
                                <th>Email</th>

                            </tr>
                        </thead>


                        <tbody>
                         
                                <tr>
                                 
                                    <td>{{ $item->title }}</td>
                                    <td style="word-break: break-all;">{{ $item->address }}</td>
                                    <td style="word-break: break-all;">{{ $item->map }}</td>
                                    <td style="word-break: break-all;">{{ $item->fax }}</td>
                                    <td style="word-break: break-all;">{{ $item->mobile }}</td>
                                    <td style="word-break: break-all;">{{ $item->email }}</td>


                                </tr>
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
