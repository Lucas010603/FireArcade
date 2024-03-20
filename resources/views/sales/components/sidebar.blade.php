<link href="{{ asset('public_sales/css/sidebar.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('sales.customer.index') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bx-user'></i> <!-- Represents users/customers -->
                <span>Klanten</span>
            </li>
        </a>
        <a href="{{ route('sales.customer.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bx-user-plus'></i>
                <span>Klant toevoegen</span>
            </li>
        </a>
        <a href="{{ route('sales.ticket.index') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bx-shopping-bag'></i>
                <span>Bestellingen</span>
            </li>
        </a>
        <a href="{{ route('sales.ticket.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bx-cart-add'></i>
                <span>Bestelling plaatsen</span>
            </li>
        </a>
        <li class="menu-item" onclick="signOut()">
            <i class="fas fa-sign-out-alt"></i>
            <span>Uitloggen</span>
        </li>
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>
<script>
    function signOut() {
        axios.post('{{ route("sign-out") }}')
            .then(response => {
                window.location.href = '{{ route("login") }}';
            })
            .catch(error => {
                // Handle error
                console.error('Error signing out:', error);
            });
    }
</script>
