@extends("sales.components.main")

@section("content")
    <div class="overflow-auto">
        <table id="customerTable" class="table">
            <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Klant soort</th>
                <th scope="col">Land</th>
                <th scope="col">Stad</th>
                <th scope="col">Telefoonnummer</th>
                <th scope="col">Postcode</th>
                <th scope="col">Bankrekening nummer</th>
                <th scope="col">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->type->name }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ $customer->postal_code }}</td>
                    <td>
                    <span class="bank-account" onclick="toggleBankAccount({{$customer->id}})"  data-account="{{ $customer->bank_account_number }}">........</span>
                    <i class='bx bx-show-alt' id="toggleBankAccount{{$customer->id}}" onclick="toggleBankAccount({{$customer->id}})"></i>
                    </td>
                    <td>
{{--                        <a href="{{ route('room.edit', ['id' => $room->id]) }}" class="btn btn-success">Bijwerken</a>--}}
                        <a class="btn btn-danger" onclick="deleteCustomer({{$customer->id}})">Verwijderen</a>
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
        function deleteCustomer(id) {
            axios.put(`/sales/api/customer/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error);
                });
        }
        function toggleBankAccount(id) {
            let container = $('#toggleBankAccount' + id);
            let bankAccount = $('.bank-account');
            console.log(bankAccount);
            let icon = container.find('.bx');
            let accountNumber = bankAccount.data('account');
            console.log(accountNumber)
            let dots = bankAccount.html();
            alert(dots)

            if (dots === '........') {
                bankAccount.html(accountNumber);
                icon.removeClass('bx-show-alt').addClass('bx-hide');
            } else {
                bankAccount.html('........');
                icon.removeClass('bx-hide').addClass('bx-show-alt');
            }
        }
    </script>

@endsection
