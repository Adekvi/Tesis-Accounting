{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resepta — Akuntansi & Pajak Mandiri untuk Tiap Apotek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Figtree:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --paper: #F6F1E7;
            --paper-2: #EFE7D6;
            --ink: #1C2B22;
            --ink-soft: #3E4C43;
            --teal: #123832;
            --teal-2: #1D5148;
            --sage: #6B8F71;
            --amber: #B8863B;
            --amber-soft: #E7D2A6;
            --red-flag: #8C4A3B;
            --line: #D2C6A6;
            --card-bg: #FFFCF5;
        }

        @media (prefers-color-scheme: dark) {
            :root:not([data-theme="light"]) {
                --paper: #141B16;
                --paper-2: #1B241D;
                --ink: #EDE7D8;
                --ink-soft: #BFC9BE;
                --teal: #8FC4B4;
                --teal-2: #6FA694;
                --sage: #9AB89E;
                --amber: #E3B872;
                --amber-soft: #3A3020;
                --red-flag: #D89684;
                --line: #3A3E33;
                --card-bg: #1B241D;
            }
        }

        :root[data-theme="dark"] {
            --paper: #141B16;
            --paper-2: #1B241D;
            --ink: #EDE7D8;
            --ink-soft: #BFC9BE;
            --teal: #8FC4B4;
            --teal-2: #6FA694;
            --sage: #9AB89E;
            --amber: #E3B872;
            --amber-soft: #3A3020;
            --red-flag: #D89684;
            --line: #3A3E33;
            --card-bg: #1B241D;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 28px;
        }

        a {
            color: inherit;
        }

        h1,
        h2,
        h3 {
            font-family: 'Newsreader', serif;
            font-weight: 500;
            margin: 0;
            letter-spacing: -0.01em;
        }

        .num {
            font-family: 'Space Mono', monospace;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: color-mix(in srgb, var(--paper) 88%, transparent);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--line);
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Newsreader', serif;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .navlinks {
            display: flex;
            gap: 32px;
            font-size: 0.92rem;
        }

        .navlinks a {
            text-decoration: none;
            color: var(--ink-soft);
            border-bottom: 1px solid transparent;
            padding-bottom: 2px;
            transition: border-color .2s;
        }

        .navlinks a:hover {
            border-color: var(--amber);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border: 1px solid var(--line);
            border-radius: 3px;
            background: transparent;
            cursor: pointer;
            font-size: 1.1rem;
            color: var(--ink);
            flex-shrink: 0;
        }

        .mobile-panel {
            display: none;
            flex-direction: column;
            gap: 2px;
            padding: 10px 0 16px;
            border-top: 1px solid var(--line);
        }

        .mobile-panel.open {
            display: flex;
        }

        .mobile-panel a {
            padding: 10px 4px;
            text-decoration: none;
            color: var(--ink-soft);
            font-size: 0.95rem;
        }

        @media(max-width:760px) {
            .navlinks {
                display: none;
            }

            .menu-toggle {
                display: inline-flex;
            }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 3px;
            font-size: 0.92rem;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid var(--teal);
            cursor: pointer;
            transition: transform .15s ease, box-shadow .15s ease;
            font-family: 'Figtree', sans-serif;
        }

        .btn-primary {
            background: var(--teal);
            color: var(--paper);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(18, 56, 50, .25);
        }

        .btn-ghost {
            border-color: var(--line);
            color: var(--ink);
            background: transparent;
        }

        .btn-ghost:hover {
            border-color: var(--teal);
        }

        .hero {
            padding: 88px 0 64px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 56px;
            align-items: center;
        }

        @media(max-width:900px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }
        }

        .eyebrow {
            display: inline-block;
            font-size: 0.85rem;
            color: var(--amber);
            border-bottom: 1px solid var(--amber);
            padding-bottom: 4px;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(2.1rem, 4.2vw, 3.2rem);
            line-height: 1.16;
        }

        .hero h1 .line-b {
            display: block;
            font-style: italic;
            color: var(--teal-2);
            margin-top: 4px;
        }

        .hero p.lede {
            font-size: 1.08rem;
            color: var(--ink-soft);
            max-width: 48ch;
            margin-top: 24px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            margin-top: 34px;
            flex-wrap: wrap;
        }

        .hero-note {
            margin-top: 20px;
            font-size: 0.83rem;
            color: var(--ink-soft);
            font-family: 'Space Mono', monospace;
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .rise-1 {
            animation: rise .7s ease both;
        }

        .rise-2 {
            animation: rise .7s ease .12s both;
        }

        .rise-3 {
            animation: rise .7s ease .24s both;
        }

        .rise-4 {
            animation: rise .7s ease .36s both;
        }

        @media (prefers-reduced-motion: reduce) {

            .rise-1,
            .rise-2,
            .rise-3,
            .rise-4 {
                animation: none;
                opacity: 1;
            }
        }

        .diagram-card {
            background: var(--card-bg);
            border: 1px solid var(--line);
            border-radius: 4px;
            padding: 26px 22px;
        }

        .diagram-title {
            font-size: 0.8rem;
            color: var(--ink-soft);
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-family: 'Space Mono', monospace;
        }

        .db-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .db-node {
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid var(--line);
            border-radius: 3px;
            padding: 12px 14px;
            cursor: pointer;
            background: transparent;
            transition: border-color .18s, background .18s;
        }

        .db-node:hover,
        .db-node.active {
            border-color: var(--amber);
            background: var(--amber-soft);
        }

        .db-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .db-node .name {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .db-node .sub {
            font-size: 0.8rem;
            color: var(--ink-soft);
        }

        .flow-arrow {
            text-align: center;
            font-size: 0.75rem;
            color: var(--ink-soft);
            padding: 6px 0;
            font-family: 'Space Mono', monospace;
        }

        .api-box {
            border: 1px dashed var(--teal-2);
            border-radius: 3px;
            padding: 12px 14px;
            text-align: center;
            font-size: 0.85rem;
            color: var(--teal-2);
            font-weight: 600;
        }

        .detail-panel {
            margin-top: 14px;
            min-height: 56px;
            font-size: 0.85rem;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
            padding-top: 12px;
        }

        section {
            padding: 70px 0;
            border-top: 1px solid var(--line);
        }

        .section-head {
            max-width: 640px;
            margin-bottom: 44px;
        }

        .section-head .eyebrow {
            margin-bottom: 14px;
        }

        .section-head h2 {
            font-size: clamp(1.5rem, 2.8vw, 2.1rem);
        }

        .section-head p {
            color: var(--ink-soft);
            margin-top: 14px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
        }

        .stat {
            background: var(--paper);
            padding: 30px 26px;
        }

        .stat .num {
            font-size: 1.9rem;
            color: var(--teal-2);
            display: block;
        }

        .stat p {
            margin-top: 8px;
            font-size: 0.9rem;
            color: var(--ink-soft);
        }

        @media(max-width:760px) {
            .stat-grid {
                grid-template-columns: 1fr;
            }
        }

        .steps {
            border-left: 1px solid var(--line);
        }

        .step {
            display: grid;
            grid-template-columns: 64px 1fr;
            gap: 22px;
            padding: 26px 0;
            border-bottom: 1px solid var(--line);
        }

        .step:first-child {
            padding-top: 0;
        }

        .step .idx {
            font-family: 'Space Mono', monospace;
            color: var(--amber);
            font-size: 1.1rem;
            padding-left: 26px;
        }

        .step h3 {
            font-size: 1.12rem;
            margin-bottom: 8px;
        }

        .step p {
            color: var(--ink-soft);
            max-width: 58ch;
            font-size: 0.95rem;
        }

        /* CALCULATOR */
        .calc-card {
            background: var(--card-bg);
            border: 1px solid var(--line);
            border-radius: 4px;
            padding: 32px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
        }

        @media(max-width:800px) {
            .calc-card {
                grid-template-columns: 1fr;
            }
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-size: 0.82rem;
            color: var(--ink-soft);
            margin-bottom: 6px;
            font-family: 'Space Mono', monospace;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--line);
            border-radius: 3px;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Space Mono', monospace;
            font-size: 0.95rem;
        }

        .field input:focus,
        .field select:focus {
            outline: 2px solid var(--teal-2);
            outline-offset: 1px;
        }

        .calc-result {
            border-top: 1px dashed var(--line);
            padding-top: 18px;
            margin-top: 6px;
        }

        .calc-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            font-size: 0.92rem;
        }

        .calc-row .num {
            font-size: 0.95rem;
        }

        .calc-status {
            margin-top: 14px;
            padding: 12px 14px;
            border-radius: 3px;
            font-size: 0.88rem;
            font-weight: 600;
        }

        .status-kurang {
            background: var(--amber-soft);
            color: var(--ink);
        }

        .status-lebih {
            background: color-mix(in srgb, var(--red-flag) 18%, transparent);
            color: var(--red-flag);
        }

        .status-nihil {
            background: color-mix(in srgb, var(--sage) 20%, transparent);
            color: var(--teal-2);
        }

        .calc-note {
            font-size: 0.85rem;
            color: var(--ink-soft);
        }

        .feat-list {
            display: flex;
            flex-direction: column;
        }

        .feat-row {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 28px;
            padding: 24px 0;
            border-bottom: 1px solid var(--line);
            align-items: baseline;
        }

        .feat-row:first-child {
            border-top: 1px solid var(--line);
        }

        .feat-row h3 {
            font-size: 1.02rem;
            color: var(--teal-2);
            font-family: 'Figtree', sans-serif;
            font-weight: 600;
        }

        .feat-row p {
            margin: 0;
            color: var(--ink-soft);
            font-size: 0.93rem;
            max-width: 60ch;
        }

        @media(max-width:700px) {
            .feat-row {
                grid-template-columns: 1fr;
                gap: 6px;
            }
        }

        .aud-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
        }

        .aud {
            background: var(--paper);
            padding: 34px 30px;
        }

        .aud h3 {
            font-size: 1.15rem;
            margin-bottom: 10px;
        }

        .aud p {
            color: var(--ink-soft);
            font-size: 0.93rem;
        }

        @media(max-width:760px) {
            .aud-grid {
                grid-template-columns: 1fr;
            }
        }

        .cta {
            background: var(--teal);
            color: var(--paper);
            border-radius: 6px;
            padding: 56px 44px;
            text-align: center;
        }

        .cta h2 {
            color: var(--paper);
            font-size: clamp(1.5rem, 2.8vw, 2rem);
        }

        .cta p {
            color: var(--amber-soft);
            margin-top: 12px;
        }

        .cta .hero-actions {
            justify-content: center;
            margin-top: 28px;
        }

        .cta .btn-primary {
            background: var(--amber);
            border-color: var(--amber);
            color: var(--teal);
        }

        .cta .btn-ghost {
            border-color: rgba(246, 241, 231, .4);
            color: var(--paper);
        }

        footer {
            padding: 36px 0 50px;
            font-size: 0.82rem;
            color: var(--ink-soft);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            border-top: 1px solid var(--line);
        }

        /* MODAL */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(18, 20, 17, .55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 100;
            padding: 20px;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: var(--card-bg);
            border: 1px solid var(--line);
            border-radius: 6px;
            max-width: 560px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            padding: 36px;
            position: relative;
        }

        @media(max-width:520px) {
            .modal-box {
                padding: 24px 20px;
            }
        }

        .modal-close {
            position: absolute;
            top: 18px;
            right: 18px;
            background: none;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            color: var(--ink-soft);
            line-height: 1;
        }

        .modal-eyebrow {
            font-size: 0.78rem;
            color: var(--amber);
            font-family: 'Space Mono', monospace;
            margin-bottom: 10px;
        }

        .modal-box h3 {
            font-size: 1.4rem;
            margin-bottom: 6px;
        }

        .modal-sub {
            color: var(--ink-soft);
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        .progress-dots {
            display: flex;
            gap: 6px;
            margin-bottom: 26px;
        }

        .progress-dots span {
            height: 3px;
            flex: 1;
            background: var(--line);
            border-radius: 2px;
        }

        .progress-dots span.done {
            background: var(--teal-2);
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        @media(max-width:520px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }

        .role-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 22px;
        }

        @media(max-width:420px) {
            .role-grid {
                grid-template-columns: 1fr;
            }
        }

        .role-opt,
        .db-opt {
            display: flex;
            align-items: center;
            gap: 9px;
            border: 1px solid var(--line);
            border-radius: 3px;
            padding: 10px 12px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .role-opt:has(input:checked),
        .db-opt:has(input:checked) {
            border-color: var(--teal-2);
            background: var(--amber-soft);
        }

        .db-opt {
            margin-bottom: 8px;
        }

        .modal-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 28px;
        }

        .success-icon {
            width: 44px;
            height: 44px;
            border: 1px solid var(--teal-2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            color: var(--teal-2);
        }

        .status-pill {
            display: inline-block;
            font-family: 'Space Mono', monospace;
            font-size: 0.78rem;
            background: var(--amber-soft);
            color: var(--ink);
            padding: 5px 10px;
            border-radius: 12px;
            margin-top: 4px;
        }
    </style>
</head>

<body>

    <header>
        <div class="wrap">
            <nav>
                <div class="brand">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <rect x="2" y="2" width="22" height="22" rx="2" stroke="currentColor"
                            stroke-width="1.4" />
                        <path d="M8 13h10M13 8v10" stroke="currentColor" stroke-width="1.4" />
                    </svg>
                    Resepta
                </div>
                <div class="navlinks">
                    <a href="#masalah">Masalah</a>
                    <a href="#cara-kerja">Cara Kerja</a>
                    <a href="#simulasi">Simulasi Pajak</a>
                    <a href="#fitur">Fitur</a>
                </div>
                <div class="nav-right">
                    <button class="btn btn-primary js-open-modal">Daftarkan Toko</button>
                    <button class="menu-toggle" id="navMenuToggle" aria-label="Buka menu">☰</button>
                </div>
            </nav>
            <div class="mobile-panel" id="mobilePanel">
                <a href="#masalah">Masalah</a>
                <a href="#cara-kerja">Cara Kerja</a>
                <a href="#simulasi">Simulasi Pajak</a>
                <a href="#fitur">Fitur</a>
            </div>
        </div>
    </header>

    <section class="hero" style="border-top:none;">
        <div class="wrap hero-grid">
            <div>
                <span class="eyebrow rise-1">Akuntansi & Pajak Multi-Apotek</span>
                <h1 class="rise-2">Buku besar disimpan di toko masing-masing.<span class="line-b">Dibaca sebagai satu
                        neraca.</span></h1>
                <p class="lede rise-3">Resepta memisahkan database tiap apotek — MySQL, PostgreSQL, atau MongoDB, bebas
                    dipilih pemiliknya — lalu menariknya kembali lewat satu API saat menghitung PPN, laba rugi, dan
                    restitusi pajak.</p>
                <div class="hero-actions rise-4">
                    <button class="btn btn-primary js-open-modal">Daftarkan Apotek Anda</button>
                    <a href="#cara-kerja" class="btn btn-ghost">Lihat Cara Kerja</a>
                </div>
                <p class="hero-note rise-4">$ status: prototipe riset — Informatika & Akuntansi</p>
            </div>

            <div class="diagram-card rise-4">
                <div class="diagram-title"><span>arsitektur_data_per_toko</span><span>arahkan kursor</span></div>
                <div class="db-row">
                    <div class="db-node" data-db="mysql">
                        <span class="db-dot" style="background:#F29111"></span>
                        <div>
                            <div class="name">apotek_sehat_bersama · MySQL</div>
                            <div class="sub">Toko A · Jl. Merdeka No. 12</div>
                        </div>
                    </div>
                    <div class="db-node" data-db="postgres">
                        <span class="db-dot" style="background:#336791"></span>
                        <div>
                            <div class="name">apotek_mitra_sehat · PostgreSQL</div>
                            <div class="sub">Toko B · Jl. Pahlawan No. 8</div>
                        </div>
                    </div>
                    <div class="db-node" data-db="mongo">
                        <span class="db-dot" style="background:#4DB33D"></span>
                        <div>
                            <div class="name">apotek_family_farma · MongoDB</div>
                            <div class="sub">Toko C · Jl. Diponegoro No. 3</div>
                        </div>
                    </div>
                </div>
                <div class="flow-arrow">↓ skema data seragam, mesin berbeda ↓</div>
                <div class="api-box">API Gateway · Api Key per Toko</div>
                <div class="flow-arrow">↓</div>
                <div class="api-box" style="border-style:solid;background:var(--amber-soft);color:var(--ink);">Laporan
                    Pajak & Neraca Konsolidasi</div>
                <div class="detail-panel" id="dbDetail">Setiap toko bebas memilih mesin basis data sendiri agar beban
                    server terbagi rata — datanya tetap bisa ditarik jadi satu laporan global.</div>
            </div>
        </div>
    </section>

    <section id="masalah">
        <div class="wrap">
            <div class="section-head">
                <span class="eyebrow">Latar Belakang</span>
                <h2>Rata-rata apotek masih menghitung PPN manual di akhir bulan, dengan risiko selisih yang baru
                    ketahuan saat lapor pajak.</h2>
                <p>Aplikasi kasir umum mencatat penjualan, tapi jarang yang memahami retur ke supplier, hutang-piutang
                    farmasi, atau logika restitusi PPN antara pembelian dan penjualan.</p>
            </div>
            <div class="stat-grid">
                <div class="stat"><span class="num">3 mesin</span>
                    <p>Database yang bisa dipilih tiap toko — MySQL, PostgreSQL, MongoDB — tanpa mengubah cara kerja
                        aplikasinya.</p>
                </div>
                <div class="stat"><span class="num">4 peran</span>
                    <p>Akses per toko: Gudang, Pengadaan, Penjualan, dan Keuangan — sesuai pembagian kerja apotek
                        sungguhan.</p>
                </div>
                <div class="stat"><span class="num">1 API</span>
                    <p>Titik tarik data untuk menyusun laporan pajak dari satu toko atau seluruh jaringan sekaligus.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cara-kerja">
        <div class="wrap">
            <div class="section-head">
                <span class="eyebrow">Cara Kerja</span>
                <h2>Dari pendaftaran toko sampai laporan pajak gabungan.</h2>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="idx num">01</div>
                    <div>
                        <h3>Toko mendaftar, Super Admin menyetujui</h3>
                        <p>Pemilik mengisi data toko dan memilih peran akses. Database dan API key baru baru dibangun
                            sistem setelah pendaftaran disetujui Super Admin — bukan otomatis begitu form dikirim.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="idx num">02</div>
                    <div>
                        <h3>Data tersimpan di database pilihan toko</h3>
                        <p>Skema data seragam untuk semua toko, tapi mesin penyimpanannya bisa berbeda — membagi beban
                            ke banyak server, bukan menumpuk di satu tempat.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="idx num">03</div>
                    <div>
                        <h3>Jurnal berjalan otomatis di database tokonya sendiri</h3>
                        <p>Transaksi pembelian, penjualan, dan retur diposting ke buku besar toko tersebut, lengkap
                            dengan perhitungan PPN masukan dan keluaran.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="idx num">04</div>
                    <div>
                        <h3>API menarik lintas toko jadi satu laporan pajak</h3>
                        <p>Super Admin atau pemilik jaringan menarik data dari akun sendiri maupun akun turunannya
                            menjadi satu gambaran kewajiban pajak yang utuh.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="simulasi">
        <div class="wrap">
            <div class="section-head">
                <span class="eyebrow">Coba Logikanya</span>
                <h2>Simulasi restitusi PPN — bukan sekadar demo, ini logika inti sistemnya.</h2>
                <p>Masukkan total PPN dari pembelian (masukan) dan penjualan (keluaran) bulan berjalan. Angka terkecil
                    menentukan apakah toko kurang bayar atau berhak restitusi — persis alur yang dijalankan Resepta di
                    balik layar.</p>
            </div>
            <div class="calc-card">
                <div>
                    <div class="field">
                        <label for="ppnMasukan">PPN Masukan (dari pembelian)</label>
                        <input type="number" id="ppnMasukan" placeholder="cth. 2450000" value="2450000">
                    </div>
                    <div class="field">
                        <label for="ppnKeluaran">PPN Keluaran (dari penjualan)</label>
                        <input type="number" id="ppnKeluaran" placeholder="cth. 3120000" value="3120000">
                    </div>
                    <p class="calc-note">Angka contoh sudah diisi — ubah sesuka Anda untuk melihat status berubah.</p>
                </div>
                <div class="calc-result">
                    <div class="calc-row"><span>PPN Masukan</span><span class="num" id="outMasukan">Rp 0</span>
                    </div>
                    <div class="calc-row"><span>PPN Keluaran</span><span class="num" id="outKeluaran">Rp 0</span>
                    </div>
                    <div class="calc-row"><span>Selisih</span><span class="num" id="outSelisih">Rp 0</span></div>
                    <div class="calc-status" id="outStatus">—</div>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur">
        <div class="wrap">
            <div class="section-head">
                <span class="eyebrow">Fitur Inti</span>
                <h2>Mengikuti alur operasional apotek, bukan pembukuan generik.</h2>
            </div>
            <div class="feat-list">
                <div class="feat-row">
                    <h3>Gudang & Stok</h3>
                    <p>Identifikasi barang, kartu stok, penerimaan barang, kadaluwarsa, sortir, hingga retur pembelian —
                        tercatat sebelum masuk ke jurnal.</p>
                </div>
                <div class="feat-row">
                    <h3>Pengadaan</h3>
                    <p>Susun order berdasarkan harga kulakan termurah antar-supplier, terbitkan order, catat pembelian
                        tunai maupun hutang.</p>
                </div>
                <div class="feat-row">
                    <h3>Penjualan</h3>
                    <p>Order pelanggan, penjualan tunai/transfer, dan retur — otomatis terhubung ke jurnal dan PPN
                        keluaran.</p>
                </div>
                <div class="feat-row">
                    <h3>Keuangan & Jurnal</h3>
                    <p>Master rekening lengkap (aktiva, kewajiban, modal, pendapatan, biaya, pajak), posting otomatis,
                        buku besar bulanan, tutup buku tahunan.</p>
                </div>
                <div class="feat-row">
                    <h3>Multi-Database per Toko</h3>
                    <p>Tiap toko memilih mesin basis datanya sendiri, dengan skema data yang tetap seragam antar toko.
                    </p>
                </div>
                <div class="feat-row">
                    <h3>Laporan Pajak Konsolidasi</h3>
                    <p>Tarik data satu toko atau seluruh jaringan untuk menghitung PPN, PPh, dan restitusi lewat satu
                        API.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="audiens">
        <div class="wrap">
            <div class="section-head">
                <span class="eyebrow">Untuk Siapa</span>
                <h2>Dibangun untuk pemilik apotek tunggal maupun jaringan.</h2>
            </div>
            <div class="aud-grid">
                <div class="aud">
                    <h3>Apotek Mandiri</h3>
                    <p>Punya sistem akuntansi sendiri tanpa menyewa server besar — database toko kecil tetap ringan dan
                        terpisah dari toko lain.</p>
                </div>
                <div class="aud">
                    <h3>Jaringan Beberapa Toko</h3>
                    <p>Melihat performa dan kewajiban pajak semua cabang dalam satu laporan, tanpa menyatukan data
                        fisiknya ke satu server.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" style="border-top:none;">
        <div class="wrap">
            <div class="cta">
                <h2>Daftarkan toko pertama Anda, lihat pratinjau dashboardnya.</h2>
                <p>Bagian dari riset akuntansi terapan — dashboard admin dan pengguna menyusul.</p>
                <div class="hero-actions">
                    <button class="btn btn-primary js-open-modal">Daftarkan Toko</button>
                </div>
            </div>
        </div>
    </section>

    <footer class="wrap">
        <span>Resepta — Prototipe Tesis Informatika & Akuntansi</span>
        <span>Satu API, banyak database</span>
    </footer>

    <!-- MODAL PENDAFTARAN -->
    <div class="modal-overlay" id="regModal">
        <div class="modal-box">
            <button class="modal-close js-close-modal" aria-label="Tutup">&times;</button>

            <div class="progress-dots" id="progressDots">
                <span class="done" data-step="1"></span>
                <span data-step="2"></span>
                <span data-step="3"></span>
            </div>

            <form id="regForm">
                <div class="form-step active" data-step="1">
                    <div class="modal-eyebrow">Langkah 1 dari 2</div>
                    <h3>Data pemilik & toko</h3>
                    <p class="modal-sub">Data ini yang akan diperiksa Super Admin sebelum database toko dibangun.</p>
                    <div class="field"><label for="ownerName">Nama pemilik</label><input type="text"
                            id="ownerName" required placeholder="cth. Siti Rahmawati"></div>
                    <div class="field-row">
                        <div class="field"><label for="storeName">Nama toko</label><input type="text"
                                id="storeName" required placeholder="cth. Apotek Sehat Bersama"></div>
                        <div class="field"><label for="storeCity">Kota</label><input type="text" id="storeCity"
                                required placeholder="cth. Pati"></div>
                    </div>
                    <div class="field-row">
                        <div class="field"><label for="ownerEmail">Email</label><input type="email"
                                id="ownerEmail" required placeholder="pemilik@apotek.id"></div>
                        <div class="field"><label for="ownerPhone">No. WhatsApp</label><input type="tel"
                                id="ownerPhone" required placeholder="08xx-xxxx-xxxx"></div>
                    </div>
                    <div class="field"><label for="storeAddress">Alamat toko</label><input type="text"
                            id="storeAddress" required placeholder="Jl. ..., No. ..., Kecamatan"></div>
                    <div class="modal-actions"><span></span><button type="button"
                            class="btn btn-primary js-next">Lanjut</button></div>
                </div>

                <div class="form-step" data-step="2">
                    <div class="modal-eyebrow">Langkah 2 dari 2</div>
                    <h3>Peran akses & mesin database</h3>
                    <p class="modal-sub">Pilih peran yang dipakai toko ini, dan mesin database yang akan dibangunkan
                        sistem.</p>
                    <label style="font-size:0.85rem;color:var(--ink-soft);display:block;margin-bottom:8px;">User akses
                        toko</label>
                    <div class="role-grid">
                        <label class="role-opt"><input type="checkbox" name="role" value="gudang" checked>
                            Gudang</label>
                        <label class="role-opt"><input type="checkbox" name="role" value="pengadaan" checked>
                            Pengadaan</label>
                        <label class="role-opt"><input type="checkbox" name="role" value="penjualan" checked>
                            Penjualan</label>
                        <label class="role-opt"><input type="checkbox" name="role" value="keuangan" checked>
                            Keuangan</label>
                    </div>
                    <label style="font-size:0.85rem;color:var(--ink-soft);display:block;margin-bottom:8px;">Mesin
                        database</label>
                    <label class="db-opt"><input type="radio" name="dbengine" value="mysql" checked> MySQL —
                        cocok untuk transaksi relasional harian</label>
                    <label class="db-opt"><input type="radio" name="dbengine" value="postgres"> PostgreSQL — untuk
                        laporan pajak dengan integritas data ketat</label>
                    <label class="db-opt"><input type="radio" name="dbengine" value="mongo"> MongoDB — untuk
                        katalog produk fleksibel & volume tinggi</label>
                    <div class="modal-actions"><button type="button"
                            class="btn btn-ghost js-prev">Kembali</button><button type="submit"
                            class="btn btn-primary">Kirim Pendaftaran</button></div>
                </div>

                <div class="form-step" data-step="3">
                    <div class="success-icon">✓</div>
                    <h3>Pendaftaran terkirim</h3>
                    <p class="modal-sub" id="successMsg"></p>
                    <span class="status-pill">status: menunggu persetujuan Super Admin</span>
                    <p class="calc-note" style="margin-top:18px;">Karena ini prototipe, kami langsung arahkan Anda ke
                        pratinjau dashboard — di sistem sebenarnya, akses baru terbuka setelah disetujui.</p>
                    <div class="modal-actions"><span></span><button type="button" class="btn btn-primary"
                            id="goDashboard">Lihat Pratinjau Dashboard</button></div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Diagram hover detail
        const details = {
            mysql: 'MySQL — cocok untuk toko dengan transaksi relasional padat, mis. jurnal dan buku besar harian.',
            postgres: 'PostgreSQL — cocok untuk toko yang butuh perhitungan pajak dan laporan kompleks dengan integritas data ketat.',
            mongo: 'MongoDB — cocok untuk toko dengan katalog produk fleksibel dan volume transaksi tinggi.'
        };
        document.querySelectorAll('.db-node').forEach(node => {
            node.addEventListener('mouseenter', () => {
                document.querySelectorAll('.db-node').forEach(n => n.classList.remove('active'));
                node.classList.add('active');
                document.getElementById('dbDetail').textContent = details[node.dataset.db];
            });
        });

        // PPN calculator
        const rupiah = n => 'Rp ' + Math.round(n).toLocaleString('id-ID');

        function hitungPPN() {
            const masukan = parseFloat(document.getElementById('ppnMasukan').value) || 0;
            const keluaran = parseFloat(document.getElementById('ppnKeluaran').value) || 0;
            const selisih = keluaran - masukan;
            document.getElementById('outMasukan').textContent = rupiah(masukan);
            document.getElementById('outKeluaran').textContent = rupiah(keluaran);
            document.getElementById('outSelisih').textContent = rupiah(Math.abs(selisih));
            const statusEl = document.getElementById('outStatus');
            if (selisih > 0) {
                statusEl.textContent = 'Kurang bayar — setor ke kas negara sebesar selisih di atas.';
                statusEl.className = 'calc-status status-kurang';
            } else if (selisih < 0) {
                statusEl.textContent = 'Lebih bayar — toko berhak mengajukan restitusi sebesar selisih di atas.';
                statusEl.className = 'calc-status status-lebih';
            } else {
                statusEl.textContent = 'Nihil — PPN masukan dan keluaran seimbang.';
                statusEl.className = 'calc-status status-nihil';
            }
        }
        document.getElementById('ppnMasukan').addEventListener('input', hitungPPN);
        document.getElementById('ppnKeluaran').addEventListener('input', hitungPPN);
        hitungPPN();

        // Modal logic
        const modal = document.getElementById('regModal');
        const openModal = () => {
            modal.classList.add('open');
            goToStep(1);
        };
        const closeModal = () => modal.classList.remove('open');
        document.querySelectorAll('.js-open-modal').forEach(b => b.addEventListener('click', openModal));
        document.querySelectorAll('.js-close-modal').forEach(b => b.addEventListener('click', closeModal));
        modal.addEventListener('click', e => {
            if (e.target === modal) closeModal();
        });

        function goToStep(n) {
            document.querySelectorAll('.form-step').forEach(s => s.classList.toggle('active', +s.dataset.step === n));
            document.querySelectorAll('#progressDots span').forEach(d => d.classList.toggle('done', +d.dataset.step <= n));
        }
        document.querySelector('.js-next').addEventListener('click', () => {
            const req = document.querySelectorAll('.form-step[data-step="1"] input[required]');
            for (const el of req) {
                if (!el.reportValidity()) return;
            }
            goToStep(2);
        });
        document.querySelector('.js-prev').addEventListener('click', () => goToStep(1));

        document.getElementById('regForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const roles = [...document.querySelectorAll('input[name="role"]:checked')].map(r => r.value);
            const dbengine = document.querySelector('input[name="dbengine"]:checked').value;
            const data = {
                ownerName: document.getElementById('ownerName').value,
                storeName: document.getElementById('storeName').value,
                storeCity: document.getElementById('storeCity').value,
                ownerEmail: document.getElementById('ownerEmail').value,
                ownerPhone: document.getElementById('ownerPhone').value,
                storeAddress: document.getElementById('storeAddress').value,
                roles: roles,
                dbengine: dbengine
            };
            sessionStorage.setItem('resepta_registration', JSON.stringify(data));
            document.getElementById('successMsg').textContent =
                'Terima kasih, ' + data.ownerName + '. Pendaftaran untuk ' + data.storeName + ' sudah kami terima.';
            goToStep(3);
        });

        document.getElementById('goDashboard').addEventListener('click', () => {
            window.location.href = "{{ route('view') }}";
        });

        // Mobile nav panel
        const navToggle = document.getElementById('navMenuToggle');
        const mobilePanel = document.getElementById('mobilePanel');
        navToggle.addEventListener('click', () => mobilePanel.classList.toggle('open'));
        mobilePanel.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobilePanel.classList.remove(
            'open')));
    </script>

