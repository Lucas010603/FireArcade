@extends("sales.components.main")

@section("content")
    <h1>Klant Toevoegen</h1>
    <form method="post" action="{{route('sales.api.customer.store')}}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">naam</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="naam"
                   data-error-message="Vul een geldige naam in">
        </div>
        <label class="form-label">Klantsoort</label>
        <select name="type_id" id="type_id" class="form-select" data-error-message="Selecteer een Klantsoort">
            <option selected disabled value="">Klantsoort</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}"> {{ $type->name ?? '' }}</option>
            @endforeach
        </select>
        <br>
        <div class="mb-3">
            <label class="form-label">Land</label>
            <input type="text" class="form-control" id="country" name="country"
                   placeholder="Land"
                   data-error-message="Vul een land in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefoonnummer</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"
                   placeholder="Telefoonnummer"
                   data-error-message="Vul een Telefoonnummer in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Stad</label>
            <input type="text" class="form-control" id="city" name="city"
                   placeholder="Stad"
                   data-error-message="Vul een stad in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Postcode</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code"
                   placeholder="Postcode"
                   data-error-message="Vul een postcode in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Bankrekeningnummer</label>
            <input type="text" class="form-control" id="full_name" name="bank_account_number"
                   placeholder="Bankrekeningnummer"
                   data-error-message="Vul een bankrekeningnummer in.">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
@endsection

