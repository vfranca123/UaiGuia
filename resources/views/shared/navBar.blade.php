<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasRightLabel">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        @auth
            <a href="{{ route('logout') }}">Sair</a>
        @endauth

    </div>
</div>
