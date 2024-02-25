@extends('admin.layouts.master')
@section('content')


@php

    $user = Auth::user();

@endphp


    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Olá, <span>{{$user->name}}</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 p-l-0 title-margin-left">
                    <div class="page-header page_header_2">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->

            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <div class="stat-text"> Total de Usuários</div>
                                    <div class="stat-digit">
                                        <i class="ti-user"></i>{{$users->count()}}
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success w-100" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <div class="stat-text">Projetos em Andamento</div>
                                    <div class="stat-digit">
                                        <i class="ti-time"></i>{{$proj_andamento->count()}}
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary w-100" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <div class="stat-text">Projetos Arquivados</div>
                                    <div class="stat-digit">
                                        <i class="ti-folder"></i>{{$proj_arquivado->count()}}
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning w-100" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <div class="stat-text">Processos Pendentes</div>
                                    <div class="stat-digit">
                                        <i class="ti-pulse"></i>{{$processos->count()}}
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger w-100" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->



                <!-- Notificações -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Notificações </h4>

                        </div>
                        <div class="recent-comment">

                           @if (isset($notificacoes))

                            @foreach ($notificacoes as $not)
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$not->user->name}}</h4>
                                        <p>{{$not->msg}} </p>
                                        <p>Projeto - {{$not->projeto->nome}} </p>

                                        <div class="comment-action">
                                            @if ($not->tag == 'concluído')
                                                <div class="badge badge-success">Concluído</div>
                                            @elseif ($not->tag == 'aguardando')
                                                <div class="badge badge-warning">Aguardando</div>
                                            @elseif ($not->tag == 'verificar')
                                                <div class="badge badge-danger">Verificar</div>
                                            @endif

                                        </div>
                                        <p class="comment-date">{{ \Carbon\Carbon::parse($not->data_msg)->format('d/m/Y')}}</p>
                                        <p class="comment-date mt-3">{{ \Carbon\Carbon::parse($not->created_at)->diffForHumans()}}</p>
                                    </div>

                                </div>
                            @endforeach

                           @endif


                        </div>

                    </div>
                    <div class="pagination">
                        {{ $notificacoes->links() }}
                    </div>
                    <!-- /# card -->
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer rodape">
                            <p>2024 © Gestão de Projetos - Fábio Salum <a href="www.f2digital.com.br">F2digital</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
