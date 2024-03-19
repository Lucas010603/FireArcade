@extends("mechanic.components.main")

@section('content')
    <h1>Producten overzicht</h1>
    <table id="productTable" class="table">
        <thead>

        <tr>
            <th scope="col">id</th>
            <th scope="col">serial</th>
            <th scope="col">contract_start</th>
            <th scope="col">contract_end</th>
            <th scope="col">Actie</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->serial }}</td>
                                <td>{{ $product->contract_start }}</td>
                                <td>{{ $product->contract_end }}</td>

                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Bijwerken</a>
                                    <a class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Verwijderen</a>
                                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function deleteProduct(id) {
            axios.put(`/mechanic/api/product/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection

