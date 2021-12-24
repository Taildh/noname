@extends('dashboard.layouts.master')

@section('title')
    Posts index
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/select2/select2.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('dashboard.posts.index') }}">Posts</a>
            </li>
        </ul>
    </div>
@endsection

@section('alert')
    @if(session('success'))
        <div class="alert alert-success">
             {{ session('success') }}
        </div>
    @elseif (session('delete'))
        <div class="alert alert-danger">
             {{ session('delete') }}
        </div>
    @elseif(session('create'))
        <div class="alert alert-success">
             {{ session('create') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue-hoki">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                STT
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img src="{{ url('/') . $post->image }}" alt="" class="img-responsive"
                                         style="width: 70px">
                                </td>
                                <td>
                                    {{ $post->user_id }}
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->status == 1 ? "Enabled" : "Disable" }}
                                </td>
                                <td>
                                    <a class="btn btn-circle btn-icon-only green"
                                       href="{{ route('dashboard.posts.edit', $post->id) }}">
                                        <i class="icon-wrench"></i>
                                    </a>
                                    <span>
                                        <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="post"
                                              style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-circle btn-icon-only red">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('metronic/assets/admin/pages/scripts/table-advanced.js') }}"></script>

@endsection

@section('init-script')
    TableAdvanced.init();
@endsection
