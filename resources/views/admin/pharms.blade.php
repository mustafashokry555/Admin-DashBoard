@extends('admin.layout')

@section('title')
Pharmacies
@endsection


@section('subTitle')
Pharmacies
@endsection

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

                            <thead class="mustyle">
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Pharmacy
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Owner
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Owner Phone
                                    </th>

                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Options
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($pharms as $pharm)
                                @php
                                $i=1;
                                @endphp
                                @if($i%2 == 0)
                                <tr class="even">
                                    @else
                                <tr class="odd">
                                    @endif
                                    <td class="dtr-control sorting_1" tabindex="0">{{$pharm['pharm_name']}}</td>
                                    <td>{{$pharm['name']}}</td>
                                    <td>{{$pharm['phone']}}</td>
                                    <td class="project-actions text-center " style="max-width:150px !important">
                                        <a class="btn btn-primary btn-sm " style="margin: 0.5px 0;" href="{{url('dashboard/userInfo/'.$pharm['userId'])}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-danger btn-sm " style="margin: 0.5px 0;" href="{{url('dashboard/pharm/delete/'.$pharm['userId'])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
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
                                        Pharmacy
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Owner
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Owner Phone
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