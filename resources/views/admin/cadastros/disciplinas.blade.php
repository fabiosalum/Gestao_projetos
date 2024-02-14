@extends('admin.layouts.master')
@section('content')

<div class="d-flex justify-content-end ">
    <a href="" data-toggle="modal" data-target="#criardisciplina" type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Adicionar nova displina</a>
</div>


@if (isset($disciplinas))
<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>Disciplinas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>Área do Conhecimento</th>
                            <th>Nome</th>
                            <th class="d-flex justify-content-center">Ações</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach ($disciplinas as $disciplina)
                            <tr>
                                <td>{{ $disciplina->area_con->nome }}</td>
                                <td>{{ $disciplina->nome }}</td>
                                <td>
                                    <a href=""  data-toggle="modal" data-target=""  class="btn btn-primary m-b-10 m-l-5"><i class="ti-pencil"></i></a>

                                    <a href="" class="btn btn-danger m-b-10 m-l-5"><i class="ti-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /# card -->
</div>
@endif





 <!-- Modal -->
 <div class="modal fade" id="criardisciplina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar Disciplina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('disciplina.store')}}" method="POST" class="forms-sample">
                @csrf

                <div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Área do Conhecimento</label>
                        <div class="col-md-12">
                            <select name="conhecimento" class="form-control">
                                @foreach ($conhecimento as $con)
                                    <option value="{{$con->id}}">{{$con->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group ml-3 mr-2">
                        <label for="disciplina">Nome da Disciplina</label>
                        <input type="text" class="form-control" id="disciplina" name="disciplina" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Fechar</button>

                        <form action="" method="POST">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>

                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>




@endsection
