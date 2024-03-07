<style>

    .logout-btn{
        font-family: inherit;
        outline: none;
        text-decoration: none;
        color: #e6e6e6;
        border: none;
        background-color: transparent;

    }

    .logout-btn-2{
        font-family: inherit;
        outline: none;
        text-decoration: none;
        color: #e6e6e6;
        border: none;
        background-color: transparent;

    }

    .logout-btn {
      transition-duration: 0.4s;
    }

    .logout-btn:hover {
      background-color: #4D83FF;
      color: white;
      display: block;
    }

    .logout-btn-2:hover {

        color: white;
    }

    .esconde{
      display: none;

    }

    .sidebar-hide .sidebar.sidebar-hide-to-small{
      position: fixed;
    }


</style>

@php

    $user = Auth::user();


@endphp

<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano ">
      <div class="nano-content">
        <div class="logo"><a href="{{route('dashboard')}}"><h6 style="color: white; text-align: left; padding-left: 20px ">Gestão de Projetos</h6></a></div>
        <ul>
          <li class="label">MENU</li>
          <li><a href="{{route('dashboard')}}" ><i class="ti-home"></i> Dashboard</a></li>

          @if ($user->eh_admin == '1')

            <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Cadastros <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                <ul>
                {{-- <li><a href="{{route('cadastro.areaconhecimento')}}">Área do conhecimento</a></li> --}}
                <li><a href="{{route('disciplina.index')}}">Disciplinas</a></li>
                </ul>
            </li>
            <li><a href="{{route('usuarios.index')}}"><i class="ti-user"></i>Usuários</a></li>

          @endif


          <li><a href="{{route('projetos.index')}}"><i class="fa fa-list"></i>Projetos</a></li>

          <li><a href="{{route('notificacao.index')}}"><i class="ti-comment-alt"></i>Enviar Notificação</a></li>

          <li><a href="{{route('projetos.arquivo.show')}}"><i class="ti-briefcase"></i>Arquivados</a></li>

          <li class="logout-btn">
            <form action="{{route('logout')}}" method="POST">
              @csrf
                <button class="logout-btn-2 ml-2 mt-2 p-15 d-block" type="submit"><i class="ti-close"></i>Sair</a></li>
            </form>
          </li>
        </ul>
      </div>
    </div>
</div>
<!-- /# sidebar -->

@push('scripts')

<script>
$(".hamburger").on('click', function() {
        $(".logo").toggleClass("esconde");
    });

</script>
@endpush

