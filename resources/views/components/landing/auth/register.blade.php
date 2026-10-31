<div class="modal-overlay" id="regModal" role="dialog" aria-modal="true" aria-labelledby="regTitle">
    <div class="modal-box">
        <button class="icon-btn modal-close" data-close aria-label="Tutup">&times;</button>
        <div class="progress" id="progress"><span class="done"></span><span></span><span></span></div>
        <form id="regForm" novalidate>
            <div class="form-step active" data-step="1">
                <div class="modal-eyebrow">Langkah 1 dari 2</div>
                <h3 id="regTitle">Data pemilik & toko</h3>
                <p class="modal-sub">Data ini diperiksa Super Admin sebelum database toko dibangun.</p>
                <div class="field-row">
                    <div class="field"><label for="ownerName">Nama pemilik</label><input type="text" id="ownerName"
                            required placeholder="cth. Siti Rahmawati" autocomplete="name"></div>
                    <div class="field"><label for="storeName">Nama toko</label><input type="text" id="storeName"
                            required placeholder="cth. Apotek Sehat"></div>
                </div>
                <div class="field-row">
                    <div class="field"><label for="ownerPhone">No. WhatsApp</label><input type="tel"
                            id="ownerPhone" required placeholder="08xx-xxxx-xxxx" pattern="[0-9+\-\s]{9,16}"
                            autocomplete="tel"></div>
                    <div class="field"><label for="storeCity">Kota</label><input type="text" id="storeCity" required
                            placeholder="cth. Pati"></div>
                </div>
                <div class="field-row">
                    <div class="field"><label for="ownerEmail">Email</label><input type="email" id="ownerEmail"
                            required placeholder="pemilik@apotek.id" autocomplete="email"></div>
                    <div class="field"><label for="ownerPassword">Password</label><input type="password"
                            id="ownerPassword" required autocomplete="new-password"><button type="button"
                            id="psToggle" aria-label="Tampilkan kata sandi"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <div class="field"><label for="storeAddress">Alamat toko</label><input type="text" id="storeAddress"
                    required placeholder="Jl. ..., No. ..., Kecamatan"></div>
            <div class="modal-actions"><span></span><button type="button" class="btn btn-primary"
                    id="nextBtn">Lanjut</button></div>
    </div>
    <div class="form-step" data-step="2">
        <div class="modal-eyebrow">Langkah 2 dari 2</div>
        <h3>Peran akses & mesin database</h3>
        <p class="modal-sub">Pilih peran yang dipakai toko ini dan mesin database yang akan dibangun
            sistem.</p>
        <span class="lbl">Peran akses toko</span>
        <div class="role-grid" id="roleGrid"></div>
        <span class="lbl">Mesin database</span>
        <div id="engineList"></div>
        <div class="form-error" id="regError" role="alert"></div>
        <div class="modal-actions"><button type="button" class="btn btn-ghost" id="prevBtn">Kembali</button><button
                type="submit" class="btn btn-primary" id="submitBtn">Kirim Pendaftaran</button></div>
    </div>
    <div class="form-step" data-step="3">
        <div class="success-icon">✓</div>
        <h3>Pendaftaran terkirim</h3>
        <p class="modal-sub" id="successMsg"></p>
        <span class="status-pill">status: menunggu persetujuan Super Admin</span>
        <p class="calc-note" style="margin-top:16px">Karena ini prototipe, Anda bisa langsung melihat
            pratinjau dashboard. Di sistem sebenarnya, akses terbuka setelah disetujui.</p>
        <div class="modal-actions"><span></span><button type="button" class="btn btn-primary" id="goDashboard">Lihat
                Pratinjau Dashboard</button></div>
    </div>
    </form>
</div>
{{-- <div class="toast" id="toast" role="status"></div> --}}
