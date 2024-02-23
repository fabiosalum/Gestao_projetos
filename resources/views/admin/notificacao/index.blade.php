@extends('admin.layouts.master')
@section('content')


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>Notificações</h4>

        </div>

        <ul>
            @foreach ($errors->all() as $erro)
                <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
            @endforeach
        </ul>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{route('notificacao.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Projeto</label>
                        <select class="form-control" name="projeto_id">
                            @foreach ($projetos as $proj)
                                <option value="{{$proj->id}}">{{$proj->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tag</label>
                        <select class="form-control" name="tag">

                                <option value="concluído">Concluído</option>
                                <option value="aguardando">Aguardando</option>
                                <option value="verificar">Verificar</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Mensagem</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="3" placeholder="Mensagem" style="height: 139px;" name="msg"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
