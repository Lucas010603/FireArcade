@extends("components-maikel.admin-main")

@section("content")
    <h1>Product bewerken</h1>
    <form method="post" action="{{ route('adminportal.api.product.update', ['id' => $product->id]) }}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Productnaam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fire Arcade"
                   value="{{$product->name}}" data-error-message="Geef een productnaam op">
        </div>
        <div class="mb-3">
            <label class="form-label">Serienummer</label>
            <input type="text" class="form-control" id="number" name="serial" placeholder="123456789"
                   value="{{$product->serial}}" data-error-message="Geef een geldige kamernaam op">
        </div>
        @if($product->customer)
        <div class="mb-3">
            <label class="form-label">Klant</label>
            <select name="customer_id" id="room" class="form-select" data-error-message="Selecteer een geldige kamer">
                <option selected disabled value="">Klant</option>
                @foreach($customers as $customer)
                    <option {{$customer->id == $product->customer_id ? "selected" : ""}} value="{{ $customer->id }}"> {{ $customer->full_name ?? '' }}
                        ({{ $customer->full_name }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Serienummer</label>
            <input type="text" class="form-control" id="number" name="contract_start" placeholder="123456789"
                   value="{{$product->contract_start}}" data-error-message="Geef een geldige kamernaam op" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Serienummer</label>
            <input type="datetime-local" class="form-control" id="number" name="contract_end" placeholder="123456789"
                   value="{{$product->contract_end}}" data-error-message="Geef een geldige kamernaam op">
        </div>
        @endif
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
