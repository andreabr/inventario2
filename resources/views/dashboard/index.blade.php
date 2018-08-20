@extends('adminlte::page') 
@section('title', 'Inventário2') 
@section('content_header')
<h1>Dashboard</h1>

@stop 
@section('content')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$totalComputers->total}}</h3>
        @if($totalComputers->total > 1)
        <p>Computadores</p>
        @else
        <p>Computador</p>
        @endif
        <p><strong>{{$totalComputers->usable}}</strong> Em uso</p>
        <p><strong>{{$totalComputers->stock}}</strong> Em estoque</p>
        <p><strong>{{$totalComputers->unusable}}</strong> Sem condições de uso</p>
        <p><strong>{{$totalComputers->undermaintenance}}</strong> Em manutenção</p>
        <p><strong>{{$totalComputers->disposing}}</strong> Em processo de descarga</p>
      </div>
      <div class="icon">
        <i class="fa fa-desktop"></i>
      </div>
      <a href="{{route ('computer.index') }}" class="small-box-footer">Listagem <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$totalPrinters->total}}</h3>

        @if($totalPrinters->total > 1)
        <p>Impressoras</p>
        @else
        <p>Impressora</p>
        @endif
        <p><strong>{{$totalPrinters->usable}}</strong> Em uso</p>
        <p><strong>{{$totalPrinters->stock}}</strong> Em estoque</p>
        <p><strong>{{$totalPrinters->unusable}}</strong> Sem condições de uso</p>
        <p><strong>{{$totalPrinters->undermaintenance}}</strong> Em manutenção</p>
        <p><strong>{{$totalPrinters->disposing}}</strong> Em processo de descarga</p>

      </div>
      <div class="icon">
        <i class="fa fa-print"></i>
      </div>
      <a href="printer" class="small-box-footer">Listagem <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$totalMonitors->total}}</h3>

        @if($totalMonitors->total > 1)
        <p>Monitores</p>
        @else
        <p>Monitor</p>
        @endif
        <p><strong>{{$totalMonitors->usable}}</strong> Em uso</p>
        <p><strong>{{$totalMonitors->stock}}</strong> Em estoque</p>
        <p><strong>{{$totalMonitors->unusable}}</strong> Sem condições de uso</p>
        <p><strong>{{$totalMonitors->undermaintenance}}</strong> Em manutenção</p>
        <p><strong>{{$totalMonitors->disposing}}</strong> Em processo de descarga</p>

      </div>
      <div class="icon">
        <i class="fa fa-tv"></i>
      </div>
      <a href="#" class="small-box-footer">Listagem <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$totalPrinters->total}}</h3>

        @if($totalPrinters->total > 1)
        <p>Nobreaks/Estabilizadores</p>
        @else
        <p>Nobreak/Estabilizador</p>
        @endif
        <p><strong>{{$totalComputers->usable}}</strong> Em uso</p>
        <p><strong>{{$totalComputers->stock}}</strong> Em estoque</p>
        <p><strong>{{$totalComputers->unusable}}</strong> Sem condições de uso</p>
        <p><strong>{{$totalComputers->undermaintenance}}</strong> Em manutenção</p>
        <p><strong>{{$totalComputers->disposing}}</strong> Em processo de descarga</p>

      </div>
      <div class="icon">
        <i class="fa fa-plug"></i>
      </div>
      <a href="#" class="small-box-footer">Listagem <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

@stop