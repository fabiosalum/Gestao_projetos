 <!-- Modal Editar Etapa-->
 <div class="modal fade" id="editaretapa" tabindex="-1" role="dialog" aria-labelledby=""
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
