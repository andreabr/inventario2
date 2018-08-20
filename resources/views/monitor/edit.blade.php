@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')

<h1>Edição de Monitor</h1>

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

    <form action="{{route('monitor.update', $monitor->id)}}" method="POST">
            {{csrf_field()}}
    
            <input name="_method" type="hidden" value="PATCH">

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="manufacturer" col-sm-2 col-form-label>Fabricante*</label>
                <input type="text" class="form-control" name="manufacturer" value="{{ $monitor->manufacturer }}">
            </div>

            <div class="form-group col-md-4">
                <label for="model" col-sm-2 col-form-label>Modelo*</label>
                <input type="text" class="form-control" name="model" value="{{ $monitor->model }}">
            </div>

            <div class="form-group col-md-4">
                <label for="screen_size" col-sm-2 col-form-label>Tamanho da Tela*</label>
                <input type="text" class="form-control" name="screen_size" value="{{ $monitor->screen_size }}">
            </div>

        </div>


        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="sector" col-sm-2 col-form-label>Setor*</label>
                <select class="sector form-control" name="sector_id">
                    <option></option>
                     @foreach($sectors as $sector)
                <option value="{{$sector->id}}" {{ $monitor->sector_id == $sector->id ? 'selected' : '' }}>{{$sector->initials}}</option>
                     @endforeach
                </select>
            </div>


            <div class="form-group col-md-4">

                <label for="status" col-sm-2 col-form-label>Status*</label>
                <select name="status" class="status form-control">
                    <option></option>
                <option value="Bom - Em Uso" {{ $monitor->status == "Bom - Em Uso" ? 'selected' : ''}}>Bom - Em Uso</option>
                <option value="Bom - Estocado" {{ $monitor->status == "Bom - Estocado" ? 'selected' : ''}}>Bom - Estocado</option>
                <option value="Ruim - Sem condições de uso" {{ $monitor->status == "Ruim - Sem condições de uso" ? 'selected' : ''}}>Ruim - Sem condições de uso</option>
                <option value="Ruim - Em manutenção" {{ $monitor->status == "Ruim - Em manutenção" ? 'selected' : ''}}>Ruim - Em manutenção</option>
                <option value="Ruim - Em descarga" {{ $monitor->status == "Ruim - Em descarga" ? 'selected' : ''}}>Ruim - Em descarga</option>
                </select> {{-- <input type="text" class="form-control" name="status" value="{!! old('status') !!}">                --}}
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="serial_number" col-sm-2 col-form-label>Número de Série</label>
                <input type="text" class="form-control" name="serial_number" value="{{ $monitor->serial_number }} ">
            </div>

            <div class="form-group col-md-4">
                <label for="bmp_number" col-sm-2 col-form-label>Número BMP</label>
                <input type="text" class="form-control" name="bmp_number" value="{{ $monitor->bmp_number }} ">
            </div>

            <div class="form-group col-md-4">
                <label for="year_acquisition" col-sm-2 col-form-label>Ano de Aquisição</label>
                <input type="text" class="form-control" name="year_acquisition" value="{{ $monitor->year_acquisition }} ">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <p>&nbsp</p>
                <p></p>
                <p></p>
                <p></p>
                <p class="align-text-bottom" style="color: blue;">* Campos obrigatórios</p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{asset('/monitor')}}" class="btn btn-primary">Cancelar</a>
            </div>
        </div>


    </form>

</div>


@stop