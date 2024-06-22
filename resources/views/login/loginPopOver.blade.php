<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <a href="#" data-bs-dismiss="modal" class="text-decoration-none text-black m-3">x</a>

            <div class="d-flex flex-column justify-content-center align-items-center m-3">
                <a href="{{ route('login.index') }}"class="text-decoration-none btn btn-primary m-2">Entrar</a>
                <a href="{{ route('locais.index') }}" class="m-2">Entrar como convidado</a>
                <a href="{{ route('cadastro.index') }}" class="text-black text-decoration-none m-2">Não tem conta ainda
                    ? faça o cadastro!</a>
            </div>
        </div>
    </div>
</div>
