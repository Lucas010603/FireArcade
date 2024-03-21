@extends("components-maikel.admin-main")

@section("content")
    <h1>Gebruiker bewerken</h1>
    <form method="post" action="{{ route('adminportal.api.user.update', ['id' => $user->id]) }}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fire Arcade"
                   value="{{$user->name}}" data-error-message="Geef een productnaam op">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" id="number" name="email" placeholder="example@example.com"
                   value="{{$user->email}}" data-error-message="Geef een geldige kamernaam op">
        </div>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Rol</label>
            <select  id="role" class="form-select" name="role_id" data-error-message="Selecteer een rol">
                <option disabled value="">rollen</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                            @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Het bewerken van gegevens is mislukt, probeer nogmaals.
        </div>
    @endif
@endsection

@section('scripts')
@endsection
