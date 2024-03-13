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
    <form action="#" method="post">
        @method('post')
        <label class="form-label" for="serienummer">Serienummer product:</label>
        <input class="form-input" type="text" id="serienummer" name="serienummer" required>
        <label class="form-label" for="postcode">Postcode:</label>
        <input class="form-input" type="text" id="postcode" name="postcode" required>
        <label class="form-label" for="probleembeschrijving">Probleembeschrijving:</label>
        <textarea class="form-textarea" id="probleembeschrijving" name="probleembeschrijving" required></textarea>
        <button class="form-button" type="submit">Versturen</button>
    </form>
</div>
</body>
</html>
@endsection
