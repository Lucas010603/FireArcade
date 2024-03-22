@extends("mechanic.components.main")

@section('content')
    <h1>Product aanmaken</h1>
    <form method="post" action="{{ route('mechanic.api.product.store') }}" data-handle-errors>
        @csrf
        <div class="mb-3">
            <label for="serial" class="form-label"> SerieNummer</label>
            <input type="text" class="form-control" id="serial"
                   data-error-message="Vul een geldig serienummer in" name="serial" placeholder="serienummer">

        </div>
        <div class="mb-3">
            <label for="name" class="form-label"> Naam</label>
            <input type="text" class="form-control" id="name"
                   data-error-message="Vul een naam in" name="name" placeholder="Naam">

        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Product aanmaken mislukt. probeer het nog eens.
        </div>
    @endif
@endsection

