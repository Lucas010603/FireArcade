<link href="{{ asset('public_mechanic/css/sidebar.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('ticket') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Ticket overzicht</span>
            </li>
        </a>
{{--        <a href="{{ route('ticket') }}" class="navItem">--}}
{{--            <li class="menu-item">--}}
{{--                <i class='bx bxs-dashboard'></i>--}}
{{--                <span>Ticket bewerken</span>--}}
{{--            </li>--}}
{{--        </a>--}}

        <a href="{{ route('contract') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-calendar'></i>
                <span>Onderhouds contracten</span>
            </li>
        </a>
        <a href="{{ route('product') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-add-to-queue'></i>
                <span>product overzicht</span>
            </li>
        </a>
        <a href="{{ route('product.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-add-to-queue'></i>
                <span>product aanmaken</span>
            </li>
        </a>
{{--        <a href="{{ route('customer') }}" class="navItem">--}}
{{--            <li class="menu-item">--}}
{{--                <i class='bx bxs-user'></i>--}}
{{--                <span>Klanten</span>--}}
{{--            </li>--}}
{{--        </a>--}}
{{--        <a href="{{ route('customer.new') }}" class="navItem">--}}
{{--            <li class="menu-item">--}}
{{--                <i class='bx bxs-user-plus'></i>--}}
{{--                <span>Klant toevoegen</span>--}}
{{--            </li>--}}
{{--        </a>--}}
{{--        <a href="{{ route('room') }}" class="navItem">--}}
{{--            <li class="menu-item">--}}
{{--                <i class='bx bxs-bed'></i>--}}
{{--                <span>Kamers</span>--}}
{{--            </li>--}}
{{--        </a>--}}
{{--        @if(auth()->user()->role->name == "beheerder")--}}
{{--            <a href="{{ route('room.new') }}" class="navItem">--}}
{{--                <li class="menu-item">--}}
{{--                    <i class='bx bxs-add-to-queue'></i>--}}
{{--                    <span>Kamers toevoegen</span>--}}
{{--                </li>--}}
{{--            </a>--}}
{{--            <a href="{{ route('user') }}" class="navItem">--}}
{{--                <li class="menu-item">--}}
{{--                    <i class='bx bxs-user-detail'></i>--}}
{{--                    <span>Medewerkers</span>--}}
{{--                </li>--}}
{{--            </a>--}}
{{--            <a href="{{ route('user.new') }}" class="navItem">--}}
{{--                <li class="menu-item">--}}
{{--                    <i class='bx bxs-user-detail'></i>--}}
{{--                    <span>Medewerkers toevoegen</span>--}}
{{--                </li>--}}
{{--            </a>--}}
{{--        @endif--}}
{{--        <li class="menu-item" onclick="signOut()">--}}
{{--            <i class="fas fa-sign-out-alt"></i>--}}
{{--            <span>Uitloggen</span>--}}
{{--        </li>--}}
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>
<script>
    {{--function signOut() {--}}
    {{--    axios.post('{{ route("sign-out") }}')--}}
    {{--        .then(response => {--}}
    {{--            window.location.href = '{{ route("login") }}';--}}
    {{--        })--}}
    {{--        .catch(error => {--}}
    {{--            // Handle error--}}
    {{--            console.error('Error signing out:', error);--}}
    {{--        });--}}
    {{--}--}}
</script>
