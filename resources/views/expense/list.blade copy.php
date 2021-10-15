@extends('expense.layouts')

@section('title', 'Gider Listesi')

@section('extras')
<style>
    table {
        width: 100%;
    }

    #example_filter {
        float: right;
    }

    #example_paginate {
        float: right;
    }

    label {
        display: inline-flex;
        margin-bottom: .5rem;
        margin-top: .5rem;

    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



@endsection

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<div class="row">
    <h3>Gider Listesi</h3>
    <div class="col-md-10">
        <input class="form-control" id="myInput" type="text" placeholder="Ara...">

    </div>
    <div class="col-md-2">
        <a href="{{route('addex')}}" class="btn btn-success">Yeni Gider Ekle</a>
    </div>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expenses as $ex)
        <tr>
            <td>{{$ex->id}}</td>
            <td>{{$ex->description}}</td>
            <td>{{$ex->spent_money}}</td>
            <td>{{$ex->event_date}}</td>
            <td>{{$ex->category->cat_name}}</td>
            <td>
                <form action="{{ route('destroyex', $ex->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    {{ method_field('DELETE') }}
                    <a href="{{ route('showex', $ex->id)}}" class="btn btn-info" title="Detaylar"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('editex', $ex->id)}}" class="btn btn-warning" title="Düzenle"><i class="fas fa-pen"></i></a>
                    <button type="submit" class="btn btn-danger" title="Sil"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#example').DataTable(

            {

                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "iDisplayLength": 5
            }
        );
    });


    function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>
@endsection
