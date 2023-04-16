@if (Route::currentRouteName()=='register')
<form method="POST" action="{{route('register')}}">
    @csrf
    <form>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-envelope fa-2x text-g"></i></label>
            <input type="email" class="form-control" placeholder="inserisci la tua email">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-user fa-2x text-g"></i></label>
            <input type="name" class="form-control" placeholder="inserisci il tuo nome">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-user fa-2x text-g"></i></label>
            <input type="surname" class="form-control" placeholder="inserisci il tuo cognome">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-lock fa-2x text-g"></i></label>
            <input type="password" class="form-control" placeholder="inserisci la tua password">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-lock fa-2x text-g"></i></label>
            <input type="password_confirmation" class="form-control" placeholder="conferma la tua password">
        </div>
        <button type="submit" class="btn-register">Registrati</button>
    </form>
</form>
@endif