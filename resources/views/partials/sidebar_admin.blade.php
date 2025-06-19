<div class="sidebar d-flex flex-column">
    <h4><i class="fa-solid fa-user-shield"></i> Culinary Admin</h4>

    <a href="{{ url('/admin') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="{{ route('admin.users') }}"><i class="fa-solid fa-users"></i> Kelola Pengguna</a>
    <a href="{{ route('admin.reviews') }}"><i class="fa-solid fa-star"></i> Kelola Review</a>
    <a href="{{ route('admin.reports') }}"><i class="fa-solid fa-chart-line"></i> Laporan</a>
    <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i> Profil</a>

    {{-- Tombol Logout di bagian bawah --}}
    <div class="mt-auto px-3 pb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="d-flex align-items-center w-100 px-3 py-2 border-0 bg-transparent text-white">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
