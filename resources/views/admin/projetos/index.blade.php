@extends('admin.layouts.master')
@section('content')

@push('style')


@endpush

<section id="main-content">


        <div class="d-flex justify-content-end ">
            <a href="" data-toggle="modal" data-target="#criarprojeto" type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Criar novo projeto</a>
        </div>


    <div class="row">

            @if (isset($projeto))

                @foreach ($projeto as $proj)
                <div class="col-lg-3 ml-3">

                    <div class="card card-hover">
                        <div class="stat-widget-two">
                            <div class="stat-content"><a href="javascript:if(confirm('Deseja realmente arquivar o projeto {{$proj->nome}}?')){
                                window.location.href = '{{route('projeto.arquivar', $proj->id)}}'}">
                                <i class="ti-folder row d-flex justify-content-end" data-toggle="tooltip" data-placement="bottom" title="Arquivar" ></i></a>
                                <div class="stat-digit">{{$proj->nome}}  </div>
                                <div class="badge badge-danger" style="font-size: 15px">Data de entrega {{ \Carbon\Carbon::parse($proj->data_entrega)->format('d/m/Y')}}</div>
                                <div class="stat-text"> Série {{$proj->serie}} </div>
                                <div class="stat-text">Volume {{$proj->volume}} </div>
                            </div>
                            <div><a class="btn btn-success btn-block m-b-10" href="{{route('projeto.detalhes', $proj->id)}}">Entrar</a></div>

                        </div>

                    </div>
                </div>
                @endforeach

            @endif
    </div>
    <!-- /# row -->

</section>



 <!-- Modal -->
 <div class="modal fade" id="criarprojeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar projeto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('projetos.store')}}" method="POST" class="forms-sample">
                @csrf
                    <div class="form-group">
                        <label for="nome">Nome do Projeto</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="">
                    </div>
                    <div class="form-group">
                        <label for="data_entrega">Data de entrega</label>
                        <input type="date" class="form-control" id="data_entrega" name="data_entrega" value="">
                    </div>
                    <div class="form-group">
                        <label for="serie">Série</label>
                        <input type="text" class="form-control" id="serie" name="serie" value="">
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="texte" class="form-control" id="volume" name="volume" value="">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Criar Projeto</button>
                    </div>
            </form>
      </div>
    </div>
  </div>


@endsection
