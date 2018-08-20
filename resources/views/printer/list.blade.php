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
                    <table id="printer-list" class="display" >
                        <thead>
                            <th>No</th>
                            <th>Tipo</th>
                            <th>Fabricante</th>
                            <th>Modelo</th>
                            <th>Tonner/Cart</th>
                            <th>No Serie</th>
                            <th>IP</th>
                            <th>Setor</th>
                            <th>Status</th>
                            <th style="width: 10px">Detal</th>
                            <th style="width: 10px">Editar</th>
                            <th style="width: 10px">Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($printers as $printer)
                                <tr>
                                    <td></td>
                                    <td style="font-size:0.9em;">{{$printer->type}}</td>
                                    <td style="font-size:0.9em;">{{$printer->manufacturer}}</td>
                                    <td style="font-size:0.9em;">{{$printer->model}}</td>
                                    <td style="font-size:0.9em;">{{$printer->tonner}}</td>
                                    <td style="font-size:0.9em;">{{$printer->serial_number}}</td>
                                    <td style="font-size:0.9em;">{{$printer->ip_address}}</td>
                                    <td style="font-size:0.9em;">{{$printer->sector->initials}}</td>
                                    <td style="font-size:0.9em;">{{$printer->status}}</td>
                                    <td>
                                            <a href="{{ route('printer.show', $printer->id) }}" class="btn">
                                            <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                    <td>
                                        <a href="{{ route('printer.edit', $printer->id) }}" class="btn">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('printer.destroy', $printer->id) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <a href="">
                                            <button type="submit" class="btn"> {{-- <span class="glyphicon glyphicon-trash"></span> --}}
                                                <i class="fa fa-trash"></i> {{-- <a href="{{route('printer.destroy', $printer->id)}}"><i class="fa fa-trash"></i></a>                                            --}}
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