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
