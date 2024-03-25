@extends('mechanic.components.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Ticket Bewerken</h1>
        <form method="post" action="{{ route('mechanic.api.ticket.update', ['id' => $ticket->id]) }}" data-handle-errors>
            @csrf
            @php
                $currentDate = now()->toDateString();
                $contractExpired = $ticket->product->contract_end < $currentDate;
            @endphp
            @if($contractExpired)
                <div class="alert alert-warning" role="alert">
                    Waarschuwing, het contract is verlopen.
                </div>
            @endif
            <div class="mb-3">
                <label for="serial" class="form-label">Serie Nummer</label>
                <input disabled type="text" class="form-control" id="serial" name="serial"
                       placeholder="Serie Nummer"
                       value="{{ $ticket->product->serial }}"
                       data-error-message="Vul een Serie nummer in">
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="contractStart" class="form-label">Contract Start</label>
                    <input disabled type="datetime-local" id="contractStart" name="contract_start" class="form-control" value="{{ $ticket->product->contract_start }}">
                </div>
                <div class="col-md-6">
                    <label for="contractEnd" class="form-label">Contract Einde</label>
                    <input disabled type="datetime-local" id="contractEnd" name="contract_end" class="form-control" value="{{ $ticket->product->contract_end }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="customer_id" class="form-label">De klant</label>
                <select disabled name="customer_id" id="customer_id" class="form-select" data-error-message="Selecteer een klant">
                    <option disabled value="">Klant</option>
                    @foreach($customer as $customers)
                        @if($ticket->product->customer && $ticket->product->customer->id == $customers->id)
                            <option value="{{ $customers->id }}" selected>{{ $customers->full_name }}</option>
                        @else
                            <option value="{{ $customers->id }}">{{ $customers->full_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="country" class="form-label">Land</label>
                    <input disabled type="text" id="country" name="country" class="form-control" value="{{ $ticket->product->customer->country }}">
                </div>
                <div class="col-md-6">
                    <label for="City" class="form-label">Stad</label>
                    <input disabled type="text" id="City" name="City" class="form-control" value="{{ $ticket->product->customer->city }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postcode</label>
                <input disabled type="text" id="postal_code" name="postal_code" class="form-control" value="{{ $ticket->product->customer->postal_code }}">
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Het product</label>
                <select disabled name="product_id" id="product_id" class="form-select" data-error-message="Selecteer een product">
                    <option disabled value="">Product</option>
                    @foreach($product as $products)
                        <option value="{{ $products->id }}" {{ $ticket->product->id == $products->id ? 'selected' : '' }}>{{ $products->serial }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Beschrijving:</label>
                <textarea disabled id="description" name="description" rows="4" class="form-control" style="resize: none">{{ $ticket->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="action" class="form-label">Uitgevoerd:</label>
                <textarea {{ $ticket->status_id == 4 || $ticket->status_id == 3 ? 'disabled' : '' }} id="action" name="action" rows="4" class="form-control" style="resize: none">{{ $ticket->actions }}</textarea>
            </div>
            <div class="mb-3">
                @if(Auth::user()->id == $ticket->user_id && $ticket->status_id == 1 || $ticket->status_id == 2)
                    <button type="submit" class="btn btn-primary me-2">Bijwerken</button>
                @endif
                @if($ticket->status_id == 2)
                    <a class="btn btn-success" onclick="finishTicket({{ $ticket->id }})">Afronden</a>
                @endif
                @if($ticket->status_id == 1 || $ticket->status_id == 2)
                    <a class="btn btn-danger" onclick="deleteTicket({{ $ticket->id }})">Annuleren</a>
                @endif
            </div>
        </form>
        @if(count($errors))
            <div id="form-submit-fail" class="alert alert-danger" role="alert">
                Ticket bewerken mislukt. Probeer het opnieuw.
            </div>
        @endif
    </div>
    <script>
        function finishTicket(id) {
            axios.post(`/mechanic/api/ticket/finnish/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }

        function deleteTicket(id) {
            axios.put(`/mechanic/api/ticket/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection
