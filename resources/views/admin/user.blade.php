@extends("components-maikel.admin-main")
@section('content')

    <table id="userTable" class="table">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="{{ route('adminportal.user.edit', ['id' => $user->id]) }}" class="btn btn-success">Bijwerken</a>
                    <a class="btn btn-danger" onclick="deleteUser({{$user->id}})">Verwijderen</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function deleteUser(id) {
            axios.put(`/adminportal/api/adminportal/delete-user/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {

                });
        }
    </script>
@endsection
