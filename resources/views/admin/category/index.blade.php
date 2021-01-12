<!-- home.blade.php -->
@extends('adminlte::page')
@section('title', 'Moon - Category')
@section('content')
<style>
    .error{
        color:red;
    }
</style>
<div class="box">
    <div class="box-header">
        <div class="btn-group pull-right">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right" style="margin-right:10px;">
                <i class="fa fa-fw fa-list "></i>
                <span class="text">Add Category</span>
            </a>
        </div>


    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="catdaTatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
         $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
            $('#catdaTatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/admin/category') }}',
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'name', name: 'name'},
            {data: 'parent', name: 'parent'},
            {data: 'action', name: 'action'},
            ],
            "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0, 3 ] },
            { "bSearchable": false, "aTargets": [ 0, 3 ] }
            ]
    });
           
    });
</script>
@stop