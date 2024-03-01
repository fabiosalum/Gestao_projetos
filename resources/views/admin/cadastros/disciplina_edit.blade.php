  <!-- Modal -->
  <div class="modal fade" id="disciplinaedit-{{ $disciplina->id }}"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área de
                    conhecimento</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('disciplina.update', $disciplina->id )}}" class="forms-sample" method="POST">

                    @csrf
                    <div class="form-group">
                        <label class="d-flex justify-content-left" for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{$disciplina->nome}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-secondary modal-close"
                            data-dismiss="modal">Fechar</button>
                        <button type="submit"
                            class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
