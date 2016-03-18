<div class="form-group">
    {!! Form::label('alias', 'Alias', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    {!! Form::label('first_name', 'First name', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('first_name', null, ['class' => 'form-control', 'data-parsley-required' => 'true']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    {!! Form::label('last_name', 'Last name', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-required' => 'true']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    {!! Form::label('extension', 'Extension', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('extension', null, ['class' => 'form-control']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    {!! Form::label('username', 'Username', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('username', null, ['class' => 'form-control', 'data-parsley-required' => 'true']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
    @if ($submitButtonText == 'Update user')
        <div class="col-md-2">
            <label class="checkbox-inline">
                <input type="checkbox" class="ui-check" value='1' name="new_password"> <small>Set new password</small>
            </label>
        </div>
    <div class="col-md-5">
        {!! Form::password('password', ['class' => 'form-control', 'data-parsley-required' => 'true', 'disabled' => 'disabled']) !!}
    @else
    <div class="col-md-7">
        {!! Form::password('password', ['class' => 'form-control', 'data-parsley-required' => 'true']) !!}
    @endif
    </div> <!-- /.col -->
</div> <!-- /.form-group -->


<hr>

<div class="form-group">
    {!! Form::label('role_list', 'Roles', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::select('role_list[]', $roles, null, ['multiple', 'id' => 'role_list', 'class' => 'form-control', 'data-parsley-required' => 'true']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    <label class="control-label col-md-3">Status</label>

    <div class="col-md-7">
        <label class="radio-inline">
            {!! Form::radio('status', 1, isset($user) ? $user : null, ['class' => 'ui-check', 'required data-parsley-errors-container' => '#checkbox-errors']) !!} Active
        </label>
        <label class="radio-inline">
            {!! Form::radio('status', 0, isset($user) ? $user : null, ['class' => 'ui-check']) !!} Inactive
        </label>
        <div id="checkbox-errors" style="margin: 5px 20px;"></div>
    </div> <!-- /.col -->
</div> <!-- /.form-group -->

<div class="form-group">
    <div class="col-md-7 col-md-push-3">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        &nbsp;
        {!! Form::reset('Cancel', ['class' => 'btn btn-default']) !!}
    </div> <!-- /.col -->
</div> <!-- /.form-group --> {{--no error's here! 38 line--}}