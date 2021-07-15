@extends('admin.layout')

@section('title')
Categors
@endsection

@section('subTitle')
Drug Categores
@endsection

@section('mainContent')

<div class="row mt-3 col-12">

    <div class="card col-12">

        <div class="card-body">

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
                                        Uses
                                    </th>
                                    <th class=" sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">
                                        Side Effects
                                    </th>
                                    <th class=" sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Contraindications
                                    </th>

                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Options
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($cats as $cat)
                                @php
                                $i=1;
                                @endphp
                                @if($i%2 == 0)
                                <tr class="even">
                                    @else
                                <tr class="odd">
                                    @endif
                                    <td class="dtr-control sorting_1" tabindex="0">{{$cat['uses']}}</td>
                                    <td>{{$cat['side_effects']}}</td>
                                    <td>{{$cat['not_use']}}</td>
                                    <td class="project-actions text-center " style="max-width:150px !important">
                                        <a class="btn btn-info btn-sm " style="margin: 0.5px 0;" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
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
                                        Uses
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Side Effects
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Contraindications to use
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