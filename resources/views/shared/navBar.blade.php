<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasRightLabel">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column ">
        <hr>
        <div class=" w-100 d-flex flex-column align-items-center">
            <a href="{{ route('evento.index') }}" class="fs-3 text-decoration-none">Eventos</a>
            <a href="{{ route('Adicionarevento.index') }}" class="fs-3 text-decoration-none">Adicionar Eventos</a>
        </div>
        <hr>
        <div class=" w-100 d-flex flex-column align-items-center">
            <a href="{{ route('locais.index') }}" class="fs-3 text-decoration-none">Locais</a>
            <a href="{{ route('Adicionarlocal.index') }}" class="fs-3 text-decoration-none">Adicionar local</a>
        </div>
        <hr>
        <div class=" w-100 d-flex flex-column align-items-center">
            <a href="{{ route('rotas.index') }}" class="fs-3 text-decoration-none">Minhas Rotas</a>
            <a href="{{ route('AdicionarRotas.index') }}" class="fs-3 text-decoration-none">Adicionar Rotas</a>
        </div>
        <hr>
        <div class=" w-100 d-flex flex-column align-items-center">
            @auth
                <a href="{{ route('logout') }}" class="fs-3 text-decoration-none text-warning">Sair</a>
            @endauth
            @guest
                <a href="{{ route('login.index') }}" class="fs-3 text-decoration-none">Entrar</a>
            @endguest
        </div>
    </div>
</div>
