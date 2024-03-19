@extends("mechanic.components.main")

@section('content')
    <h1>Product Bewerken</h1>
    <form method="post" action="{{ route('api.product.update', ['id' => $product->id]) }}" data-handle-errors>

        @csrf


        <div class="mb-3">
            <label for="email" class="form-label">Serie Nummer</label>
            <input type="text" class="form-control" id="serial" name="serial"
                   data-error-message="Vul een Serie nummer in"
                   placeholder="Serie Nummer"
                   value="{{$product->serial}}">
            @error('serial')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contractStart" class="form-label">contract start</label>
            <input type="datetime-local" id="contractStart" name="contract_start" class="form-control" value="{{$product->contract_start}}">
            @error('contract_start')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contractEnd" class="form-label">contract einde</label>
            <input type="datetime-local" id="contractEnd" name="contract_end" class="form-control" value="{{$product->contract_end}}">
            @error('contract_end')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Bijwerken">
        </div>
    </form>
@endsection

