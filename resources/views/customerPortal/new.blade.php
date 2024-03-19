@extends("components-maikel.main")

@section("content")
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="form-container">
    <div class="form-title">Reparatie aanvraag</div>
    <form method="post" action="{{route('customerportal.api.ticket.store')}}" data-handle-errors>
        @csrf
        @method('post')
        <label class="form-label" for="serienummer">Serienummer product:</label>
        <input class="form-input" type="text" id="serienummer" name="serial" placeholder="1234566789"
               data-error-message="Geef een geldig Serienummer op">
        <label class="form-label" for="postcode">Postcode:</label>
        <input class="form-input" type="text" id="postcode" name="postal_code">
        <label class="form-label" for="probleembeschrijving">Probleembeschrijving:</label>
        <textarea class="form-textarea" id="probleembeschrijving" name="description"></textarea>
        <button class="form-button" type="submit">Versturen</button>
        @error('validation')
        <div class="alert alert-danger">Het product met deze postcode kon niet gevonden worden</div>
        @enderror
        @if(session('success'))
            <div class="alert alert-success">Reparatie ticket is successvol aangemaakt</div>
        @endif
    </form>
</div>
</body>
</html>
@endsection
