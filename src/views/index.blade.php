@extends('laravel-admin::layout')

@section('title')
    Навигация
@stop
@section('js')
    <!-- Tables -->
    <script src="/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script>
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for (var i = 0; i < cbs.length; i++) {
                if (cbs[i].type == 'checkbox') {
                    cbs[i].checked = bx.checked;
                }
            }
        }
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Навигация</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Пункты Меню
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.navigation.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить пункт меню"
                           class="btn btn-default btn-mini"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <!--<th>#</th>  -->
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th>Порядок</th>
                            <th>Родитель</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($navs as $nav)
                                <tr>
                                    <td>{{ $nav->name }}</td>
                                    <td>{{ $nav->link }}</td>
                                    <td>{{ $nav->sort_order }}</td>
                                    <td>
                                        @if ($nav->parent)
                                            {{ $nav->parent->name }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.navigation.edit',['id'=>$nav->id])}}"
                                            data-toggle="tooltip"
                                            data-original-title="Редактитровать"
                                            class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['route' => ['admin.navigation.destroy', $nav->id],
                                        'class' => 'form-horizontal confirm',
                                        'role' => 'form', 'method' => 'DELETE']) !!}
                                            <button data-toggle="tooltip"
                                                data-original-title="Удалить"
                                                type="submit" class="btn btn-danger confirm-btn">
                                                    <i class="fa fa-trash-o"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="text-center">{!! $navs->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
