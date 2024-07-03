@if (session()->has('flash'))
    <div class="container mt-4">
        <div id="flashMessage" class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex justify-content-between">
                <p>{{ session('flash') }}</p>
                <button type="button" class="btn fs-5 close-flash btn-sm" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

