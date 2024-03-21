@extends("sales.components.main")

@section("content")
    <div class="overflow-auto">
        <table id="customerTable" class="table">
            <thead>
            <tr>
                <th scope="col">Product naam</th>
                <th scope="col">Product serienummer</th>
                <th scope="col">Klant</th>
                <th scope="col">Omschrijving</th>
                <th scope="col">Acties</th>
                <th scope="col">Status</th>
                <th scope="col">Aangemaakt op</th>
                <th scope="col">Laatste aanpassing op</th>
                <th scope="col">Acties</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($tickets as $ticket)
                @php
                    $badgeColor = $ticket->status->id == 1 ? "secondary" : ($ticket->status->id == 3 ? "success" : ($ticket->status->id == 4 ? "danger" : "primary"));
                @endphp
                <tr>
                    <td>{{ $ticket->product->name }}</td>
                    <td>{{ $ticket->product->serial }}</td>
                    <td>{{ $ticket->product->customer?->full_name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($ticket->description, 20, '...') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($ticket->actions, 20, '...') }}</td>
                    <td><span class="badge bg-{{$badgeColor}}">{{ $ticket->status->name }}</span></td>
                    <td>{{ $ticket->created_at->format("d-m-Y H:i") }}</td>
                    <td>{{ $ticket->updated_at->format("d-m-Y H:i") }}</td>
                    <td>
                        <a href="{{ route('sales.ticket.show', ['id' => $ticket->id]) }}" class="btn btn-primary">Inzien</a>
                    @if($ticket->status_id == 1)
                            <a onclick="cancelTicket({{$ticket->id}})" class="btn btn-danger">Annuleren</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#customerTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function cancelTicket(id){
            axios.put(`/sales/api/ticket/cancel/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error);
                });
        }
    </script>

@endsection
