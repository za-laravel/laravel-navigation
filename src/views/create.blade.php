@extends('laravel-admin::layout')

@section('title')
    Создать пункт меню
@stop

@section('js')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать пункт меню</h1>
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
                            @include('laravel-navigation::errorBasic')

                            {!! Form::model($nav,['route'=>['admin.navigation.store'],
                                'method' => 'POST',
                                'class'=>'form-horizontal', 'role'=>'form']) !!}
                                @include('laravel-navigation::_form')
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
