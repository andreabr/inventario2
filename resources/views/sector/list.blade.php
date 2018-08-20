<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">Lista de Setores - PAAF</h3> --}}
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
                    <table class="table table-striped">
                        <tbody>
                            <th>Sigla</th>
                            <th>Extenso</th>
                            <th style="width: 10px">Editar</th>
                            <th style="width: 10px">Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($sectors as $sector)
                                <tr>
                                    <td>{{$sector->initials}}</td>
                                    <td>{{$sector->in_full}}</td>
                                    <td>
                                        <a href="{{ route('sector.edit', $sector->id) }}" class="btn">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('sector.destroy', $sector->id) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <a href="">
                                            <button type="submit" class="btn"> {{-- <span class="glyphicon glyphicon-trash"></span> --}}
                                                <i class="fa fa-trash"></i> {{-- <a href="{{route('sector.destroy', $sector->id)}}"><i class="fa fa-trash"></i></a>                                            --}}
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