@extends("mechanic.components.main")

@section('content')
    <table id="ticketTable" class="table">
        <thead>
        <tr>

            <th scope="col">type</th>
            <th scope="col">status</th>
            <th scope="col">serienummer</th>
            <th scope="col">klantnaam</th>
            <th scope="col">monteur</th>
            <th scope="col">Laatste aanpassing op</th>
            <th scope="col">beschrijving</th>
            <th scope="col">uitgevoerd</th>
            <th scope="col">acties</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
            @php
                $badgeColor = $ticket->status->id == 1 ? "secondary" : ($ticket->status->id == 3 ? "success" : ($ticket->status->id == 4 ? "danger" : "primary"));
            @endphp
            <tr>
                <td>{{ $ticket->type->name }}</td>
                <td><span class="badge bg-{{$badgeColor}}">{{ $ticket->status->name }}</span></td>
                <td>{{ $ticket->product->serial }}</td>
                <td>{{ $ticket->product->customer->full_name ?? '' }}</td>
                <td>{{ $ticket->user?->name ?? "" }}</td>
                <td>{{ $ticket->updated_at->format("d-m-Y H:i") }}</td>
                <td>{{ $ticket->description }}</td>
                <td>{{ $ticket->actions }}</td>

                <td>

                    <div class="mb-3 mt-3">
                        @if($ticket->status_id != 3 && $ticket->status_id != 4 && Auth::user()->id == $ticket->user_id)
                            <a href="{{ route('mechanic.ticket.edit', $ticket->id) }}"
                               class="btn btn-success">Bijwerken</a>
                        @else
                            <a href="{{ route('mechanic.ticket.edit', $ticket->id) }}"
                               class="btn btn-primary">Inzien</a>
                        @endif
                        <div class="mb-3 mt-3">
                            @if(!$ticket->user)
                                @if($ticket->status_id == 1)
                                    <a class="btn btn-primary" onclick="acceptTicket({{ $ticket->id }})">Accepteren</a>
                                @endif
                            @endif
                        </div>
                    </div>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#ticketTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function acceptTicket(id) {
            axios.post(`/mechanic/api/ticket/accept/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection
