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
                    <table id="computer-list" class="display" >
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Fabricante</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">Proc</th>
                            <th class="text-center">Memória</th>
                            <th class="text-center">No Série</th>
                            <th class="text-center">Id Rede</th>
                            <th class="text-center">Usuário</th>
                            <th class="text-center">Seção</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 10px">Detal</th>
                            <th class="text-center" style="width: 10px">Editar</th>
                            <th class="text-center" style="width: 10px">Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($computers as $computer)
                                <tr>
                                    <td></td>
                                    <td style="font-size:0.9em;">{{$computer->type}}</td>
                                    <td style="font-size:0.9em;">{{$computer->manufacturer}}</td>
                                    <td style="font-size:0.9em;">{{$computer->model}}</td>
                                    <td style="font-size:0.9em;">{{$computer->processor}}</td>
                                    <td style="font-size:0.9em;">{{$computer->memory_capacity}}</td>
                                    <td style="font-size:0.9em;">{{$computer->serial_number}}</td>
                                    <td style="font-size:0.9em;">{{$computer->network_name}}</td>
                                    <td style="font-size:0.9em;">{{$computer->user}}</td>
                                    <td style="font-size:0.9em;">{{$computer->sector->initials}}</td>
                                    <td style="font-size:0.9em;">{{$computer->status}}</td>
                                    <td>
                                         <a href="{{ route('computer.show', $computer->id) }}" class="btn">
                                         <i class="fa fa-search"></i>
                                         </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('computer.edit', $computer->id) }}" class="btn">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('computer.destroy', $computer->id) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <a href="">
                                            <button type="submit" class="btn"> {{-- <span class="glyphicon glyphicon-trash"></span> --}}
                                                <i class="fa fa-trash"></i> {{-- <a href="{{route('computer.destroy', $computer->id)}}"><i class="fa fa-trash"></i></a>                                            --}}
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