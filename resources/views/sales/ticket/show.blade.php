@extends("sales.components.main")

@section("content")
    <h1>Bestelling(ticket)</h1>
    <form method="post" action="{{route('sales.api.customer.store')}}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Product naam</label>
            <input type="text" disabled class="form-control" value="{{$ticket->product->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Product serienummer</label>
            <input type="text" disabled class="form-control" value="{{$ticket->product->serial}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Klant</label>
            <input type="text" disabled class="form-control" value="{{$ticket->product->customer?->full_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Opmerking</label>
            <textarea type="text" disabled class="form-control">{{$ticket->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" disabled class="form-control" value="{{$ticket->status->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Monteur</label>
            <input type="text" disabled class="form-control" value="{{$ticket->user->name ?? "n.t.b."}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Acties</label>
            <textarea type="text" disabled class="form-control">{{$ticket->actions}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Aangemaakt op</label>
            <input type="text" disabled class="form-control" value="{{$ticket->created_at->format("d-m-Y H:i")}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Laatste aanpassing op</label>
            <input type="text" disabled class="form-control" value="{{$ticket->updated_at->format("d-m-Y H:i")}}">
        </div>
    </form>
@endsection

