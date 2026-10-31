<div class="modal-overlay" id="loginModal" role="dialog" aria-modal="true" aria-labelledby="loginTitle">
    <div class="modal-box">
        <button class="icon-btn modal-close" data-close aria-label="Tutup">&times;</button>
        <div class="modal-eyebrow">Akses akun</div>
        <h3 id="loginTitle">Masuk ke Resepta</h3>
        <p class="modal-sub">Gunakan email dan kata sandi yang terdaftar untuk toko Anda.</p>
        <form id="loginForm" method="POST" action="{{ Route::has('login') ? route('login') : '#' }}" novalidate>
            @csrf
            <div class="field"><label for="loginEmail">Email</label><input type="email" id="loginEmail"
                    name="email" required autocomplete="username" placeholder="pemilik@apotek.id"></div>
            <div class="field"><label for="loginPass">Kata sandi</label>
                <div class="pw"><input type="password" id="loginPass" name="password" required
                        autocomplete="current-password" minlength="6"><button type="button" id="pwToggle"
                        aria-label="Tampilkan kata sandi">Tampilkan</button></div>
            </div>
            <div class="login-meta">
                <label class="role-opt" style="border:0;padding:0;background:none"><input type="checkbox"
                        name="remember"> Ingat saya</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                @endif
            </div>
            <div class="form-error" id="loginError" role="alert"></div>
            <button type="submit" class="btn btn-primary" style="width:100%;margin-top:8px"
                id="loginBtn">Masuk</button>
        </form>
        <p class="login-foot">Belum punya akun? <button type="button" data-switch="regModal">Daftarkan
                toko</button></p>
    </div>
</div>
