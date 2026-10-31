<section class="hero" style="border-top:none">
    <div class="wrap hero-grid">
        <div>
            <span class="eyebrow rise">Akuntansi & Pajak Multi-Apotek</span>
            <h1 class="rise">Buku besar disimpan di toko masing-masing.<span class="line-b">Dibaca sebagai
                    satu neraca.</span></h1>
            <p class="lede rise">Resepta memisahkan database tiap apotek — MySQL, PostgreSQL, atau MongoDB,
                bebas dipilih pemiliknya — lalu menariknya kembali lewat satu API saat menghitung PPN, laba
                rugi, dan restitusi pajak.</p>
            <div class="hero-actions rise">
                <button class="btn btn-primary" data-open="regModal">Daftarkan Apotek Anda</button>
                <button class="btn btn-ghost" data-open="loginModal">Masuk ke Akun</button>
            </div>
            <p class="hero-note rise">$ status: prototipe riset — Informatika & Akuntansi</p>
        </div>
        <div class="card rise" aria-label="Diagram arsitektur data">
            <div class="diagram-title"><span>arsitektur_data_per_toko</span><span>pilih toko</span></div>
            <div class="db-row" id="dbRow"></div>
            <div class="flow-arrow">↓ skema data seragam, mesin berbeda ↓</div>
            <div class="api-box">API Gateway · API key per toko</div>
            <div class="flow-arrow">↓</div>
            <div class="api-box solid">Laporan Pajak & Neraca Konsolidasi</div>
            <div class="detail-panel" id="dbDetail" aria-live="polite"></div>
        </div>
    </div>
</section>
