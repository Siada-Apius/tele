@extends('layouts.layout')

@section('head')
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <h2 class="">All users</h2>

            <br>
            <br>

            <div class="portlet portlet-default">

                <div class="portlet-body">

                    <table
                            class="table table-striped table-bordered table-hover ui-datatable"
                            data-global-search="false"
                            data-length-change="true"
                            data-info="true"
                            data-paging="true"
                            data-page-length="10"
                            >
                        <thead>
                        <tr>
                            <th data-filterable="text">Username</th>
                            <th data-filterable="select" data-sortable="true" data-sort-order="2">Name</th>
                            <th data-filterable="select" data-sortable="true" data-sort-order="2">Alias</th>
                            <th>Extension</th>
                            <th data-sortable="true">Status</th>
                            <th data-sortable="true" data-sort-order="1" data-direction="desc">Data Created</th>
                            <th data-sortable="true" data-sort-order="1" data-direction="desc">Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->alias }}</td>
                                <td>{{ $user->extension }}</td>
                                <td>{{ $user->status == 1 ? 'active' : 'inactive' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                    @foreach($user->roles as $role)
                                        <li>{{ $role->title or null }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td><a href="{{ url('users', [$user->id, 'edit']) }}">edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Extension</th>
                            <th>Status</th>
                            <th>Data Created</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>

                </div> <!-- /.portlet-body -->
            </div> <!-- /.portlet -->
        </div> <!-- /.container -->
    </div> <!-- .content -->
@endsection

@section('footer')
    <!-- Plugin JS -->
    <script src="/components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="/components/datatables-helper/js/datatables-helper.js"></script>
    <script>
        $(document).ready(function() {
            if ($('table').attr('data-global-search') == 'false') {
                $('.portlet-body > div > div:nth-child(1) > div:nth-child(2)').html('<a href="{{ url('users', 'create') }}" class="btn btn-default pull-right">Add new user</a>');
            }

        } );
    </script>
@endsection
