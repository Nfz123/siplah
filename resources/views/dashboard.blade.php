@if(auth()->user()->isAdmin())
    <!-- Konten khusus untuk admin -->
    <h2>Selamat datang, Admin!</h2>
    <p>Anda memiliki akses penuh ke fitur admin.</p>
@else
    <!-- Konten untuk pengguna biasa -->
    <h2>Selamat datang!</h2>
    <p>Anda adalah pengguna biasa dengan akses terbatas.</p>
@endif