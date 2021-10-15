@extends('expense.layouts')

@section('title', 'Kategorisel Rapor')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h3>Kategorisel Rapor</h3>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <th>Kategori</th>
        <th>Yapılan Ödeme Sayısı</th>
        <th>Toplam Tutar</th>
        <th>Ortalama Tutar</th>
    </thead>

    <tbody>
        @foreach ($catReport as $cr)
        <tr>
            <td>{{$cr->category}}</td>
            <td>{{$cr->count}}</td>
            <td>{{$cr->sum}}</td>
            <td>{{$cr->avg}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
