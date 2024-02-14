@extends('admin.layouts.master')
@section('content')
    @push('styles')
        <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    @endpush

    <div class="main container-fluid">

        <div class="row d-flex justify-content-end">
            <div>
                <a href="{{route('projeto.detalhes', $etapa->projeto_id)}}"
                    class="btn btn-dark btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-1"><i class="ti-angle-left"></i>Voltar</a>
            </div>

            <div>
                <a href="" data-toggle="modal" data-target="#criarprocesso" type="submit"
                    class="btn btn-success btn-flat btn-addon m-b-10 m-l-2 mt-4 mr-5"><i class="ti-plus"></i>Add Processo</a>
            </div>
        </div>

        <div>
            <button class="btn btn-primary mb-10 ml-3" type="button" data-toggle="collapse" data-target="#tabela_status" aria-expanded="false" aria-controls="tabela_status">Mostrar status de etapas</button>
            <div class="container-fluid">
                <div class="card collapse" id="tabela_status">
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Disciplinas</th>
                                        @foreach ($todas_etapas as $et)
                                            <th>{{ $et->nome }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disciplinas as $disciplina)
                                        <tr>
                                            <td>{{ $disciplina->nome }}</td>
                                            @foreach ($todas_etapas as $t_etapas)
                                                <?php $statusEncontrado = false; ?>
                                                @foreach ($todos_processos as $proc)
                                                    @if ($proc->etapa_id == $t_etapas->id && $proc->disciplina_id == $disciplina->id )
                                                        <?php $statusEncontrado = true; ?>
                                                        <td>
                                                            @if ($proc->status == 1)
                                                                <i class="ti-check-box btn btn-success btn-sm m-b-10 m-l-5"></i>
                                                            @else
                                                                <i class="ti-close btn btn-danger btn-sm m-b-10 m-l-5"></i>
                                                            @endif
                                                        </td>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if (!$statusEncontrado)
                                                    <td>-</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Etapa - {{ $etapa->nome }}</h1>


                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 p-l-0 title-margin-left">
                        <div class="page-header page_header_2">
                            <div class="page-title">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{ route('projetos.index') }}">Projetos</a></li>
                                    <li class="breadcrumb-item active">Processos</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>






                <!-- /# row -->


                <table id="processos" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Data de Entrega</th>
                            <th>Código/id</th>
                            <th>Disciplina</th>
                            <th>Autor/Responsável</th>
                            <th>Data entrega Autor/Resp</th>
                            <th>Simulado</th>
                            <th>Imagem</th>
                            <th>Manual</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($processos as $processo)
                            <tr>
                                <td class="badge badge-danger w-50 h-50" style="font-size: 15px">
                                    {{ \Carbon\Carbon::parse($processo->data_entrega)->format('d/m/Y') }}</td>
                                <td>{{ $processo->codigo_id }}</td>
                                <td>{{ $processo->disciplinas->nome }}</td>
                                <td>{{ $processo->autor }}</td>
                                <td>{{ \Carbon\Carbon::parse($processo->data_entrega_autor)->format('d/m/Y') }}</td>
                                <td>{{ $processo->simulado == 1 ? 'Disponível' : 'Não Tem' }}</td>
                                <td>{{ $processo->imagem == 1 ? 'Disponível' : 'Não Tem' }}</td>
                                <td>{{ $processo->manual == 1 ? 'Disponível' : 'Não Tem' }}</td>

                                <!-- /# row -->
                                <!-- documentação toogle /#https://gitbrent.github.io/bootstrap4-toggle/-->
                                <td>
                                    <input type="checkbox" class="toggle-class" data-id="{{ $processo->id }}"
                                        data-onstyle="success" data-offstyle="warning" data-on="Concluído"
                                        data-off="Em andamento" data-toggle="toggle" data-size="xs"
                                        {{ $processo->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="#processoedit-{{ $processo->id }}"  data-toggle="modal" class="btn btn-primary m-b-10 m-l-5"><i class="ti-pencil"></i></a>

                                    <a href="javascript:if(confirm('Deseja realmente excluir esse processo?')){
                                        window.location.href = '{{route('processo.excluir', $processo->id)}}'
                                    }" class="btn btn-danger m-b-10 m-l-5"><i class="ti-trash"></i></a>

                                    @include('admin.processos.processo_modal_edit')


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer rodape">
                            <p>2024 © Gestão de Projetos - Fábio Salum | <a href="www.f2digital.com.br">F2digital</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="criarprocesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar Processo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('processos.store') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="row">
                            <div class="d-none"><input type="text" name="etapa_id" value="{{ $etapa->id }}"></div>
                            <div class="d-none"><input type="text" name="projeto_id" value="{{ $etapa->projeto_id }}"></div>

                            <div class="form-group col-md-3">
                                <label for="codigo_id">Código_id</label>
                                <input type="text" class="form-control" id="codigo_id" name="codigo_id" value="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data_entrega">Entregar em</label>
                                <input type="date" class="form-control" id="data_entrega" name="data_entrega"
                                    value="">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Disciplina</label>
                                <select class="form-control" name="disciplina">
                                    @foreach ($disciplinas as $d)
                                        <option value="{{$d->id}}">{{ $d->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome do Autor/Responsável</label>
                                <input type="text" class="form-control" id="nome_resp" name="nome_resp" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_entrega_autor">Data de entrega do Autor</label>
                                <input type="date" class="form-control" id="data_entrega_autor" name="data_entrega_autor"
                                    value="">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Simulado</label>
                                    <select class="form-control" name="simulado">
                                        <option value="1">Disponível</option>
                                        <option value="0">Não tem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Imagem</label>
                                    <select class="form-control" name="imagem">
                                        <option value="1">Disponível</option>
                                        <option value="0">Não tem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Manual</label>
                                    <select class="form-control" name="manual">
                                        <option value="1">Disponível</option>
                                        <option value="0">Não tem</option>
                                    </select>
                                </div>

                            </div>


                            <div class="modal-footer col-md-12">
                                <button type="button" class="btn btn-secondary modal-close"
                                    data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




        @push('scripts')
            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

            <script>
                $('#processos').DataTable({
                    buttons: [{
                        extend: 'columnToggle',
                        columns: 1
                    }],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                    }
                });

                $(function() {

                    $('.toggle-class').change(function() {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var processo_id = $(this).data('id');

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/changeStatus',
                            data: {
                                'status': status,
                                'processo_id': processo_id
                            },
                            success: function(data) {
                                console.log(data.success)
                            }

                        })

                    });


                });

            </script>
        @endpush
    @endsection
