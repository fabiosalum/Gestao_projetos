<div class="modal fade" id="useredit-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <ul class="mt-3">
                    @foreach ($errors->all() as $erro)
                        <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
                    @endforeach
                </ul>

                <div class="modal-body">
                    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" class="forms-sample">
                        @method('PATCH')
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label class="d-flex" for="nome">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="d-flex" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="d-flex" for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" value="">
                            </div>
                            <div class="col-sm-offset-2 col-sm-10 d-flex" >
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {{ $user->eh_admin == '1' ? 'checked' : '' }} name="eh_admin"> É Administrador?
                                    </label>
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
