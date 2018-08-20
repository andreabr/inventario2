@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')

<h1>Cadastro de Impressoras</h1>

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

    <form action="{{route('printer.store')}}" method="POST">
        {{csrf_field()}}

        <div class="form-row">

            <div class="form-group col-md-4">

                <label for="type" col-sm-2 col-form-label>Tipo*</label>

                <select name="type" class="type form-control">
                <option></option>
                <option value="Laser Preto e Branco">Laser Preto e Branco</option>
                <option value="Laser Colorida">Laser Colorida</option>
                <option value="Jato de Tinta">Jato de Tinta</option>
                 </select>
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
                        <label for="model" col-sm-2 col-form-label>Tonner/Cartuchos*</label>
                        <input type="text" class="form-control" name="tonner" value="{!! old('tonner') !!}">
                </div>

            <div class="form-group col-md-4">
                <label for="sector" col-sm-2 col-form-label>Setor*</label>
                <select class="sector form-control" name="sector_id">
                    <option></option>
                     @foreach($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->initials}}</option>
                     @endforeach
                </select>
            </div>
       

        <div class="form-group col-md-4">

                <label for="status" col-sm-2 col-form-label>Status*</label>
                <select name="status" class="status form-control">
                    <option></option>
                    <option value="Bom - Em Uso">Bom - Em Uso</option>
                    <option value="Bom - Estocado">Bom - Estocado</option>
                    <option value="Ruim - Sem condições de uso">Ruim - Sem condições de uso</option>
                    <option value="Ruim - Em manutenção">Ruim - Em manutenção</option>
                    <option value="Ruim - Em descarga">Ruim - Em descarga</option>
                </select> {{-- <input type="text" class="form-control" name="status" value="{!! old('status') !!}">                --}}
            </div>

        </div>

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="serial_number" col-sm-2 col-form-label>Número de Série</label>
                    <input type="text" class="form-control" name="serial_number" value="{!! old('serial_number') !!}">
                </div>

                <div class="form-group col-md-3">
                    <label for="bmp_number" col-sm-2 col-form-label>Número BMP</label>
                    <input type="text" class="form-control" name="bmp_number" value="{!! old('bmp_number') !!}">
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
                <div class="form-group col-md-4">
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