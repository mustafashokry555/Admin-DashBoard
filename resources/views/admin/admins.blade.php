@extends('admin.layout')

@section('title')
Admins
@endsection

@section('subTitle')
Admins
@endsection

@if(Auth::user()->role_id == $superAdminId['id'])
@section('addbutton')
<a href="{{url('dashboard/admins/addAdmin')}}" class="mr-3 px-3 btn btn-outline-info">Add New Admin</a>
@endsection
@endif

@section('mainContent')
<div class="row mt-3 col-12">
    
    <div class="card col-12">
        
        <div class="card-body">
            @include('massege')

            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <!-- Data-->
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">

                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">
                                        E-mail
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Phone
                                    </th>

                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Options
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($admins as $admin)
                                @php
                                $i=1;
                                @endphp
                                @if($i%2 == 0)
                                <tr class="even">
                                    @else
                                <tr class="odd">
                                    @endif
                                    <td class="dtr-control sorting_1" tabindex="0">{{$admin['name']}}</td>
                                    <td>{{$admin['email']}}</td>
                                    <td>{{$admin['phone']}}</td>
                                    <td class="project-actions text-center " style="max-width:150px !important">
                                        <a class="btn btn-primary btn-sm " style="margin: 0.5px 0;" href="{{url('dashboard/userInfo/'.$admin['id'])}}">
                                            <i class="fas fa-folder">.
                                            </i>
                                            View
                                        </a>
                                        @if(Auth::user()->role_id == $superAdminId['id'])
                                        <a class="btn btn-danger btn-sm " style="margin: 0.5px 0;" href="{{url('dashboard/user/delete/'.$admin['id'])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">
                                        Name
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        E-mail
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Phone
                                    </th>

                                    <th rowspan="1" colspan="1">
                                        Options
                                    </th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.card-body -->
    </div>


</div>

@endsection