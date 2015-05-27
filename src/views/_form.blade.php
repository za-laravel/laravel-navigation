<div class="form-group">
    {!! Form::label('name', '', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $nav->name, ["class"=>"form-control", 'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('link', '', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('link', null, ["class" => "form-control", 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('sort_order', '', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::input('number','sort_order', null, ["class" => "form-control", 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('parent_id', '', ["class" => "col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::select('parent_id', $navs) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>