
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">


                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">

                            <span class="user-avatar">{{$user->name}}
                                <i class="ti-angle-down f-s-10"></i>
                            </span>

                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">

                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a onclick="perfil()" href="#">
                                                <i class="ti-user"></i>
                                                <span>Perfil</span>
                                            </a>
                                        </li>

                                        <li>
                                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="button" onclick="submitProfileForm()" style="background-color: transparent; border: none">
                                                    <i class="ti-power-off"></i>
                                                    <span>Sair</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')


<script>


    function perfil() {
        window.location.href = "{{ route('profile.edit') }}";
    }


    function submitProfileForm() {
        document.getElementById('logoutForm').submit();
    }

</script>

@endpush

