@extends('adminlte::page') 
@section('content')

<div class="box">

        @if (session('message'))
        <div class="form-row" id="msg">
            <div class="alert alert-success" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
        </div>
        @elseif(session('error'))
        <div class="form-row" id="msg">
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
            </div>
        @endif


    <div class="portlet light">
        <div class="portlet-body">
            <div class="tabbable-custom nav-justified">
                

                <ul class="nav nav-tabs nav-justified">

                    <li class="active">
                        <a href="#detail" data-toggle="tab"> <i class="fa fa-user"></i>Detalhe</a>
                    </li>
                    <li>
                        <a href="#email" data-toggle="tab"><i class="fa fa-envelope"></i>Email</a>
                    </li>
                    <li>
                        <a href="#password" data-toggle="tab"><i class="fa fa-lock"></i>Senha</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="detail">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label">Nome</label>
                                                <div class="col-md-9">
                                                    <div class="form-control form-control-static">
                                                         {{ $user->name }}
                                                        <div class="form-control-focus"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <div class="form-control form-control-static">
                                                            {{ $user->email }}
                                                        <div class="form-control-focus"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label">Senha</label>
                                                <div class="col-md-9">
                                                    <div class="form-control form-control-static">
                                                        ***************
                                                        <div class="form-control-focus"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="email">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('newEmail') }}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="form-body">

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="[object Object]">Novo Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control" name="email" value="" required>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="[object Object]">Senha Atual</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="currentPassword" value="" required>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-9">
                                                        <button type="submit" class="btn green">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="password">
                        <div class="portlet-body form">
                            <div class="row">
                                <div class="col-md-6">
                                <form action="{{ route('newPassword') }}" method="POST" role="form" class="form-horizontal">
                                    {{csrf_field()}}    
                                    <div class="form-body">

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="[object Object]">Senha Atual</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="currentPassword" value="" required>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="[object Object]">Nova Senha</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="newPassword" value="" required>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                    <label class="col-md-3 control-label" for="[object Object]">Confirme Nova Senha</label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" name="passwordConfirmation" value="" required>
                                                        <div class="form-control-focus"></div>
                                                    </div>
                                                </div>

                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-9">
                                                        <button type="submit" class="btn green">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>




            </div>
        </div>
    </div>
</div>
@endsection
 {{-- 
@section('css')

<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
 --}}