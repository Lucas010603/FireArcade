<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('reservation.dashboard') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </li>
        </a>

        <a href="{{ route('reservation') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-calendar'></i>
                <span>Reserveringen</span>
            </li>
        </a>
        <a href="{{ route('reservation.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-add-to-queue'></i>
                <span>Nieuwe Reservering</span>
            </li>
        </a>
        <a href="{{ route('Customer') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-user'></i>
                <span>Klanten</span>
            </li>
        </a>
        <a href="{{ route('Customer.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-user-plus'></i>
                <span>Klant toevoegen</span>
            </li>
        </a>
        <a href="{{ route('room') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-bed'></i>
                <span>Kamers</span>
            </li>
        </a>
        @if(auth()->user()->role->name == "beheerder")
            <a href="{{ route('room.new') }}" class="navItem">
                <li class="menu-item">
                    <i class='bx bxs-add-to-queue'></i>
                    <span>Kamers toevoegen</span>
                </li>
            </a>
            <a href="{{ route('user') }}" class="navItem">
                <li class="menu-item">
                    <i class='bx bxs-user-detail'></i>
                    <span>Medewerkers</span>
                </li>
            </a>
            <a href="{{ route('user.new') }}" class="navItem">
                <li class="menu-item">
                    <i class='bx bxs-user-detail'></i>
                    <span>Medewerkers toevoegen</span>
                </li>
            </a>
        @endif
        <li class="menu-item" onclick="signOut()">
            <i class="fas fa-sign-out-alt"></i>
            <span>Uitloggen</span>
        </li>
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content-sidebar")
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
