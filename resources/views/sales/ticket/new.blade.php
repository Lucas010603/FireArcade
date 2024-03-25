@extends("sales.components.main")
@section("content")
    <h1>Bestelling(ticket) Toevoegen</h1>
    <form method="post" action="{{route('sales.api.ticket.store')}}" data-handle-errors>
        @csrf
        @method('post')
        <label class="form-label">Product</label>
        <select name="product_id" id="product_id" class="form-select" data-error-message="Selecteer een Product">
            <option selected disabled value="">Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}"> {{ $product->name}} ({{ $product->serial }})</option>
            @endforeach
        </select>
        <br>
        <label class="form-label">Klant</label>
        <select name="customer_id" id="customer_id" class="form-select" data-error-message="Selecteer een Klant">
            <option selected disabled value="">Klant</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"> {{ $customer->full_name ?? '' }}</option>
            @endforeach
        </select>
        <br>
        <div class="mb-3">
            <label class="form-label">Opmerking</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Opmerking"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="extended_warenty" >Verlengde garantie</label>
            <input id="extende_warenty" name="extended_warenty" type="checkbox" class="btn btn-primary">
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

