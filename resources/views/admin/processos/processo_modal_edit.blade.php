    <!-- Modal -->
    <div class="modal fade" id="processoedit-{{ $processo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Processo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="forms-sample">
                        @csrf

                        <div class="row">
                            <div class="d-none"><input type="text" name="etapa_id" value="{{ $etapa->id }}"></div>

                            <div class="form-group col-md-3">
                                <label for="nome">Código_id</label>
                                <input type="text" class="form-control" id="codigo_id" name="codigo_id" value="{{$processo->codigo_id}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data_entrega">Início em</label>
                                <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                                    value="{{$processo->data_incio}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data_entrega">Entregar em</label>
                                <input type="date" class="form-control" id="data_entrega" name="data_entrega"
                                    value="{{$processo->data_entrega}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Disciplina</label>
                                <select class="form-control" name="disciplina">
                                    @foreach ($disciplinas as $disciplina)
                                        <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome do Autor/Responsável</label>
                                <input type="text" class="form-control" id="nome_resp" name="nome_resp" value="{{$processo->autor}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_entrega_autor">Data de entrega do Autor</label>
                                <input type="date" class="form-control" id="data_entrega_autor" name="data_entrega_autor"
                                    value="{{$processo->data_entrega_autor}}">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Simulado</label>
                                    <select class="form-control" name="simulado">
                                        <option value="1" {{ $processo->simulado == true ? 'selected' : '' }}>Disponível</option>
                                        <option value="0" {{ $processo->simulado == false ? 'selected' : '' }}>Não tem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Imagem</label>
                                    <select class="form-control" name="imagem">
                                        <option value="1" {{ $processo->imagem == true ? 'selected' : '' }}>Disponível</option>
                                        <option value="0" {{ $processo->imagem == false ? 'selected' : '' }}>Não tem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Manual</label>
                                    <select class="form-control" name="manual">
                                        <option value="1" {{ $processo->manual == true ? 'selected' : '' }}>Disponível</option>
                                        <option value="0" {{ $processo->manual == false ? 'selected' : '' }}>Não tem</option>
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
