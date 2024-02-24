@extends('admin.layouts.master')
@section('content')
    @push('styles')
        <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    @endpush


    <div class="main container-fluid">

        <div class="row d-flex justify-content-end">

            <div>
                <a href="" data-toggle="modal" data-target="#adduser" type="submit"
                    class="btn btn-success btn-flat btn-addon m-b-10 m-l-2 mt-4 mr-5"><i class="ti-plus"></i>Add Usuário</a>
            </div>
        </div>

        <ul>
            @foreach ($errors->all() as $erro)
                <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
            @endforeach
        </ul>





        <table id="user" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Administrador</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ($user->eh_admin == '1') ? 'Sim' : '-' }}</td>

                         <!-- documentação toogle /#https://gitbrent.github.io/bootstrap4-toggle/-->
                         <td>
                            <input type="checkbox" class="toggle-class" data-id="{{ $user->id }}"
                                data-onstyle="success" data-offstyle="danger" data-on="Ativado"
                                data-off="Desativado" data-toggle="toggle" data-size="xs"
                                {{ $user->status ? 'checked' : '' }}>
                        </td>

                        <td>
                            <a href="#useredit-{{ $user->id }}" data-toggle="modal"
                                class="btn btn-primary m-b-10 m-l-5"><i class="ti-pencil"></i></a>


                             {{-- <a href="javascript:if(confirm('Deseja realmente excluir o usuário {{ $user->name }}?')){
                            window.location.href = '{{ route('usuarios.excluir', $user->id) }}'
                        }" class="btn btn-danger m-b-10 m-l-5"><i class="ti-trash"></i></a> --}}

                                @include('admin.usuarios.editar')


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






    <!-- Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar Usuário</h5>
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
                    <form action="{{ route('usuarios.store') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control"  name="name" value="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control"  name="email" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control"  name="password" value="">
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="eh_admin"> É Administrador?
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


    @push('scripts')
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

        <script>
            $('#user').DataTable({

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
                    var user_id = $(this).data('id');


                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/userchangeStatus',
                        data: {
                            'status': status,
                            'user_id': user_id
                        },
                        success: function(data) {
                            console.log(data.success)
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert(
                                'Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.');
                        }

                    });
                });
            });
        </script>

    @endpush

@endsection
