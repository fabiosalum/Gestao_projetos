@extends('admin.layouts.master')
@section('content')

    @push('style')
    @endpush


    @php
        $user = Auth::user();
    @endphp

    <section id="main-content">


        <div class="d-flex justify-content-end ">
            <a href="" data-toggle="modal" data-target="#criarprojeto" type="submit"
                class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Criar novo
                projeto</a>
        </div>

        <ul>
            @foreach ($errors->all() as $erro)
                <li style="color: red; padding-left:20px; margin-top:20px ">{{ $erro }}</li>
            @endforeach
        </ul>


        <div class="row">

            @if (isset($projeto))
                @foreach ($projeto as $proj)
                    <div class="col-md-3 ml-3">

                        <div class="card card-hover">
                            <div class="stat-widget-two">
                                @if ($user->eh_admin == '1')
                                    <div class="stat-content"><a
                                            href="javascript:if(confirm('Deseja realmente arquivar o projeto {{ $proj->nome }}?')){
                                window.location.href = '{{ route('projeto.arquivar', $proj->id) }}'}">
                                            <i class="ti-folder row d-flex justify-content-end" data-toggle="tooltip"
                                                data-placement="bottom" title="Arquivar"></i></a>
                                    </div>
                                @endif
                                <div class="stat-digit">{{ $proj->nome }} </div>
                                <div class="badge badge-danger" style="font-size: 15px">Data de entrega
                                    {{ \Carbon\Carbon::parse($proj->data_entrega)->format('d/m/Y') }}</div>
                                <div class="stat-text"> Série {{ $proj->serie }} </div>
                                <div class="stat-text">Volume {{ $proj->volume }} </div>
                            </div>
                            <div class="row justify-content-center">
                                <a class="btn btn-success col-md-5 m-b-10"
                                    href="{{ route('projeto.detalhes', $proj->id) }}">Entrar</a>

                                <a href="#editarprojeto-{{$proj->id}}" data-toggle="modal" data-target=""
                                class="btn btn-primary col-md-5 m-b-10 ml-2">Editar</a>

                                @include('admin.projetos.editarprojeto')
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>


        <!-- /# row -->

    </section>
    <div class="d-block">
        <div class="col-lg-12">
            <div class="footer rodape">
                <p>2024 © Gestão de Projetos - Fábio Salum | <a href="https://www.f2digital.com.br" target="_blank">F2digital</a></p>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="criarprojeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar projeto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projetos.store') }}" method="POST" class="forms-sample">
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

                        <div>
                            <h6>Quais disciplinas vão participar desse projeto?</h6>
                        </div>

                        <div class="row">
                            @foreach ($disciplinas as $disciplina)
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="disciplina[]" value="{{ $disciplina->id }}">
                                                {{ $disciplina->nome }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-close"
                                data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Criar Projeto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
