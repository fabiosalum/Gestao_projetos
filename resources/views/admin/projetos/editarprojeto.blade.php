    <!-- Modal -->
    <div class="modal fade" id="editarprojeto-{{$proj->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="{{ route('projeto.update', $proj->id) }}" method="GET" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome do Projeto</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$proj->nome}}">
                        </div>
                        <div class="form-group">
                            <label for="data_entrega">Data de entrega</label>
                            <input type="date" class="form-control" id="data_entrega" name="data_entrega" value="{{$proj->data_entrega}}">
                        </div>
                        <div class="form-group">
                            <label for="serie">Série</label>
                            <input type="text" class="form-control" id="serie" name="serie" value="{{$proj->serie}}">
                        </div>
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="texte" class="form-control" id="volume" name="volume" value="{{$proj->volume}}">
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
                                                <input type="checkbox" name="disciplina[]" value="{{ $disciplina->id }}"
                                                {{ $proj->disciplinas->contains($disciplina->id) ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
