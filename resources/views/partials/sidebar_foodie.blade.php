<div class="sidebar">
    <h4><i class="fa-solid fa-utensils"></i> Culinary Foodie</h4>

    <a href="{{ url('/foodie') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="{{ route('foodie.favorites') }}"><i class="fa-solid fa-heart"></i> Favorit Saya</a>
    <a href="{{ route('foodie.explore') }}"><i class="fa-solid fa-compass"></i> Eksplor Kuliner</a>
    <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i> Profil</a>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</button>
    </form>
</div>
