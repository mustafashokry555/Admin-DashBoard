@extends('admin.layout')

@section('title')
Drugs
@endsection


@section('subTitle')
Drug Categores
@endsection

@section('addbutton')
<a href="{{url('dashboard/drugs/addDrug')}}" class="mr-3 px-3 btn btn-outline-info">Add New Drug</a>
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
                                        Name
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Form
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Price
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Uses
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        composition
                                    </th>
                                    <th class="ab_disable sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Options
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($drugs as $drug)
                                @php
                                $i=1;
                                $j=0;
                                @endphp
                                @if($i%2 == 0)
                                <tr class="even">
                                    @else
                                <tr class="odd">
                                    @endif
                                    <td class="dtr-control sorting_1" tabindex="0">{{$drug['name']}}</td>
                                    <td>{{$drug['form']}}</td>
                                    <td>{{$drug['price']}}</td>
                                    <td>{{$drug['uses']}}</td>
                                    <td>
                                        @foreach ($drug->composition as $comp)
                                        @if($j > 0)
                                        ,<br>{{$comp->name ." ". $comp->size}}
                                        @else
                                        {{$comp->name ." ". $comp->size}}
                                        @endif
                                        @php
                                        $j++;
                                        @endphp
                                        @endforeach
                                    </td>
                                    <td class="project-actions text-center " style="max-width:150px !important">
                                        <a class="btn btn-primary btn-sm " style="margin: 0.5px 0;"
                                            href="{{url('dashboard/drug/' . $drug->id)}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm " style="margin: 0.5px 0;"
                                            href="{{url('dashboard/drugs/edit/' . $drug->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm " style="margin: 0.5px 0;" 
                                        href="{{url('dashboard/drugs/delete/' . $drug->id)}}">
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
                                        Name
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Form
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Price
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Uses
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Added By
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