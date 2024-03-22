@extends("components-maikel.admin-main")
@section('content')

    <table id="productTable" class="table">
        <thead>
            <tr>
                <th>Product naam</th>
                <th>Serienummer</th>
                <th>Contract start datum</th>
                <th>Contract eind datum</th>
                <th>Contract</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->serial }}</td>
                <td>{{ $product->contract_start?->format("d-m-Y H:i") ?? "n.t.b." }}</td>
                <td>{{ $product->contract_end?->format("d-m-Y H:i") ?? "n.t.b." }}</td>
                <td>{{ $product->contract ?? "n.t.b." }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success">Bijwerken</a>
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
            axios.put(`/adminportal/api/adminportal/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {

                });
        }
    </script>
@endsection
