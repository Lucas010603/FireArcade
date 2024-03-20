@extends("sales.components.main")

@section("content")
    <h1>Klant bijwerken</h1>
    <form method="post" action="{{ route('sales.api.customer.update', ['id' => $customer->id]) }}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label" >naam</label>
            <input value="{{$customer->full_name}}" type="text" class="form-control" id="full_name" name="full_name" placeholder="naam"
                   data-error-message="Vul een geldige naam in">
        </div>
        <label class="form-label">Klantsoort</label>
        <select name="type_id" id="type_id" class="form-select" data-error-message="Selecteer een Klantsoort">
            <option selected disabled value="">Klantsoort</option>
            @foreach($types as $type)
                <option {{$type->id == $customer->type->id ? "selected" : ""}} value="{{ $type->id }}">{{ $type->name }} </option>
            @endforeach
        </select>
        <br>
        <div class="mb-3">
            <label class="form-label">Land</label>
            <input value="{{$customer->country}}" type="text" class="form-control" id="country" name="country"
                   placeholder="Land"
                   data-error-message="Vul een land in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefoonnummer</label>
            <input value="{{$customer->phone_number}}" type="text" class="form-control" id="phone_number" name="phone_number"
                   placeholder="Telefoonnummer"
                   data-error-message="Vul een Telefoonnummer in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Stad</label>
            <input value="{{$customer->city}}" type="text" class="form-control" id="city" name="city"
                   placeholder="Stad"
                   data-error-message="Vul een stad in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Postcode</label>
            <input value="{{$customer->postal_code}}" type="text" class="form-control" id="postal_code" name="postal_code"
                   placeholder="Postcode"
                   data-error-message="Vul een postcode in.">
        </div>
        <div class="mb-3">
            <label class="form-label">Bankrekeningnummer</label>
            <input value="{{$customer->bank_account_number}}" type="text" class="form-control" id="bank_account_number" name="bank_account_number"
                   placeholder="Bankrekeningnummer"
                   data-error-message="Vul een bankrekeningnummer in.">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Klant toevoegen mislukt. probeer het nog eens.
        </div>
    @endif
@endsection

