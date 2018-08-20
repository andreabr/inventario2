@extends('adminlte::page')

@section('title', 'Inventário2')

@section('content_header')
    <h1>Lista de Impressoras</h1>
@stop

@section('content')
@include('printer.list')
@stop