</body>

</html> --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Resepta — Akuntansi & Pajak Mandiri untuk Tiap Apotek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Figtree:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <script>
        // Terapkan tema sebelum render agar tidak berkedip
        (function() {
            var t = null;
            try {
                t = localStorage.getItem('resepta_theme');
            } catch (e) {}
            if (!t) t = matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
    <style>
        :root {
            --paper: #F6F1E7;
            --paper-2: #EFE7D6;
            --ink: #1C2B22;
            --ink-soft: #46544A;
            --teal: #123832;
            --teal-2: #1D5148;
            --on-teal: #F6F1E7;
            --sage: #6B8F71;
            --amber: #A5762C;
            --amber-soft: #EBDAB4;
            --red-flag: #8C4A3B;
            --line: #D8CCAE;
            --card: #FFFCF5;
            --shadow: 0 10px 30px rgba(28, 43, 34, .08);
            --ease: cubic-bezier(.22, .61, .36, 1);
        }

        :root[data-theme="dark"] {
            --paper: #111813;
            --paper-2: #18211A;
            --ink: #EDE7D8;
            --ink-soft: #B6C2B6;
            --teal: #8FC4B4;
            --teal-2: #7DB5A3;
            --on-teal: #0E1A15;
            --sage: #9AB89E;
            --amber: #E3B872;
            --amber-soft: #2E2819;
            --red-flag: #E0A090;
            --line: #2E372F;
            --card: #19231C;
            --shadow: 0 10px 30px rgba(0, 0, 0, .35);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 84px;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Figtree', system-ui, sans-serif;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        /* Transisi tema halus */
        body,
        header,
        .card,
        .btn,
        input,
        select,
        .stat,
        .aud,
        .db-node,
        .api-box,
        .modal-box,
        .role-opt,
        .db-opt,
        .icon-btn {
            transition: background-color .35s var(--ease), color .35s var(--ease), border-color .35s var(--ease), box-shadow .35s var(--ease), transform .25s var(--ease);
        }

        .wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 28px;
        }

        a {
            color: inherit;
        }

        h1,
        h2,
        h3 {
            font-family: 'Newsreader', serif;
            font-weight: 500;
            margin: 0;
            letter-spacing: -.01em;
        }

        .num {
            font-family: 'Space Mono', monospace;
        }

        :focus-visible {
            outline: 2px solid var(--teal-2);
            outline-offset: 3px;
            border-radius: 3px;
        }

        .sr {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0 0 0 0);
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: color-mix(in srgb, var(--paper) 86%, transparent);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--line);
        }

        header.scrolled {
            box-shadow: var(--shadow);
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Newsreader', serif;
            font-size: 1.3rem;
            font-weight: 600;
            text-decoration: none;
        }

        .navlinks {
            display: flex;
            gap: 28px;
            font-size: .92rem;
        }

        .navlinks a {
            text-decoration: none;
            color: var(--ink-soft);
            padding: 4px 0;
            border-bottom: 1px solid transparent;
        }

        .navlinks a:hover,
        .navlinks a.active {
            color: var(--ink);
            border-color: var(--amber);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: transparent;
            color: var(--ink);
            cursor: pointer;
        }

        .icon-btn:hover {
            border-color: var(--teal-2);
            transform: translateY(-1px);
        }

        .icon-btn svg {
            width: 18px;
            height: 18px;
        }

        .ico-sun {
            display: none;
        }

        [data-theme="dark"] .ico-sun {
            display: block;
        }

        [data-theme="dark"] .ico-moon {
            display: none;
        }

        .menu-toggle {
            display: none;
        }

        .mobile-panel {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows .35s var(--ease);
        }

        .mobile-panel>div {
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .mobile-panel.open {
            grid-template-rows: 1fr;
        }

        .mobile-panel a {
            padding: 11px 4px;
            text-decoration: none;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
        }

        @media (max-width: 860px) {

            .navlinks,
            .nav-right .hide-sm {
                display: none;
            }

            .menu-toggle {
                display: inline-flex;
            }
        }

        @media (min-width: 861px) {
            .mobile-panel {
                display: none;
            }
        }

        /* Tombol */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 6px;
            font: 600 .92rem 'Figtree', sans-serif;
            text-decoration: none;
            border: 1px solid var(--teal);
            cursor: pointer;
        }

        .btn-primary {
            background: var(--teal);
            color: var(--on-teal);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-ghost {
            border-color: var(--line);
            background: transparent;
            color: var(--ink);
        }

        .btn-ghost:hover {
            border-color: var(--teal-2);
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 8px 16px;
        }

        .btn[disabled] {
            opacity: .6;
            cursor: progress;
        }

        /* Hero */
        .hero {
            padding: 84px 0 72px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 56px;
            align-items: center;
        }

        @media (max-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .hero {
                padding-top: 56px;
            }
        }

        .eyebrow {
            display: inline-block;
            font-size: .88rem;
            color: var(--amber);
            border-bottom: 1px solid var(--amber);
            padding-bottom: 3px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .hero h1 {
            font-size: clamp(2.1rem, 4.4vw, 3.3rem);
            line-height: 1.14;
        }

        .hero h1 .line-b {
            display: block;
            font-style: italic;
            color: var(--teal-2);
            margin-top: 4px;
        }

        .lede {
            font-size: 1.08rem;
            color: var(--ink-soft);
            max-width: 50ch;
            margin-top: 22px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        .hero-note {
            margin-top: 20px;
            font-size: .8rem;
            color: var(--ink-soft);
            font-family: 'Space Mono', monospace;
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .hero .rise {
            animation: rise .8s var(--ease) both;
        }

        .hero .rise:nth-child(2) {
            animation-delay: .1s;
        }

        .hero .rise:nth-child(3) {
            animation-delay: .2s;
        }

        .hero .rise:nth-child(4) {
            animation-delay: .3s;
        }

        /* Diagram */
        .card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .diagram-title {
            font: .78rem 'Space Mono', monospace;
            color: var(--ink-soft);
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .db-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .db-node {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            text-align: left;
            font: inherit;
            color: inherit;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 12px 14px;
            background: transparent;
            cursor: pointer;
        }

        .db-node:hover,
        .db-node.active {
            border-color: var(--amber);
            background: var(--amber-soft);
            transform: translateX(4px);
        }

        .db-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .db-node .name {
            font-weight: 600;
            font-size: .93rem;
            display: block;
        }

        .db-node .sub {
            font-size: .8rem;
            color: var(--ink-soft);
        }

        .flow-arrow {
            text-align: center;
            font: .74rem 'Space Mono', monospace;
            color: var(--ink-soft);
            padding: 8px 0;
        }

        .api-box {
            border: 1px dashed var(--teal-2);
            border-radius: 6px;
            padding: 12px;
            text-align: center;
            font-size: .85rem;
            color: var(--teal-2);
            font-weight: 600;
        }

        .api-box.solid {
            border-style: solid;
            background: var(--amber-soft);
            color: var(--ink);
        }

        .detail-panel {
            margin-top: 14px;
            min-height: 64px;
            font-size: .86rem;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
            padding-top: 12px;
            transition: opacity .25s var(--ease);
        }

        .detail-panel.swap {
            opacity: 0;
        }

        /* Seksi */
        section {
            padding: 80px 0;
            border-top: 1px solid var(--line);
        }

        .section-head {
            max-width: 680px;
            margin-bottom: 44px;
        }

        .section-head h2 {
            font-size: clamp(1.55rem, 2.9vw, 2.15rem);
            line-height: 1.25;
        }

        .section-head p {
            color: var(--ink-soft);
            margin-top: 14px;
        }

        .stat-grid,
        .aud-grid {
            display: grid;
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
            border-radius: 10px;
            overflow: hidden;
        }

        .stat-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .aud-grid {
            grid-template-columns: 1fr 1fr;
        }

        .stat,
        .aud {
            background: var(--paper);
            padding: 30px 26px;
        }

        .stat:hover,
        .aud:hover {
            background: var(--paper-2);
        }

        .stat .num {
            font-size: 1.9rem;
            color: var(--teal-2);
            display: block;
        }

        .stat p,
        .aud p {
            margin: 8px 0 0;
            font-size: .92rem;
            color: var(--ink-soft);
        }

        .aud h3 {
            font-size: 1.2rem;
        }

        @media (max-width: 760px) {

            .stat-grid,
            .aud-grid {
                grid-template-columns: 1fr;
            }

            section {
                padding: 60px 0;
            }
        }

        .steps {
            border-left: 1px solid var(--line);
        }

        .step {
            display: grid;
            grid-template-columns: 64px 1fr;
            gap: 20px;
            padding: 24px 0;
            border-bottom: 1px solid var(--line);
        }

        .step:first-child {
            padding-top: 0;
        }

        .step:last-child {
            border-bottom: 0;
        }

        .step .idx {
            font: 1.05rem 'Space Mono', monospace;
            color: var(--amber);
            padding-left: 24px;
        }

        .step h3 {
            font-size: 1.15rem;
            margin-bottom: 6px;
        }

        .step p {
            margin: 0;
            color: var(--ink-soft);
            max-width: 60ch;
            font-size: .95rem;
        }

        /* Kalkulator */
        .calc-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            padding: 32px;
        }

        @media (max-width: 800px) {
            .calc-card {
                grid-template-columns: 1fr;
                padding: 24px;
            }
        }

        .field {
            margin-bottom: 16px;
        }

        .field label,
        .lbl {
            display: block;
            font-size: .82rem;
            color: var(--ink-soft);
            margin-bottom: 6px;
            font-weight: 500;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: var(--paper);
            color: var(--ink);
            font: .95rem 'Space Mono', monospace;
        }

        .field input:focus,
        .field select:focus {
            border-color: var(--teal-2);
            outline: 2px solid color-mix(in srgb, var(--teal-2) 30%, transparent);
            outline-offset: 0;
        }

        .field .hint {
            font-size: .78rem;
            color: var(--red-flag);
            margin-top: 4px;
            min-height: 1em;
        }

        .seg {
            display: inline-flex;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 3px;
            margin-bottom: 18px;
        }

        .seg button {
            border: 0;
            background: transparent;
            color: var(--ink-soft);
            font: 600 .84rem 'Figtree', sans-serif;
            padding: 7px 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: all .25s var(--ease);
        }

        .seg button.on {
            background: var(--teal);
            color: var(--on-teal);
        }

        .calc-note {
            font-size: .84rem;
            color: var(--ink-soft);
        }

        .calc-result {
            border-left: 1px dashed var(--line);
            padding-left: 32px;
        }

        @media (max-width: 800px) {
            .calc-result {
                border-left: 0;
                border-top: 1px dashed var(--line);
                padding: 20px 0 0;
            }
        }

        .calc-row {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            font-size: .92rem;
        }

        .calc-row.total {
            border-top: 1px solid var(--line);
            margin-top: 6px;
            padding-top: 12px;
            font-weight: 600;
        }

        .calc-status {
            margin-top: 14px;
            padding: 13px 15px;
            border-radius: 6px;
            font-size: .88rem;
            font-weight: 600;
            transition: background-color .35s var(--ease), color .35s var(--ease);
        }

        .status-kurang {
            background: var(--amber-soft);
            color: var(--ink);
        }

        .status-lebih {
            background: color-mix(in srgb, var(--red-flag) 18%, transparent);
            color: var(--red-flag);
        }

        .status-nihil {
            background: color-mix(in srgb, var(--sage) 22%, transparent);
            color: var(--teal-2);
        }

        /* Fitur */
        .feat-row {
            display: grid;
            grid-template-columns: 230px 1fr;
            gap: 28px;
            padding: 22px 12px;
            margin: 0 -12px;
            border-bottom: 1px solid var(--line);
            align-items: baseline;
            border-radius: 6px;
            transition: background-color .3s var(--ease);
        }

        .feat-row:first-child {
            border-top: 1px solid var(--line);
        }

        .feat-row:hover {
            background: var(--paper-2);
        }

        .feat-row h3 {
            font: 600 1.02rem 'Figtree', sans-serif;
            color: var(--teal-2);
        }

        .feat-row p {
            margin: 0;
            color: var(--ink-soft);
            font-size: .94rem;
            max-width: 62ch;
        }

        @media (max-width: 700px) {
            .feat-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }
        }

        .cta {
            background: var(--teal);
            color: var(--on-teal);
            border-radius: 12px;
            padding: 60px 40px;
            text-align: center;
        }

        .cta h2 {
            font-size: clamp(1.5rem, 2.8vw, 2.05rem);
        }

        .cta p {
            margin: 12px 0 0;
            opacity: .8;
        }

        .cta .hero-actions {
            justify-content: center;
        }

        .cta .btn-primary {
            background: var(--on-teal);
            border-color: var(--on-teal);
            color: var(--teal);
        }

        .cta .btn-ghost {
            border-color: color-mix(in srgb, var(--on-teal) 40%, transparent);
            color: var(--on-teal);
        }

        footer {
            padding: 32px 0 48px;
            font-size: .84rem;
            color: var(--ink-soft);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            border-top: 1px solid var(--line);
        }

        /* Reveal saat scroll */
        .js .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .7s var(--ease), transform .7s var(--ease);
            transition-delay: var(--d, 0s);
        }

        .js .reveal.in {
            opacity: 1;
            transform: none;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(10, 14, 11, .6);
            backdrop-filter: blur(3px);
            opacity: 0;
            visibility: hidden;
            transition: opacity .3s var(--ease), visibility .3s;
        }

        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-box {
            position: relative;
            width: 100%;
            max-width: 540px;
            max-height: 92vh;
            overflow-y: auto;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 34px;
            box-shadow: var(--shadow);
            transform: translateY(16px) scale(.98);
            transition: transform .35s var(--ease);
        }

        .modal-overlay.open .modal-box {
            transform: none;
        }

        @media (max-width: 520px) {
            .modal-box {
                padding: 24px 20px;
            }
        }

        .modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
        }

        .modal-eyebrow {
            font-size: .8rem;
            color: var(--amber);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .modal-box h3 {
            font-size: 1.45rem;
            margin-bottom: 6px;
        }

        .modal-sub {
            color: var(--ink-soft);
            font-size: .9rem;
            margin: 0 0 22px;
        }

        .progress {
            display: flex;
            gap: 6px;
            margin-bottom: 24px;
        }

        .progress span {
            height: 3px;
            flex: 1;
            background: var(--line);
            border-radius: 2px;
            transition: background-color .4s var(--ease);
        }

        .progress span.done {
            background: var(--teal-2);
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: rise .45s var(--ease) both;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        @media (max-width: 520px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }

        .role-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .role-opt,
        .db-opt {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: .9rem;
            cursor: pointer;
        }

        .role-opt:hover,
        .db-opt:hover {
            border-color: var(--teal-2);
        }

        .role-opt:has(input:checked),
        .db-opt:has(input:checked) {
            border-color: var(--teal-2);
            background: var(--amber-soft);
        }

        .db-opt {
            margin-bottom: 8px;
            align-items: flex-start;
        }

        .db-opt small {
            display: block;
            color: var(--ink-soft);
            font-size: .8rem;
        }

        .modal-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 26px;
        }

        .pw {
            position: relative;
        }

        .pw input {
            padding-right: 62px;
        }

        .pw button {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: none;
            color: var(--teal-2);
            font: 600 .8rem 'Figtree', sans-serif;
            cursor: pointer;
            padding: 6px 8px;
        }

        .login-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: .86rem;
            margin-bottom: 4px;
        }

        .login-meta a {
            color: var(--teal-2);
        }

        .login-foot {
            text-align: center;
            font-size: .87rem;
            color: var(--ink-soft);
            margin: 20px 0 0;
        }

        .login-foot button {
            border: 0;
            background: none;
            color: var(--teal-2);
            font: 600 inherit;
            cursor: pointer;
            text-decoration: underline;
        }

        .form-error {
            color: var(--red-flag);
            font-size: .85rem;
            min-height: 1.2em;
            margin-top: 10px;
        }

        .success-icon {
            width: 46px;
            height: 46px;
            border: 1px solid var(--teal-2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: var(--teal-2);
        }

        .status-pill {
            display: inline-block;
            font: .78rem 'Space Mono', monospace;
            background: var(--amber-soft);
            padding: 5px 11px;
            border-radius: 12px;
        }

        .toast {
            position: fixed;
            left: 50%;
            bottom: 24px;
            z-index: 200;
            transform: translate(-50%, 20px);
            background: var(--teal);
            color: var(--on-teal);
            padding: 12px 20px;
            border-radius: 8px;
            font-size: .88rem;
            opacity: 0;
            pointer-events: none;
            transition: all .35s var(--ease);
        }

        .toast.show {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }

            .js .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>
    <header id="top">
        <div class="wrap">
            <nav aria-label="Navigasi utama">
                <a class="brand" href="#top">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" aria-hidden="true">
                        <rect x="2" y="2" width="22" height="22" rx="4" stroke="currentColor"
                            stroke-width="1.4" />
                        <path d="M8 13h10M13 8v10" stroke="currentColor" stroke-width="1.4" />
                    </svg>
                    Resepta
                </a>
                <div class="navlinks">
                    <a href="#masalah">Masalah</a><a href="#cara-kerja">Cara Kerja</a><a href="#simulasi">Simulasi
                        Pajak</a><a href="#fitur">Fitur</a>
                </div>
                <div class="nav-right">
                    <button class="icon-btn" id="themeToggle" aria-label="Ganti tema terang/gelap" title="Ganti tema">
                        <svg class="ico-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z" />
                        </svg>
                        <svg class="ico-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="12" r="4" />
                            <path
                                d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" />
                        </svg>
                    </button>
                    <button class="btn btn-ghost btn-sm hide-sm" data-open="loginModal">Masuk</button>
                    <button class="btn btn-primary btn-sm hide-sm" data-open="regModal">Daftarkan Toko</button>
                    <button class="icon-btn menu-toggle" id="menuToggle" aria-label="Buka menu" aria-expanded="false"
                        aria-controls="mobilePanel">☰</button>
                </div>
            </nav>
            <div class="mobile-panel" id="mobilePanel">
                <div>
                    <a href="#masalah">Masalah</a><a href="#cara-kerja">Cara Kerja</a><a href="#simulasi">Simulasi
                        Pajak</a><a href="#fitur">Fitur</a>
                    <div style="display:flex;gap:10px;padding:12px 0 16px;border-top:1px solid var(--line)">
                        <button class="btn btn-ghost btn-sm" style="flex:1" data-open="loginModal">Masuk</button>
                        <button class="btn btn-primary btn-sm" style="flex:1" data-open="regModal">Daftarkan
                            Toko</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
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

        <section id="masalah">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Latar Belakang</span>
                    <h2>Banyak apotek masih menghitung PPN manual di akhir bulan, dan selisihnya baru ketahuan saat
                        lapor pajak.</h2>
                    <p>Aplikasi kasir umum mencatat penjualan, tapi jarang yang memahami retur ke supplier,
                        hutang-piutang farmasi, atau logika restitusi PPN antara pembelian dan penjualan.</p>
                </div>
                <div class="stat-grid reveal">
                    <div class="stat"><span class="num">3 mesin</span>
                        <p>Database pilihan tiap toko — MySQL, PostgreSQL, MongoDB — tanpa mengubah cara kerja aplikasi.
                        </p>
                    </div>
                    <div class="stat"><span class="num">4 peran</span>
                        <p>Akses per toko: Gudang, Pengadaan, Penjualan, dan Keuangan, sesuai pembagian kerja apotek.
                        </p>
                    </div>
                    <div class="stat"><span class="num">1 API</span>
                        <p>Satu titik tarik data untuk laporan pajak dari satu toko atau seluruh jaringan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="cara-kerja">
            <div class="wrap">
                <div class="section-head reveal"><span class="eyebrow">Cara Kerja</span>
                    <h2>Dari pendaftaran toko sampai laporan pajak gabungan.</h2>
                </div>
                <div class="steps">
                    <div class="step reveal">
                        <div class="idx num">01</div>
                        <div>
                            <h3>Toko mendaftar, Super Admin menyetujui</h3>
                            <p>Pemilik mengisi data toko dan memilih peran akses. Database dan API key baru dibangun
                                setelah pendaftaran disetujui Super Admin, bukan otomatis saat form dikirim.</p>
                        </div>
                    </div>
                    <div class="step reveal">
                        <div class="idx num">02</div>
                        <div>
                            <h3>Data tersimpan di database pilihan toko</h3>
                            <p>Skema data seragam untuk semua toko, mesin penyimpanannya boleh berbeda — beban terbagi
                                ke banyak server.</p>
                        </div>
                    </div>
                    <div class="step reveal">
                        <div class="idx num">03</div>
                        <div>
                            <h3>Jurnal berjalan otomatis di database toko sendiri</h3>
                            <p>Pembelian, penjualan, dan retur diposting ke buku besar toko, lengkap dengan PPN masukan
                                dan keluaran.</p>
                        </div>
                    </div>
                    <div class="step reveal">
                        <div class="idx num">04</div>
                        <div>
                            <h3>API menarik lintas toko jadi satu laporan pajak</h3>
                            <p>Super Admin atau pemilik jaringan menarik data akun sendiri dan akun turunannya menjadi
                                satu gambaran kewajiban pajak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="simulasi">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Coba Logikanya</span>
                    <h2>Simulasi restitusi PPN — logika inti sistem, bukan sekadar demo.</h2>
                    <p>Masukkan PPN bulan berjalan, atau cukup nilai transaksi (DPP) dan biarkan tarif dihitung
                        otomatis. Selisih PPN keluaran dan masukan menentukan apakah toko kurang bayar atau berhak
                        restitusi.</p>
                </div>
                <div class="card calc-card reveal">
                    <div>
                        <div class="seg" role="tablist" aria-label="Mode input">
                            <button type="button" class="on" data-mode="ppn" role="tab"
                                aria-selected="true">Input PPN</button>
                            <button type="button" data-mode="dpp" role="tab" aria-selected="false">Input
                                DPP</button>
                        </div>
                        <div class="field"><label for="inMasukan" id="lblMasukan">PPN Masukan (dari
                                pembelian)</label><input type="text" inputmode="numeric" id="inMasukan"
                                value="2450000" autocomplete="off"></div>
                        <div class="field"><label for="inKeluaran" id="lblKeluaran">PPN Keluaran (dari
                                penjualan)</label><input type="text" inputmode="numeric" id="inKeluaran"
                                value="3120000" autocomplete="off"></div>
                        <div class="field" id="rateField" hidden><label for="inRate">Tarif PPN (%)</label><input
                                type="number" id="inRate" value="11" min="0" max="100"
                                step="0.5"></div>
                        <p class="calc-note">Angka contoh sudah terisi. Ubah untuk melihat status berubah.</p>
                    </div>
                    <div class="calc-result">
                        <div class="calc-row"><span>PPN Masukan</span><span class="num" id="outMasukan">Rp
                                0</span></div>
                        <div class="calc-row"><span>PPN Keluaran</span><span class="num" id="outKeluaran">Rp
                                0</span></div>
                        <div class="calc-row total"><span>Selisih</span><span class="num" id="outSelisih">Rp
                                0</span></div>
                        <div class="calc-status" id="outStatus" aria-live="polite">—</div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur">
            <div class="wrap">
                <div class="section-head reveal"><span class="eyebrow">Fitur Inti</span>
                    <h2>Mengikuti alur operasional apotek, bukan pembukuan generik.</h2>
                </div>
                <div class="feat-list" id="featList"></div>
            </div>
        </section>

        <section id="audiens">
            <div class="wrap">
                <div class="section-head reveal"><span class="eyebrow">Untuk Siapa</span>
                    <h2>Dibangun untuk apotek tunggal maupun jaringan.</h2>
                </div>
                <div class="aud-grid reveal">
                    <div class="aud">
                        <h3>Apotek Mandiri</h3>
                        <p>Punya sistem akuntansi sendiri tanpa menyewa server besar — database toko kecil tetap ringan
                            dan terpisah dari toko lain.</p>
                    </div>
                    <div class="aud">
                        <h3>Jaringan Beberapa Toko</h3>
                        <p>Lihat performa dan kewajiban pajak semua cabang dalam satu laporan, tanpa menyatukan data
                            fisiknya ke satu server.</p>
                    </div>
                </div>
            </div>
        </section>

        <section style="border-top:none">
            <div class="wrap">
                <div class="cta reveal">
                    <h2>Daftarkan toko pertama Anda, lihat pratinjau dashboardnya.</h2>
                    <p>Bagian dari riset akuntansi terapan — dashboard admin dan pengguna menyusul.</p>
                    <div class="hero-actions">
                        <button class="btn btn-primary" data-open="regModal">Daftarkan Toko</button>
                        <button class="btn btn-ghost" data-open="loginModal">Sudah punya akun? Masuk</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="wrap"><span>Resepta — Prototipe Tesis Informatika & Akuntansi</span><span>Satu API, banyak
            database</span></footer>

    <!-- MODAL LOGIN -->
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

    <!-- MODAL PENDAFTARAN -->
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
                        <div class="field"><label for="ownerName">Nama pemilik</label><input type="text"
                                id="ownerName" required placeholder="cth. Siti Rahmawati" autocomplete="name"></div>
                        <div class="field"><label for="storeName">Nama toko</label><input type="text"
                                id="storeName" required placeholder="cth. Apotek Sehat"></div>
                    </div>
                    <div class="field-row">
                        <div class="field"><label for="ownerPhone">No. WhatsApp</label><input type="tel"
                                id="ownerPhone" required placeholder="08xx-xxxx-xxxx" pattern="[0-9+\-\s]{9,16}"
                                autocomplete="tel"></div>
                        <div class="field"><label for="storeCity">Kota</label><input type="text" id="storeCity"
                                required placeholder="cth. Pati"></div>
                    </div>
                    <div class="field-row">
                        <div class="field"><label for="ownerEmail">Email</label><input type="email"
                                id="ownerEmail" required placeholder="pemilik@apotek.id" autocomplete="email"></div>
                        <div class="field"><label for="ownerPassword">Password</label><input type="password"
                                id="ownerPassword" required autocomplete="new-password"><button type="button"
                                id="psToggle" aria-label="Tampilkan kata sandi"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>
                <div class="field"><label for="storeAddress">Alamat toko</label><input type="text"
                        id="storeAddress" required placeholder="Jl. ..., No. ..., Kecamatan"></div>
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
            <div class="modal-actions"><button type="button" class="btn btn-ghost"
                    id="prevBtn">Kembali</button><button type="submit" class="btn btn-primary"
                    id="submitBtn">Kirim Pendaftaran</button></div>
        </div>
        <div class="form-step" data-step="3">
            <div class="success-icon">✓</div>
            <h3>Pendaftaran terkirim</h3>
            <p class="modal-sub" id="successMsg"></p>
            <span class="status-pill">status: menunggu persetujuan Super Admin</span>
            <p class="calc-note" style="margin-top:16px">Karena ini prototipe, Anda bisa langsung melihat
                pratinjau dashboard. Di sistem sebenarnya, akses terbuka setelah disetujui.</p>
            <div class="modal-actions"><span></span><button type="button" class="btn btn-primary"
                    id="goDashboard">Lihat Pratinjau Dashboard</button></div>
        </div>
        </form>
    </div>
    <div class="toast" id="toast" role="status"></div>

    <script>
        document.documentElement.classList.add('js');

        /* ===== KONFIGURASI — ubah di sini untuk menambah data, tanpa menyentuh logika ===== */
        const CONFIG = {
            routes: {
                dashboard: "{{ Route::has('view') ? route('view') : '#' }}",
                register: null // isi mis. "{{ url('/api/stores/register') }}" agar pendaftaran dikirim ke server
            },
            ppnRate: 11,
            engines: [{
                    id: 'mysql',
                    label: 'MySQL',
                    color: '#F29111',
                    store: 'apotek_sehat_bersama',
                    where: 'Toko A · Jl. Merdeka No. 12',
                    use: 'transaksi relasional padat, mis. jurnal dan buku besar harian'
                },
                {
                    id: 'postgres',
                    label: 'PostgreSQL',
                    color: '#336791',
                    store: 'apotek_mitra_sehat',
                    where: 'Toko B · Jl. Pahlawan No. 8',
                    use: 'perhitungan pajak dan laporan kompleks dengan integritas data ketat'
                },
                {
                    id: 'mongo',
                    label: 'MongoDB',
                    color: '#4DB33D',
                    store: 'apotek_family_farma',
                    where: 'Toko C · Jl. Diponegoro No. 3',
                    use: 'katalog produk fleksibel dan volume transaksi tinggi'
                }
            ],
            roles: [{
                    id: 'gudang',
                    label: 'Gudang'
                }, {
                    id: 'pengadaan',
                    label: 'Pengadaan'
                },
                {
                    id: 'penjualan',
                    label: 'Penjualan'
                }, {
                    id: 'keuangan',
                    label: 'Keuangan'
                }
            ],
            features: [
                ['Gudang & Stok',
                    'Identifikasi barang, kartu stok, penerimaan barang, kadaluwarsa, sortir, hingga retur pembelian — tercatat sebelum masuk ke jurnal.'
                ],
                ['Pengadaan',
                    'Susun order berdasarkan harga kulakan termurah antar-supplier, terbitkan order, catat pembelian tunai maupun hutang.'
                ],
                ['Penjualan',
                    'Order pelanggan, penjualan tunai/transfer, dan retur — otomatis terhubung ke jurnal dan PPN keluaran.'
                ],
                ['Keuangan & Jurnal',
                    'Master rekening lengkap, posting otomatis, buku besar bulanan, dan tutup buku tahunan.'
                ],
                ['Multi-Database per Toko',
                    'Tiap toko memilih mesin basis datanya sendiri dengan skema data yang tetap seragam.'
                ],
                ['Laporan Pajak Konsolidasi',
                    'Tarik data satu toko atau seluruh jaringan untuk menghitung PPN, PPh, dan restitusi lewat satu API.'
                ]
            ]
        };

        const $ = (s, r = document) => r.querySelector(s);
        const $$ = (s, r = document) => [...r.querySelectorAll(s)];
        const safeStore = {
            get: k => {
                try {
                    return sessionStorage.getItem(k);
                } catch (e) {
                    return null;
                }
            },
            set: (k, v) => {
                try {
                    sessionStorage.setItem(k, v);
                } catch (e) {}
            }
        };

        function toast(msg) {
            const t = $('#toast');
            t.textContent = msg;
            t.classList.add('show');
            clearTimeout(toast.t);
            toast.t = setTimeout(() => t.classList.remove('show'), 2800);
        }

        /* ===== Tema ===== */
        $('#themeToggle').addEventListener('click', () => {
            const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
            document.documentElement.dataset.theme = next;
            try {
                localStorage.setItem('resepta_theme', next);
            } catch (e) {}
        });

        /* ===== Navigasi ===== */
        const header = $('header'),
            panel = $('#mobilePanel'),
            mt = $('#menuToggle');
        addEventListener('scroll', () => header.classList.toggle('scrolled', scrollY > 8), {
            passive: true
        });
        mt.addEventListener('click', () => {
            const o = panel.classList.toggle('open');
            mt.setAttribute('aria-expanded', o);
        });
        $$('#mobilePanel a').forEach(a => a.addEventListener('click', () => {
            panel.classList.remove('open');
            mt.setAttribute('aria-expanded', false);
        }));
        const links = $$('.navlinks a');
        const spy = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) links.forEach(l => l.classList.toggle('active', l.getAttribute('href') ===
                '#' + e.target.id));
        }), {
            rootMargin: '-40% 0px -55% 0px'
        });
        $$('main section[id]').forEach(s => spy.observe(s));

        /* ===== Reveal saat scroll ===== */
        const rv = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                rv.unobserve(e.target);
            }
        }), {
            threshold: .12
        });
        $$('.reveal').forEach((el, i) => {
            el.style.setProperty('--d', (i % 4) * .08 + 's');
            rv.observe(el);
        });

        /* ===== Render dari konfigurasi ===== */
        $('#dbRow').innerHTML = CONFIG.engines.map(e =>
            `
            <button type="button" class="db-node" data-db="${e.id}"><span class="db-dot" style="background:${e.color}"></span>
            <span><span class="name">${e.store} · ${e.label}</span><span class="sub">${e.where}</span></span></button>`
        ).join('');
        $('#featList').innerHTML = CONFIG.features.map(f =>
            `<div class="feat-row reveal"><h3>${f[0]}</h3><p>${f[1]}</p></div>`).join('');
        $$('#featList .reveal').forEach(el => rv.observe(el));
        $('#roleGrid').innerHTML = CONFIG.roles.map(r =>
                `<label class="role-opt"><input type="checkbox" name="role" value="${r.id}" checked> ${r.label}</label>`)
            .join('');
        $('#engineList').innerHTML = CONFIG.engines.map((e, i) =>
            `<label class="db-opt"><input type="radio" name="dbengine" value="${e.id}" ${i ? '' : 'checked'}><span><strong>${e.label}</strong><small>Cocok untuk ${e.use}.</small></span></label>`
        ).join('');

        /* ===== Diagram ===== */
        const detail = $('#dbDetail');

        function showEngine(id) {
            const e = CONFIG.engines.find(x => x.id === id);
            if (!e) return;
            $$('.db-node').forEach(n => n.classList.toggle('active', n.dataset.db === id));
            detail.classList.add('swap');
            setTimeout(() => {
                detail.textContent = e.label + ' — cocok untuk ' + e.use + '.';
                detail.classList.remove('swap');
            }, 180);
        }
        $$('.db-node').forEach(n => ['mouseenter', 'focus', 'click'].forEach(ev => n.addEventListener(ev, () => showEngine(n
            .dataset.db))));
        detail.textContent =
            'Setiap toko bebas memilih mesin basis data sendiri agar beban server terbagi rata — datanya tetap bisa ditarik jadi satu laporan.';

        /* ===== Kalkulator PPN ===== */
        const fmt = n => 'Rp ' + Math.round(n).toLocaleString('id-ID');
        const num = v => parseFloat(String(v).replace(/[^\d.-]/g, '')) || 0;
        let mode = 'ppn';

        function hitung() {
            const rate = (num($('#inRate').value) || CONFIG.ppnRate) / 100;
            let m = num($('#inMasukan').value),
                k = num($('#inKeluaran').value);
            if (mode === 'dpp') {
                m *= rate;
                k *= rate;
            }
            const s = k - m,
                st = $('#outStatus');
            $('#outMasukan').textContent = fmt(m);
            $('#outKeluaran').textContent = fmt(k);
            $('#outSelisih').textContent = fmt(Math.abs(s));
            if (s > 0) {
                st.textContent = 'Kurang bayar — setor ke kas negara sebesar selisih di atas.';
                st.className = 'calc-status status-kurang';
            } else if (s < 0) {
                st.textContent = 'Lebih bayar — toko berhak mengajukan restitusi sebesar selisih di atas.';
                st.className = 'calc-status status-lebih';
            } else {
                st.textContent = 'Nihil — PPN masukan dan keluaran seimbang.';
                st.className = 'calc-status status-nihil';
            }
        }
        ['#inMasukan', '#inKeluaran'].forEach(s => $(s).addEventListener('input', e => {
            const raw = e.target.value.replace(/\D/g, '');
            e.target.value = raw ? Number(raw).toLocaleString('id-ID') : '';
            hitung();
        }));
        $('#inRate').addEventListener('input', hitung);
        $$('.seg button').forEach(b => b.addEventListener('click', () => {
            mode = b.dataset.mode;
            $$('.seg button').forEach(x => {
                x.classList.toggle('on', x === b);
                x.setAttribute('aria-selected', x === b);
            });
            $('#rateField').hidden = mode === 'ppn';
            const d = mode === 'dpp';
            $('#lblMasukan').textContent = d ? 'DPP Pembelian' : 'PPN Masukan (dari pembelian)';
            $('#lblKeluaran').textContent = d ? 'DPP Penjualan' : 'PPN Keluaran (dari penjualan)';
            hitung();
        }));
        $('#inMasukan').value = (2450000).toLocaleString('id-ID');
        $('#inKeluaran').value = (3120000).toLocaleString('id-ID');
        hitung();

        /* ===== Modal ===== */
        let lastFocus = null;

        function openModal(id) {
            const m = document.getElementById(id);
            if (!m) return;
            $$('.modal-overlay.open').forEach(o => o.classList.remove('open'));
            lastFocus = document.activeElement;
            m.classList.add('open');
            document.body.style.overflow = 'hidden';
            if (id === 'regModal') goStep(1);
            setTimeout(() => {
                const f = $('input:not([type=checkbox]):not([type=radio])', m);
                f && f.focus();
            }, 280);
        }

        function closeModals() {
            $$('.modal-overlay.open').forEach(o => o.classList.remove('open'));
            document.body.style.overflow = '';
            lastFocus && lastFocus.focus();
        }
        $$('[data-open]').forEach(b => b.addEventListener('click', () => {
            panel.classList.remove('open');
            openModal(b.dataset.open);
        }));
        $$('[data-switch]').forEach(b => b.addEventListener('click', () => openModal(b.dataset.switch)));
        $$('[data-close]').forEach(b => b.addEventListener('click', closeModals));
        $$('.modal-overlay').forEach(o => o.addEventListener('mousedown', e => {
            if (e.target === o) closeModals();
        }));
        addEventListener('keydown', e => {
            if (e.key === 'Escape') closeModals();
        });

        /* ===== Login ===== */
        $('#pwToggle').addEventListener('click', e => {
            const i = $('#loginPass'),
                show = i.type === 'password';
            i.type = show ? 'text' : 'password';
            e.target.textContent = show ? 'Sembunyikan' : 'Tampilkan';
        });
        $('#loginForm').addEventListener('submit', e => {
            const err = $('#loginError'),
                em = $('#loginEmail'),
                pw = $('#loginPass');
            err.textContent = '';
            if (!em.validity.valid || !em.value) {
                e.preventDefault();
                err.textContent = 'Masukkan alamat email yang valid, contoh: pemilik@apotek.id.';
                em.focus();
                return;
            }
            if (pw.value.length < 6) {
                e.preventDefault();
                err.textContent = 'Kata sandi minimal 6 karakter.';
                pw.focus();
                return;
            }
            if (e.target.getAttribute('action') === '#') {
                e.preventDefault();
                err.textContent = 'Rute login belum tersedia di aplikasi ini.';
                return;
            }
            const b = $('#loginBtn');
            b.disabled = true;
            b.textContent = 'Memeriksa…';
        });

        /* ===== Pendaftaran ===== */
        function goStep(n) {
            $$('.form-step').forEach(s => s.classList.toggle('active', +s.dataset.step === n));
            $$('#progress span').forEach((d, i) => d.classList.toggle('done', i < n));
        }
        $('#nextBtn').addEventListener('click', () => {
            for (const el of $$('.form-step[data-step="1"] input[required]'))
                if (!el.reportValidity()) return;
            goStep(2);
        });
        $('#prevBtn').addEventListener('click', () => goStep(1));
        async function submitRegistration(data) {
            safeStore.set('resepta_registration', JSON.stringify(data));
            if (!CONFIG.routes.register) return {
                ok: true
            };
            const res = await fetch(CONFIG.routes.register, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            });
            return {
                ok: res.ok
            };
        }
        $('#psToggle').addEventListener('click', e => {
            const i = $('#ownerPassword'),
                show = i.type === 'password';
            i.type = show ? 'text' : 'password';
            e.target.textContent = show ? 'Sembunyikan' : 'Tampilkan';
        });
        $('#regForm').addEventListener('submit', async e => {
            e.preventDefault();
            const roles = $$('input[name="role"]:checked').map(r => r.value),
                err = $('#regError');
            err.textContent = '';
            if (!roles.length) {
                err.textContent = 'Pilih minimal satu peran akses.';
                return;
            }
            const data = {
                ownerName: $('#ownerName').value.trim(),
                storeName: $('#storeName').value.trim(),
                storeCity: $('#storeCity').value.trim(),
                ownerEmail: $('#ownerEmail').value.trim(),
                ownerPassword: $('#ownerPassword').value.trim(),
                ownerPhone: $('#ownerPhone').value.trim(),
                storeAddress: $('#storeAddress').value.trim(),
                roles,
                dbengine: $('input[name="dbengine"]:checked').value
            };
            const btn = $('#submitBtn');
            btn.disabled = true;
            btn.textContent = 'Mengirim…';
            try {
                const r = await submitRegistration(data);
                if (!r.ok) throw new Error();
                $('#successMsg').textContent = 'Terima kasih, ' + data.ownerName + '. Pendaftaran untuk ' + data
                    .storeName + ' sudah kami terima.';
                goStep(3);
            } catch (x) {
                err.textContent = 'Pendaftaran belum terkirim. Periksa koneksi Anda lalu coba lagi.';
            }
            btn.disabled = false;
            btn.textContent = 'Kirim Pendaftaran';
        });
        $('#goDashboard').addEventListener('click', () => {
            if (CONFIG.routes.dashboard === '#') {
                closeModals();
                toast('Rute dashboard belum tersedia.');
                return;
            }
            location.href = CONFIG.routes.dashboard;
        });
    </script>
</body>

</html>
