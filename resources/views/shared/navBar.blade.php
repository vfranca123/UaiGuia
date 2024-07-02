<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasRightLabel">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <a href="{{ route('evento.index') }}">Eventos</a>
        <a href="{{ route('Adicionarevento.index') }}">Adicionar Eventos</a>
        <a href="{{ route('locais.index') }}">Locais</a>
        <a href="{{ route('Adicionarlocal.index') }}">Adicionar local</a>
        <a href="{{ route('rotas.index') }}">Minhas Rotas</a>
        <a href="{{ route('AdicionarRotas.index') }}">Adicionar Rotas</a>
        @auth
            <a href="{{ route('logout') }}">Sair</a>
        @endauth
        @guest
            <a href="{{ route('login.index') }}">Entrar</a>
        @endguest
    </div>
</div>
