@extends('adminlte::page')

@section('title', 'Inventário2')

@section('content_header')
<h3 class="card-title">Lista de Setores - PAAF</h3>
@stop

@section('content')
@include('sector.list')
@stop