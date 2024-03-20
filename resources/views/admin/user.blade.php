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
{{--                <td>--}}
{{--                    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success">Bijwerken</a>--}}
{{--                    <a class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Verwijderen</a>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        // function deleteReservation(id) {
        //     axios.put(`/api/reservation/delete/${id}`)
        //         .then(response => {
        //             window.location.reload();
        //         })
        //         .catch(error => {
        //
        //         });
        // }
    </script>
@endsection
