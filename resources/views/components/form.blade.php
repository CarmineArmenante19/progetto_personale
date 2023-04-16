@if (Route::currentRouteName()=='register')
<form class="bg-b" method="POST" action="{{route('register')}}">
    @csrf
    <form>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-envelope fa-2x text-g"></i></label>
            <input type="email" name="email" class="form-control" placeholder="inserisci la tua email">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-user fa-2x text-g"></i></label>
            <input type="text" name="name" class="form-control" placeholder="inserisci il tuo nome">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-user fa-2x text-g"></i></label>
            <input type="text" name="surname" class="form-control" placeholder="inserisci il tuo cognome">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-lock fa-2x text-g"></i></label>
            <input type="password" name="password" class="form-control" placeholder="inserisci la tua password">
            <small>
                <p class="p-form-register">Lunghezza: La password dovrebbe essere almeno di 8 caratteri. Più lunga è la password, più difficile è per i criminali informatici indovinarla.</p>
                <p class="p-form-register">Complessità: La password deve contenere una combinazione di lettere minuscole, lettere maiuscole, numeri e simboli speciali come !&*%$#.</p>
            </small>
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-lock fa-2x text-g"></i></label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="conferma la tua password">
        </div>
        <button type="submit" class="btn-register">Registrati</button>
    </form>
</form>
@elseif(Route::currentRouteName()=='login')
<form class="bg-b" method="POST" action="{{route('register')}}">
    @csrf
    <form>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-envelope fa-2x text-g"></i></label>
            <input type="email" name="email" class="form-control" placeholder="inserisci la tua email">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fa-solid fa-lock fa-2x text-g"></i></label>
            <input type="password" name="password" class="form-control" placeholder="inserisci la tua password">
        </div>
        <button type="submit" class="btn-register">Login</button>
    </form>
</form>
@endif