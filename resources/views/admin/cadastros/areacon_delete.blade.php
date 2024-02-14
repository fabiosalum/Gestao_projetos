@extends('admin.layouts.master')
@section('content')



    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Tem certezar que deseja excluir a Área de Conhecimento {{$conhecimento->nome}} ?</h4>
                <div class="card-title-right-icon">
                </div>
            </div>

                <div class="d-flex justify-content-right">
                    <form action="{{route('cadastros.areaconhecimento.delete', $conhecimento->id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                    &nbsp
                    <a href="{{route('cadastro.areaconhecimento')}}" class="btn btn-dark">Voltar</a>

                </div>

        </div>
        <!-- /# card -->
    </div>


@endsection
