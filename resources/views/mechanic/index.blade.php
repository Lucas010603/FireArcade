@extends("mechanic.components.main")

@section('content')
    <table id="ticketTable" class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">type</th>
            <th scope="col">status</th>
            <th scope="col">serienummer</th>
            <th scope="col">klantnaam</th>
            <th scope="col">land</th>
            <th scope="col">stad</th>
            <th scope="col">postcode</th>
            <th scope="col">bankrekeningnummer</th>
            <th scope="col">beschrijving</th>
            <th scope="col">uitgevoerd</th>
            <th scope="col">acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->type }}</td>
                <td>{{ $ticket->status }}</td>
                <td>{{ $ticket->serienummer }}</td>
                <td>{{ $ticket->klantnaam }}</td>
                <td>{{ $ticket->land }}</td>
                <td>{{ $ticket->stad }}</td>
                <td>{{ $ticket->postcode }}</td>
                <td>{{ $ticket->bankrekeningnummer }}</td>
                <td>{{ $ticket->beschrijving }}</td>
                <td>{{ $ticket->uitgevoerd }}</td>
                <td>
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-success">Bijwerken</a>
                    <a class="btn btn-danger" onclick="deleteTicket({{ $ticket->id }})">Verwijderen</a>
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

        function deleteTicket(id) {
            axios.put(`/api/ticket/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection
