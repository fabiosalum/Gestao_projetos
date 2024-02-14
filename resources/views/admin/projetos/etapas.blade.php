@extends('admin.layouts.master')
@section('content')
    @push('style')
    @endpush

    <section id="main-content">


        <div class="d-flex justify-content-end ">
            <a href="" data-toggle="modal" data-target="#criaretapa" type="submit"
                class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Criar Etapa</a>
        </div>



        <div class="col-lg-12">
            <div class="card bg-success">
                <div class="stat-widget-six d-flex justify-content-start ml-4 ">
                    <div class="stat-icon">
                        <i class="ti-layers-alt"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading" style="font-size: 20px; font-weight: 800 ">{{ $projeto->nome }}</div>
                            <div class="stat-text badge badge-warning" style="font-size: 15px; font-weight: 400">Data de
                                Entrega {{ \Carbon\Carbon::parse($projeto->data_entrega)->format('d/m/Y') }}</div>
                            <div class="stat-text">Série {{ $projeto->serie }}</div>
                            <div class="stat-text">Volume {{ $projeto->volume }}</div>
                            <div class="stat-text">Simulado {{ $projeto->simulado == 1 ? 'Disponível' : 'Não' }}</div>
                            <div class="stat-text">Imagem do Capítulo {{ $projeto->imagem == 1 ? 'Disponível' : 'Não' }}
                            </div>
                            <div class="stat-text">Manual {{ $projeto->manual == 1 ? 'Disponível' : 'Não' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="row">

        @if (isset($etapas))
            @foreach ($etapas as $etapa)
                <div class="card ml-4 mt-2 col-md-3" style="background-color: #004795">

                    <div class="stat-widget-six">
                        <div class="stat-icon">
                            <i class="ti-bolt-alt" style="color: #fff"></i>
                        </div>
                        <div class="stat-content d-flex justify-content-start">
                            <div class="text-left dib">
                                <div>
                                    <h3 style="color: #fff">{{ $etapa->nome }}</h3>
                                </div>
                                <div>
                                    <span style="color: #fdaa0d"> Status ->
                                        {{ $etapa->data_incio < $etapa->data_entrega ? 'Em dia' : 'Atrasado' }}</span>
                                </div>
                                <div>
                                    <span style="color: #fff">Data de Início -> </span><span
                                        style="color: #fdaa0d; font-size: 20px">{{ \Carbon\Carbon::parse($etapa->data_inicio)->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <span style="color: #fff">Data de Entrega -> </span><span
                                        style="color: #fdaa0d; font-size: 20px">{{ \Carbon\Carbon::parse($etapa->data_entrega)->format('d/m/Y') }}</span>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div style="transform: scale(0.7); margin-left: -2em  " class="mt-3 col-md-12 ">
                                <a href="{{route('etapa.detalhes', $etapa->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom"
                                    title="Exibir processos"><i class="ti-eye"></i>Exibir</a>

                                <a href="#" data-target="#editaretapa-{{$etapa->id}}" data-toggle="modal" class="btn btn-success"
                                    data-toggle="tooltip" data-placement="bottom" title="Editar Etapa"><i
                                        class="ti-pencil"></i>Editar</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- /# row -->



    <!-- Modal Criar Etapa-->
    <div class="modal fade" id="criaretapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar Etapa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li style="color: red; padding-left:20px; margin-top:20px ">{{ $erro }}</li>
                        @endforeach
                    </ul>
                    <form action="{{ route('etapas.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <h4>Nome do Projeto: {{ $projeto->nome }}</h4>

                            <input type="text" class="form-control d-none" name="projeto_id"
                                value="{{ $projeto->id }}">

                        </div>
                        <div class="form-group">
                            <label for="nome">Nome da Etapa</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="">
                        </div>
                        <div class="form-group">
                            <label for="data_entrega">Data de entrega</label>
                            <input type="date" class="form-control" name="data_entrega" value="">
                        </div>
                        <div class="form-group">
                            <label for="data_entrega">Data de início</label>
                            <input type="date" class="form-control" name="data_inicio" value="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-close"
                                data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Criar Etapa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Editar Etapa-->
        <div class="modal fade" id="editaretapa" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Etapa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <ul>
                            @foreach ($errors->all() as $erro)
                                <li style="color: red; padding-left:20px; margin-top:20px ">{{ $erro }}</li>
                            @endforeach
                        </ul>
                        <form action="" method="POST" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <h4>Nome do Projeto: {{ $projeto->nome }}</h4>
                                <div class="d-none" name="projeto_id">{{ $projeto->id }}</div>
                                <input type="text" class="form-control d-none" name="projeto_id"
                                    value="{{ $projeto->id }}">

                            </div>
                            <div class="form-group">
                                <label for="nome">Nome da Etapa</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="data_entrega">Data de entrega</label>
                                <input type="date" class="form-control" name="data_entrega" value="">
                            </div>
                            <div class="form-group">
                                <label for="data_entrega">Data de início</label>
                                <input type="date" class="form-control" name="data_inicio" value="">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-close"
                                    data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Editar Etapa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



@push('scripts')
@endpush


@endsection
