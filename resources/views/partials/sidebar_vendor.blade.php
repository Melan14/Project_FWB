<div class="sidebar d-flex flex-column justify-content-between" style="height: 100vh;">
    <div>
        <h4 class="text-center mt-3"><i class="fa-solid fa-store"></i> Culinary Vendor</h4>
        <a href="{{ url('/vendor') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="{{ route('vendor.spots') }}"><i class="fa-solid fa-map-location-dot"></i> Daftar Kuliner</a>
        <a href="{{ route('vendor.reviews') }}"><i class="fa-solid fa-star-half-stroke"></i> Review</a>
        <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i> Profil</a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="m-3">
        @csrf
        <button class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </button>
    </form>
</div>
