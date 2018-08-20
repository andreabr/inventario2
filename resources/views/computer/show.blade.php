@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')

<h1>Detalhe</h1>

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
        <form action="" method="POST">
            {{csrf_field()}}
            

            <div class="form-group col-md-6">
                <label for="user">Usuário</label>
                <input class="form-control" type="text" name="user" value="{{$computer->user}}" readonly>
            </div>

            <div class="form-group col-md-6">
                <label for="sector" col-sm-2 col-form-label>Setor</label>
                <select class="sector-show form-control" name="sector_id" id="computer-sector-show">
                   <option value="{{$sector->id}}" {{ $computer->sector_id == $sector->id ? 'selected' : ''}}>{{$sector->initials}}</option>
                 </select>
            </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="type" col-sm-2 col-form-label>Tipo</label>

            <select name="type" class="type form-control" id="computer-type-show">
                <option></option>
            <option value="Desktop" {{ $computer->type == "Desktop" ? 'selected' : ''}}>Desktop</option>
                <option value="Notebook"  {{ $computer->type == "Notebook" ? 'selected' : ''}}>Notebook</option>
                <option value="Servidor"  {{ $computer->type == "Servidor" ? 'selected' : ''}}>Servidor</option>
            </select> {{-- <input type="text" class="form-control" name="type" value="{!! old('type') !!}"> --}}
        </div>

        <div class="form-group col-md-4">

            <label for="manufacturer" col-sm-2 col-form-label>Fabricante</label>
            <input type="text" class="form-control" name="manufacturer" value="{{ $computer->manufacturer }}" readonly>
        </div>

        <div class="form-group col-md-4">

            <label for="model" col-sm-2 col-form-label>Modelo</label>
            <input type="text" class="form-control" name="model" value="{{ $computer->model }}" readonly>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="processor" col-sm-2 col-form-label>Processador</label>
            <input type="text" class="form-control" name="processor" value="{{ $computer->processor }}" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="memory_capacity" col-sm-2 col-form-label>Memória</label>
            <input type="text" class="form-control" name="memory_capacity" value="{{ $computer->memory_capacity }}" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="hard_disk_capacity" col-sm-2 col-form-label>HD</label>
            <input type="text" class="form-control" name="hard_disk_capacity" value="{{ $computer->hard_disk_capacity }}" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="operacional_system" col-sm-2 col-form-label>Sist. Operacional</label>
            <input type="text" class="form-control" name="operacional_system" value="{{ $computer->operacional_system }}" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="sys_op_architecture" col-sm-2 col-form-label>Arquitetura</label>
            <select name="sys_op_architecture" class="sys_op_architecture form-control" id="computer-sys_op_architecture-show">
                <option value="x86" {{ $computer->sys_op_architecture == "x86" ? 'selected' : ''}}>x86</option>
                <option value="x64" {{ $computer->sys_op_architecture == "x64" ? 'selected' : ''}}>x64</option>
            </select>
        </div>
        
    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="serial_number" col-sm-2 col-form-label>Número de Série</label>
            <input type="text" class="form-control" name="serial_number" value="{{ $computer->serial_number }}" readonly>
        </div>

        <div class="form-group col-md-6">
            <label for="bmp_number" col-sm-2 col-form-label>Número BMP</label>
            <input type="text" class="form-control" name="bmp_number" value="{{ $computer->bmp_number }}" readonly>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-3">
            <label for="licensed" col-sm-2 col-form-label>Licenciado</label>
            <input type="text" class="form-control" name="licensed" value="{{ $computer->licensed }}" readonly>
        </div>

        <div class="form-group col-md-3">
            <label for="network_name" col-sm-2 col-form-label>Nome de Rede</label>
            <input type="text" class="form-control" name="network_name" value="{{ $computer->network_name }}" readonly>
        </div>

        <div class="form-group col-md-3">
            <label for="ip_address" col-sm-2 col-form-label>Endereço IP</label>
            <input type="text" class="form-control" name="ip_address" value="{{ $computer->ip_address }}" readonly>
        </div>

        <div class="form-group col-md-3">
            <label for="year_acquisition" col-sm-2 col-form-label>Ano de Aquisição</label>
            <input type="text" class="form-control" name="year_acquisition" value="{{ $computer->year_acquisition }}" readonly>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="status" col-sm-2 col-form-label>Status</label>
            <select name="status" class="status form-control" id="computer-status-show">
                <option></option>
                <option value="Bom - Em Uso" {{ $computer->status == "Bom - Em Uso" ? 'selected' : ''}}>Bom - Em Uso</option>
                <option value="Bom - Estocado" {{ $computer->status == "Bom - Estocado" ? 'selected' : ''}}>Bom - Estocado</option>
                <option value="Ruim - Sem condições de uso" {{ $computer->status == "Ruim - Sem condições de uso" ? 'selected' : ''}}>Ruim - Sem condições de uso</option>
                <option value="Ruim - Em manutenção" {{ $computer->status == "Ruim - Em manutenção" ? 'selected' : ''}}>Ruim - Em manutenção</option>
                <option value="Ruim - Em descarga" {{ $computer->status == "Ruim - Em descarga" ? 'selected' : ''}}>Ruim - Em descarga</option>
            </select>

        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-sm-10">
            {{-- <button type="submit" class="btn btn-primary">Salvar</button> --}}
            <a href="{{asset('/computer')}}" class="btn btn-primary">Voltar</a>
        </div>
    </div>


    </form>

</div>




@stop