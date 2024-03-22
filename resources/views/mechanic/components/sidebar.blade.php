<link href="{{ asset('public_mechanic/css/sidebar.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('mechanic.ticket') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-dashboard'></i>
                <span>Ticket overzicht</span>
            </li>
        </a>
        <a href="{{ route('mechanic.product') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-add-to-queue'></i>
                <span>product overzicht</span>
            </li>
        </a>
        <a href="{{ route('mechanic.personal') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-add-to-queue'></i>
                <span>Mijn tickets</span>
            </li>
        </a>



    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>

