@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')

<h1>Edição de Setor</h1>

@stop 
@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif @if (session('message'))
    <div class="form-row" id="msg">
        <div class="alert alert-success" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>

    @endif

    <div class="form-row">
        <form action="{{route('sector.update', $sector->id)}}" method="POST">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">

            <div class="form-group col-md-2">
                <label for="user">Sigla</label>
                <input class="form-control" type="text" name="initials" value="{{$sector->initials}}">
            </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-8">
            <label for="type" col-sm-2 col-form-label>Extenso</label>
            <input type="text" class="form-control" name="in_full" value="{{$sector->in_full}}">
        </div>


    </div>

    <div class="form-row">
        <div class="form-group col-sm-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{asset('/sector')}}" class="btn btn-primary">Cancelar</a>
        </div>
    </div>

    </form>
</div>


@stop