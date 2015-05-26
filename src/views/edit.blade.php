@extends('laravel-admin::layout')

@section('title')
    Редактировать пункт меню
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать пункт меню</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Пункт меню
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('errorBasic')

                            {!! Form::model($nav,['route'=>['admin.navigation.update', $nav->id],
                                'method' => 'PATCH',
                                'class'=>'form-horizontal', 'role'=>'form',
                                'id' => 'form-edit', 'data-id'=> $nav->id]) !!}
                                @include('_form')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
