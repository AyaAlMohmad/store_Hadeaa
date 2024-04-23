@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    
                    <div class="tab-content padding-4">
                     
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>user</th>
                                            <th>email</th>
                                            <th>comment</th>

                                            <th>product</th>
                                            <th>image</th> 

                                            <th>actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($items as $data)
                                            <tr>
                                                <td>
                                                    {{ $data->user->name }}

                                                </td>
                                                <td>
                                              
                                                    <a href='mailto: {{ $data->user->email }}'>{{ $data->user->email }}</a>
                                                </td>
                                                <td>{{ $data->comment }}</td>
                                                <td>


                                                    {{ $data->product->name }}


                                                </td>
                                                <td><img style="width: 90px; height: 90px;"
                                                        src="{{ asset('images/product/' . $data->product->image_first) }}">
                                                </td> 


                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                                        {{-- <a style="color:green" href="{{ route('orders.edit', $data->id) }}">
                                                            <i class="fas fa-feather bigger-120"
                                                                style="margin-right: 10px;"> </i>
                                                        </a> --}}
                                                        {{-- <a style="color:blue" href="{{ route('orders.show', $data->id) }}">
                                                            <i class="dripicons-zoom-in bigger-120"
                                                                style="margin-right: 10px;"></i>
                                                        </a> --}}
                                                        <form method="POST"
                                                            action="{{ route('comments.destroy', $data->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border: none; color:white;">
                                                                <i class="ace-icon dripicons-trash bigger-120"
                                                                    style="color: red;"></i>
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
        </div>
    </div>

    <!-- end row -->
@endsection
