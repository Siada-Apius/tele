@extends('layouts.layout')

@section('head')
    <link rel="stylesheet" href="/components/jquery-icheck/skins/minimal/_all.css">
    <link rel="stylesheet" href="/components/select2/select2.css">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="center-block">
                    <div class="portlet portlet-boxed {{ !session()->has('flash_message_hacking') ? session()->has('flash_message_user_updated') ? 'portlet-success' : 'portlet-info' : 'portlet-danger' }}">

                        <div class="portlet-header">
                            <h4 class="portlet-title">
                                <u>{{ !session()->has('flash_message_hacking') ? session()->has('flash_message_user_updated') ? session()->get('flash_message_user_updated') : 'Edit user' : session()->get('flash_message_hacking') }}</u>
                            </h4>
                        </div> <!-- /.portlet-header -->

                        @include('errors.list')

                        <div class="portlet-body">

                            {!! Form::model($user, ['class' => 'form parsley-form form-horizontal', 'method'=> 'PATCH', 'action' => ['Users\IndexController@update', $user->id]]) !!}
                            @include('users.form', ['submitButtonText' => 'Update user'])
                            {!! Form::close() !!}

                        </div> <!-- /.portlet-body -->
                    </div> <!-- /.portlet -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- .content -->
@endsection

@section('footer')
    <script src="/components/parsleyjs/dist/parsley.js"></script>
    <script src="/components/jquery-icheck/icheck.min.js"></script>
    <script src="/components/select2/select2.min.js"></script>
    <script>
        $('#role_list').select2 ({
            placeholder: "Select..."
        })

        $('input[name="password"]').removeAttr('data-parsley-required');
        $('input[name="new_password"]').change(function(){
            $('input[name="password"]').prop('disabled', function(i, v) { $(this).val(''); return !v; });
            if (!$('input[name="password"]').attr('data-parsley-required'))
                $('input[name="password"]').removeAttr('data-parsley-required');
            else $('input[name="password"]').attr('data-parsley-required', true);
        });

    </script>
@endsection