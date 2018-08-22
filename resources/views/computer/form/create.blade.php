@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')

<h1>Cadastro de Computadores</h1>

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
        <form action="{{route('computer.store')}}" method="POST">
            {{csrf_field()}}

            <div class="form-group col-md-6">
                <label for="user">Usuário</label>
                <input class="form-control" type="text" name="user" value="{!! old('user') !!}">
            </div>

            <div class="form-group col-md-6">
                <label for="sector" col-sm-2 col-form-label>Setor*</label>
                <select class="sector form-control" name="sector_id">
                    <option></option>
                    @foreach($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->initials}}</option>
                    @endforeach
                  </select>
            </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="type" col-sm-2 col-form-label>Tipo*</label>

            <select name="type" class="type form-control">
                <option></option>
                <option value="Desktop">Desktop</option>
                <option value="Notebook">Notebook</option>
                <option value="Servidor">Servidor</option>
            </select> {{-- <input type="text" class="form-control" name="type" value="{!! old('type') !!}"> --}}
        </div>

        <div class="form-group col-md-4">

            <label for="manufacturer" col-sm-2 col-form-label>Fabricante*</label>
            <input type="text" class="form-control" name="manufacturer" value="{!! old('manufacturer') !!}">
        </div>

        <div class="form-group col-md-4">

            <label for="model" col-sm-2 col-form-label>Modelo*</label>
            <input type="text" class="form-control" name="model" value="{!! old('model') !!}">
        </div>

    </div>


    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="processor" col-sm-2 col-form-label>Processador*</label>
            <input type="text" class="form-control" name="processor" value="{!! old('processor') !!}">
        </div>

        <div class="form-group col-md-2">
            <label for="memory_capacity" col-sm-2 col-form-label>Memória*</label>
            <input type="text" class="form-control" name="memory_capacity" value="{!! old('memory_capacity') !!}">
        </div>

        <div class="form-group col-md-2">
            <label for="hard_disk_capacity" col-sm-2 col-form-label>HD*</label>
            <input type="text" class="form-control" name="hard_disk_capacity" value="{!! old('hard_disk_capacity') !!}">
        </div>

        <div class="form-group col-md-2">
            <label for="operacional_system" col-sm-2 col-form-label>Sist. Operacional*</label>
            <input type="text" class="form-control" name="operacional_system" value="{!! old('operacional_system') !!}">
        </div>

        <div class="form-group col-md-2">
            <label for="sys_op_architecture" col-sm-2 col-form-label>Arquitetura*</label>
            <select name="sys_op_architecture" class="sys_op_architecture form-control" id="sys_op_architecture">
                <option></option>
                <option value="x86">x86</option>
                <option value="x64">x64</option>
            </select>
            {{-- <input type="text" class="form-control" name="sys_op_architecture" value="{!! old('sys_op_architecture') !!}"> --}}
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="serial_number" col-sm-2 col-form-label>Número de Série</label>
            <input type="text" class="form-control" name="serial_number" value="{!! old('serial_number') !!}">
        </div>

        <div class="form-group col-md-6">
            <label for="bmp_number" col-sm-2 col-form-label>Número BMP</label>
            <input type="text" class="form-control" name="bmp_number" value="{!! old('bmp_number') !!}">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-3">
            <label for="licensed" col-sm-2 col-form-label>Licenciado</label>
            <select name="licensed" id="" class="licensed form-control">>
                <option value=""></option>
                <option value="SIM">Sim</option>
                <option value="NÃO">Não</option>
            </select>
            {{-- <input type="text" class="form-control" name="licensed" value="{!! old('licensed') !!}"> --}}
        </div>

        <div class="form-group col-md-3">
            <label for="network_name" col-sm-2 col-form-label>Nome de Rede</label>
            <input type="text" class="form-control" name="network_name" value="{!! old('network_name') !!}">
        </div>

        <div class="form-group col-md-3">
            <label for="ip_address" col-sm-2 col-form-label>Endereço IP</label>
            <input type="text" class="form-control" name="ip_address" value="{!! old('ip_address') !!}">
        </div>

        <div class="form-group col-md-3">
            <label for="year_acquisition" col-sm-2 col-form-label>Ano de Aquisição</label>
            <input type="text" class="form-control" name="year_acquisition" value="{!! old('year_acquisition') !!}">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="status" col-sm-2 col-form-label>Status*</label>
            <select name="status" class="status form-control">
                <option></option>
                <option value="Bom - Em Uso">Bom - Em Uso</option>
                <option value="Bom - Estocado">Bom - Estocado</option>
                <option value="Ruim - Sem condições de uso">Ruim - Sem condições de uso</option>
                <option value="Ruim - Em manutenção">Ruim - Em manutenção</option>
                <option value="Ruim - Em descarga">Ruim - Em descarga</option>
            </select>
            {{-- <input type="text" class="form-control" name="status" value="{!! old('status') !!}"> --}}
        </div>
        <div class="form-group col-md-4">
            <p class="align-text-bottom">&nbsp</p>
            <p class="align-text-bottom" style="color: blue;">* Campos obrigatórios</p>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-sm-10">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>


    </form>

</div>






@stop