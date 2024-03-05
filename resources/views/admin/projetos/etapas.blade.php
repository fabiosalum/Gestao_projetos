@extends('admin.layouts.master')
@section('content')
    @push('styles')
        <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
    @endpush

    @php
        $user = Auth::user();
    @endphp

    <section id="main-content">


        <div class="row d-flex justify-content-end">
            @if ($user->eh_admin == '1')
            <div class="d-flex justify-content-end ">
                <a href="" data-toggle="modal" data-target="#criaretapa" type="submit"
                    class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-2"><i class="ti-plus"></i>Criar Etapa</a>
            </div>

            <div class="d-flex justify-content-end ">


                <a href="javascript:if(confirm('Deseja realmente as etapas predefinidas?')){
                    window.location.href = '{{ route('etapas.predefinidas', $projeto->id) }}'
                }"
                    class="btn btn-info btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Criar Etapas
                    Predefinidas</a>

            </div>
            @endif
        </div>

        <ul>
            @foreach ($errors->all() as $erro)
                <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
            @endforeach
        </ul>



        <div class="col-lg-12">
            <div class="card bg-success">
                <div class="stat-widget-six d-flex justify-content-start ml-4 ">
                    <div class="stat-icon">
                        <i class="ti-layers-alt"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading ml-2" style="font-size: 30px; font-weight: 800 ">{{ $projeto->nome }}
                            </div>
                            <div class="stat-text badge badge-warning mt-2"
                                style="font-size: 15px; font-weight: 400; color: #0a4595">Data de
                                Entrega do Projeto {{ \Carbon\Carbon::parse($projeto->data_entrega)->format('d/m/Y') }}
                            </div>
                            <div class="mt-1">Série: {{ $projeto->serie }}</div>
                            <div class="">Volume: {{ $projeto->volume }}</div>

                        </div>

                    </div>

                </div>
                {{-- <div class="d-flex justify-content-end ml-4">
                    <a href="{{route('todos.processos', $projeto->id)}}" class="btn btn-dark"> Visualizar todos os processos</a>
                </div> --}}
            </div>
        </div>

    </section>


    <div class="main-container p-5 m-5">
        <table id="etapas" class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome da Etapa</th>
                    <th>Data de Início</th>
                    <th>Data de Entrega</th>
                    <th>Status</th>
                    <th style="text-align: center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etapas as $etapa)
                    <tr>
                        <td>{{ $etapa->id }}</td>
                        <td>{{ $etapa->nome }}</td>
                        <td><span class="badge badge-success" style="font-size: 15px">
                            {{ \Carbon\Carbon::parse($etapa->data_inicio)->format('d/m/Y') }}</span> </td>

                        <td><span class="badge badge-danger" style="font-size: 15px">
                            {{ \Carbon\Carbon::parse($etapa->data_entrega)->format('d/m/Y') }}</span></td>

                        <td>{{ $etapa->data_incio < $etapa->data_entrega ? 'Em dia' : 'Atrasado' }}</td>

                        <td>
                            <a href="{{ route('etapa.detalhes', ['id' => $etapa->id, 'projeto_id' => $etapa->projeto_id])}}" class="btn btn-primary"
                                data-toggle="tooltip" data-placement="bottom" title="Exibir Etapa"><i
                                    class="ti-eye mr-2"></i>Exibir</a>

                            @if ($user->eh_admin == '1')
                                <a href="#editaretapa-{{ $etapa->id }}" data-toggle="modal"
                                    class="btn btn-success" data-toggle="tooltip" data-placement="bottom"
                                    title="Editar Etapa"><i class="ti-pencil"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir esse etapa?')){
                                    window.location.href = '{{ route('etapa.excluir', $etapa->id) }}'
                                }"
                                class="btn btn-danger" data-toggle="tooltip" data-placement="bottom"
                                title="Excluir Etapa"><i class="ti-trash"></i></a>

                                @include('admin.projetos.editar')
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer rodape">
                    <p>2024 © Gestão de Projetos - Fábio Salum | <a href="https://www.f2digital.com.br" target="_blank">F2digital</a></p>
                </div>
            </div>
        </div>

    </div>





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
                <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

                <script>
                    $('#etapas').DataTable({
                        buttons: [{
                            extend: 'columnToggle',
                            columns: 1
                        }],
                        pageLength: 25,

                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                        }
                    });
                </script>
            @endpush
        @endsection
