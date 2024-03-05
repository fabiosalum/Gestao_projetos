 <!-- Modal Editar Etapa-->
 <div class="modal fade" id="editaretapa-{{ $etapa->id }}" tabindex="-1" role="dialog" aria-labelledby=""
     aria-hidden="true">
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
                 <form action="{{route('etapas.update', $etapa->id )}}" method="GET" class="forms-sample">
                     @csrf
                     <div class="form-group">
                         <h6>Nome do Projeto: {{ $projeto->nome }}</h6>

                         <div class="d-none" name="projeto_id">{{ $projeto->id }}</div>
                         <input type="text" class="form-control d-none" name="projeto_id"
                             value="{{ $projeto->id }}">

                     </div>
                     <div class="row">
                     <div class="form-group col-md-12">
                         <label class="float-left" for="nome">Nome da Etapa</label>
                         <input type="text" class="form-control" id="nome" name="nome" value="{{$etapa->nome}}">
                     </div>
                     <div class="form-group col-md-6">
                         <label class="float-left" for="data_entrega">Data de entrega</label>
                         <input type="date" class="form-control" name="data_entrega" value="{{$etapa->data_entrega}}">
                     </div>
                     <div class="form-group col-md-6">
                         <label class="float-left" for="data_entrega">Data de início</label>
                         <input type="date" class="form-control" name="data_inicio" value="{{$etapa->data_inicio}}">
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary modal-close"
                             data-dismiss="modal">Fechar</button>
                         <button type="submit" class="btn btn-primary">Salvar</button>
                     </div>
                    </div>
                 </form>
        </div>
    </div>
</div>
