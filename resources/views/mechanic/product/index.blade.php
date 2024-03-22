@extends("mechanic.components.main")

@section('content')
    <h1>Producten overzicht</h1>
    <table id="productTable" class="table">
        <thead>

        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Serie nummer</th>
            <th scope="col">contract start</th>
            <th scope="col">contract eind</th>
            <th scope="col">Actie</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->serial }}</td>
                                <td>{{ $product->contract_start }}</td>
                                <td>{{ $product->contract_end }}</td>

                                <td>
                                    <a href="{{ route('mechanic.product.view', $product->id) }}" class="btn btn-success">Inzien</a>

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
    </script>
@endsection

