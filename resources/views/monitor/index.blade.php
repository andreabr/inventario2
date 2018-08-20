@extends('adminlte::page')

@section('title', 'Inventário2')

@section('content_header')
    <h1>Lista de Monitores</h1>
@stop

@section('content')
@include('monitor.list')
@stop