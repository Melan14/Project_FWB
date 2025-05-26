<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Culinary Sulbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                @auth
                    @php $role = Auth::user()->role; @endphp

                    {{-- Menu untuk Admin --}}
                    @if($role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="/admin/users">Kelola User</a></li>
                        <li class="nav-item"><a class="nav-link" href="/admin/reviews">Kelola Review</a></li>
                    @endif

                    {{-- Menu untuk Vendor --}}
                    @if($role === 'vendor')
                        <li class="nav-item"><a class="nav-link" href="/vendor/spots">Tempatku</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vendor/reviews">Ulasan</a></li>
                    @endif

                    {{-- Menu untuk Foodie --}}
                    @if($role === 'foodie')
                        <li class="nav-item"><a class="nav-link" href="/spots">Tempat Kuliner</a></li>
                        <li class="nav-item"><a class="nav-link" href="/favorites">Favoritku</a></li>
                    @endif

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link text-white" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                @else
                    {{-- Jika belum login --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
