<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{--
                <h3 class="card-title">Lista de Setores - PAAF</h3> --}} 
                @if (session('message'))
                <div class="form-row" id="msg">
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <table id="monitor-list" class="display" >
                        <thead>
                            <th>No</th>
                            <th>Fabricante</th>
                            <th>Modelo</th>
                            <th>Tela</th>
                            <th>No Serie</th>
                            <th>Setor</th>
                            <th>Status</th>
                            <th style="width: 10px">Detal</th>
                            <th style="width: 10px">Editar</th>
                            <th style="width: 10px">Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($monitors as $monitor)
                                <tr>
                                    <td></td>
                                    <td style="font-size:0.9em;">{{$monitor->manufacturer}}</td>
                                    <td style="font-size:0.9em;">{{$monitor->model}}</td>
                                    <td style="font-size:0.9em;">{{$monitor->screen_size}}</td>
                                    <td style="font-size:0.9em;">{{$monitor->serial_number}}</td>
                                    <td style="font-size:0.9em;">{{$monitor->sector->initials}}</td>
                                    <td style="font-size:0.9em;">{{$monitor->status}}</td>
                                    
                                    <td>
                                            <a href="{{ route('monitor.show', $monitor->id) }}" class="btn">
                                            <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                    <td>
                                        <a href="{{ route('monitor.edit', $monitor->id) }}" class="btn">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('monitor.destroy', $monitor->id) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <a href="">
                                            <button type="submit" class="btn"> {{-- <span class="glyphicon glyphicon-trash"></span> --}}
                                                <i class="fa fa-trash"></i> {{-- <a href="{{route('monitor.destroy', $monitor->id)}}"><i class="fa fa-trash"></i></a>                                            --}}
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>