@extends("mechanic.components.main")

@section('content')
    <h1>Product inzien</h1>
    <form method="post" action="{{ route('mechanic.api.product.update', ['id' => $product->id]) }}" data-handle-errors>

        @csrf


        <div class="mb-3">
            <label for="serial" class="form-label">Serie Nummer</label>
            <input disabled type="text" class="form-control" id="serial" name="serial"
                   data-error-message="Vul een Serie nummer in"
                   placeholder="Serie Nummer"
                   value="{{$product->serial}}">

        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input disabled type="text" class="form-control" id="name" name="name"
                   data-error-message="Vul een naam in"
                   placeholder="Naam"
                   value="{{$product->name}}">

        </div>
        <div class="mb-3">
            <label for="contractStart" class="form-label">contract start</label>
            <input disabled type="datetime-local" id="contractStart" name="contract_start" class="form-control" value="{{$product->contract_start}}">

        </div>

        <div class="mb-3">
            <label for="contractEnd" class="form-label">contract einde</label>
            <input disabled type="datetime-local" id="contractEnd" name="contract_end" class="form-control" value="{{$product->contract_end}}">
        </div>




    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Product aanmaken mislukt. probeer het nog eens.
        </div>
    @endif
@endsection

