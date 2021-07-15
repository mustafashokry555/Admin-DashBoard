@extends('admin.layout')

@section('title')
Drugs
@endsection


@section('subTitle')
Drug Details
@endsection



@section('mainContent')

<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Similer</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">

                <!-- start tap-->
                <div class="tab-pane active" id="activity">

                    <div class="row">

                        <div class="col-12 col-md-12 col-lg-8 order-1">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-primary mb-3"><i class="fas fa-capsules"></i>
                                        {{$drug->name}}</h3>
                                    <div class="post ml-3">
                                        <div class="user-block  mt-3 mb-1">
                                            <h5 class="text-info"><i class="fas fa-star-of-life"></i> Uses
                                            </h5>
                                        </div>
                                        <!-- /.user-block -->
                                        <p class="pl-3" style="font-size: 20px;">
                                            {{$drug->uses}}
                                        </p>
                                    </div>

                                    <div class="post clearfix ml-3">
                                        <div class="user-block mt-3 mb-1">
                                            <h5 class="text-info"><i class="fas fa-star-of-life"></i> Side
                                                Effects</h5>
                                        </div>
                                        <!-- /.user-block -->
                                        <p class="pl-3">
                                            {{$drug->side_effects}}
                                        </p>
                                    </div>

                                    <div class="post ml-3">
                                        <div class="user-block mt-3 mb-1">
                                            <h5 class="text-info"><i class="fas fa-star-of-life"></i>
                                                Contraindications</h5>
                                        </div>
                                        <!-- /.user-block -->
                                        <p class="pl-3">
                                            {{$drug->not_use}}
                                        </p>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-lg-4 order-2">

                            <div class="text-muted">
                                <p class="text-sm">Form
                                    <b class="ml-2 d-block">{{$drug->form}}</b>
                                </p>
                                <p class="text-sm">Price
                                    <b class="ml-2 d-block">{{$drug->price}} LE</b>
                                </p>
                                <p class="text-sm">Added In
                                    <b class="ml-2 d-block">{{$drug->created_at->format('d-M-y') ." at ".
                                                    $drug->created_at->format('h:i A')}}</b>
                                </p>
                                <p class="text-sm">Added By
                                    <b class="ml-2 d-block">{{$drug->adminName}}</b>
                                </p>
                            </div>

                            <h5 class="mt-5 text-muted">Composition</h5>
                            <ul class="list-unstyled">

                                @foreach ($drug->composition as $comp)
                                <li>
                                    <p class="ml-2 mb-2 btn-link text-secondary">
                                        <i class="fa fa-hashtag"></i>
                                        <b>{{$comp->name ." ". $comp->size}}</b>
                                    </p>
                                </li>
                                @endforeach

                            </ul>
                            <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary">Show Imgage</a>
                                <a href="{{url('dashboard/drugs/edit/' . $drug->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.end tap -->

                <!-- start tap-->
                <div class="tab-pane" id="timeline">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <!-- Data-->
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">

                                    <thead class="mustyle">
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Name
                                            </th>
                                            <th class="ab_disable sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">
                                                Form
                                            </th>
                                            <th class="ab_disable sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Price
                                            </th>
                                            <th class="ab_disable sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Uses
                                            </th>
                                            <th class="ab_disable sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                composition
                                            </th>
                                            <th class="ab_disable sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
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
                                                <a class="btn btn-danger btn-sm " style="margin: 0.5px 0;" href="#">
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
                <!-- /.end tap -->

            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>



@endsection