@extends('admin.layouts.master')
@section('content')
@push('styles')
    <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush




<div class="container-fluid">

    <div class="page-header">
        <div class="page-title ">
          <h1>Projetos Arquivados</h1>
        </div>
    </div>


    <div class="card">
        <div class="row">
            <div class="col-md-12">

                <table class="table" id="projetos">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de Entrega</th>
                            <th>Série</th>
                            <th>Volume</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projetos as $projeto)
                            <tr>
                                <td>{{$projeto->nome}}</td>
                                <td>{{$projeto->data_entrega}}</td>
                                <td>{{$projeto->serie}}</td>
                                <td>{{$projeto->volume}}</td>
                                <td><a class="btn btn-warning  m-b-10" href="{{route('projeto.detalhes', $projeto->id)}}"> Exibir </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="footer rodape">
                <p>2024 © Gestão de Projetos - Fábio Salum | <a href="https://www.f2digital.com.br" target="_blank">F2digital</a></p>
            </div>
        </div>
    </div>




@push('scripts')
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    $('#projetos').DataTable({
        buttons: [{
            extend: 'columnToggle',
            columns: 1
        }],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
        }
    });

</script>


 @endpush
 @endsection
