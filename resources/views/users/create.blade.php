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
                    <div class="portlet portlet-boxed {{ session()->has('flash_message_hacking') ? 'portlet-danger' : 'portlet-info' }}">

                        <div class="portlet-header">
                            <h4 class="portlet-title">
                                <u>{{ session()->has('flash_message_hacking') ? session()->get('flash_message_hacking') : 'Create new user' }}</u>
                            </h4>
                        </div> <!-- /.portlet-header -->

                        @include('errors.list')

                        <div class="portlet-body">

                            {!! Form::open(['url' => 'users', 'class' => 'form parsley-form form-horizontal']) !!}
                                @include('users.form', ['submitButtonText' => 'Add new user'])
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
    </script>
@endsection