@extends('admin.layouts.master')
@section('content')

    <div class="d-flex justify-content-end ">
        <a href="" data-toggle="modal" data-target="#areaconhecimento" type="submit"
            class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 mt-4 mr-5"><i class="ti-plus"></i>Add Área do
            Conhecimento</a>
    </div>


    @if (isset($a_conhecimento))
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Área do Conhecimento </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nome</th>
                                    <th class="d-flex justify-content-center">Ações</th>
                                </tr>
                            </thead>

                                <tbody>
                                    @foreach ($a_conhecimento as $conhecimento)
                                    <tr>
                                        <td>{{ $conhecimento->id }}</td>
                                        <td>{{ $conhecimento->nome }}</td>
                                        <td>
                                            <a href="#areaconhecimentoedit-{{ $conhecimento->id }}"  data-toggle="modal" data-target=""  class="btn btn-primary m-b-10 m-l-5"><i class="ti-pencil"></i></a>

                                            <a href="{{route('cadastros.areaconhecimento.show', $conhecimento->id)}}" class="btn btn-danger m-b-10 m-l-5"><i class="ti-trash"></i></a>

                                            @include('admin.cadastros.areacon_modal_edit')


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="areaconhecimento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar Área de conhecimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cadastros.areaconhecimento.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="">
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


    @endsection
