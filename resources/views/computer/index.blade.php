@extends('adminlte::page')

@section('title', 'Inventário2')

@section('content_header')
    <h1>Lista de Computadores</h1>
@stop

@section('content')
@include('computer.list')
@stop