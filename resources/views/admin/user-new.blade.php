@extends("components-maikel.admin-main")
@section('content')

    <h1>Gebruiker aanmaken</h1>
    <form method="post" action="{{ route('adminportal.api.user.store') }}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fire Arcade"
                   data-error-message="Geef een geldige gebruikersnaam op">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" id="number" name="email" placeholder="example@example.com"
                   data-error-message="Geef een geldige email op">
        </div>
        <div class="mb-3">
            <label class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="wachtwoord"
                   data-error-message="Geef een wachtwoord op">
        </div>
        <div class="mb-3">
            <label class="form-label">Wachtwoord bevestigen</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="bevestig wachtwoord"
                   data-error-message="bevestig het opgegeven wachtwoord">
        </div>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Rol</label>
            <select  id="role" class="form-select" name="role_id" data-error-message="Selecteer een rol">
                <option value="">rollen</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->name == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Gebruiker toevoegen mislukt. probeer het nog eens.
        </div>
    @endif
@endsection
