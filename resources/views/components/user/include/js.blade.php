 <script>
     /* ---------- struktur menu berjenjang, mengikuti alur konsep asli ---------- */
     const MENU = {
         gudang: {
             label: 'Gudang',
             items: [{
                     id: 'identifikasi-barang',
                     label: 'Identifikasi Barang',
                     desc: 'Master data barang: nama, satuan, kategori, golongan obat, dan kode barang unik yang dipakai seluruh modul lain.'
                 },
                 {
                     id: 'kartu-stok',
                     label: 'Kartu Stok',
                     desc: 'Riwayat keluar-masuk tiap barang per lokasi penyimpanan. Titik pemicu utama untuk menyusun order pengadaan saat stok menipis.'
                 },
                 {
                     id: 'order-pengadaan',
                     label: 'Order Pengadaan (dari Kartu Stok)',
                     desc: 'Daftar kebutuhan restock yang lahir otomatis dari ambang batas stok minimum, siap diteruskan ke modul Pengadaan.'
                 },
                 {
                     id: 'penerimaan-barang',
                     label: 'Penerimaan, Kadaluwarsa & Sortir',
                     desc: 'Pencocokan barang datang dengan order pembelian, pencatatan tanggal kadaluwarsa, dan sortir barang rusak/tidak sesuai.'
                 },
                 {
                     id: 'retur-pembelian-gudang',
                     label: 'Retur Pembelian',
                     desc: 'Pencatatan fisik barang yang dikembalikan ke supplier sebelum diproses status hutang/dananya di modul Pengadaan.'
                 },
             ]
         },
         pengadaan: {
             label: 'Pengadaan',
             items: [{
                     id: 'susun-order-supplier',
                     label: 'Susun Order by Supplier',
                     desc: 'Bandingkan harga kulakan antar-supplier untuk barang yang sama, sistem menyarankan supplier termurah dari daftar.'
                 },
                 {
                     id: 'terbit-order',
                     label: 'Terbit Order',
                     desc: 'Order resmi diterbitkan ke supplier terpilih, menunggu konfirmasi dan pengiriman.'
                 },
                 {
                     id: 'pembelian',
                     label: 'Pembelian (Hutang / Cash)',
                     desc: 'Pencatatan transaksi pembelian setelah barang diterima Gudang, dengan status pembayaran tunai atau hutang ke supplier.'
                 },
                 {
                     id: 'retur-proses',
                     label: 'Proses Retur Pembelian',
                     desc: 'Menentukan tindak lanjut retur: barang diganti, mengurangi hutang, atau dana dikembalikan — tiga cabang keputusan sesuai kondisi.'
                 },
             ]
         },
         penjualan: {
             label: 'Penjualan',
             items: [{
                     id: 'order-pelanggan',
                     label: 'Order Pelanggan',
                     desc: 'Permintaan pelanggan yang menunggu diproses jadi transaksi penjualan, termasuk pre-order barang yang sedang kosong.'
                 },
                 {
                     id: 'jual',
                     label: 'Jual (Cash / TF-BG)',
                     desc: 'Transaksi penjualan langsung, dengan metode bayar tunai, transfer, atau bilyet giro — otomatis menghitung PPN keluaran.'
                 },
                 {
                     id: 'retur-jual',
                     label: 'Retur Penjualan',
                     desc: 'Barang kembali dari pelanggan, memengaruhi stok Gudang dan jurnal Keuangan secara bersamaan.'
                 },
             ]
         },
         keuangan: {
             label: 'Keuangan',
             items: [{
                     id: 'master-rekening',
                     label: 'Master Rekening (Chart of Accounts)',
                     desc: 'coa'
                 },
                 {
                     id: 'saldo-awal',
                     label: 'Input Saldo Awal',
                     desc: 'Nilai pembuka tiap rekening sebelum sistem mulai mencatat transaksi berjalan.'
                 },
                 {
                     id: 'jurnal-transaksi',
                     label: 'Jurnal Transaksi',
                     desc: 'Jurnal dari sistem (pembelian, penjualan, retur, pelunasan) dan di luar sistem (operasional rutin & non-rutin, pajak).'
                 },
                 {
                     id: 'posting',
                     label: 'Posting / Buku Besar',
                     desc: 'Setiap transaksi diposting ke rekening induknya, memperbarui saldo buku besar bulanan secara berjenjang.'
                 },
                 {
                     id: 'neraca',
                     label: 'Neraca',
                     desc: 'Ringkasan posisi keuangan bulanan hasil posting, disusun dari seluruh rekening yang aktif bertransaksi.'
                 },
                 {
                     id: 'tutup-buku',
                     label: 'Tutup Buku Tahunan',
                     desc: 'Menolkan Pendapatan & Biaya ke periode baru, memindahkan hasilnya ke Rugi Laba Tahun Berjalan lalu Rugi Laba Tahun Lalu.'
                 },
             ]
         }
     };

     const COA = [{
             label: 'Aktiva',
             children: [{
                     label: 'Aktiva Lancar',
                     children: [{
                             label: 'Kas & Bank',
                             leaf: ['Kas', 'Bank A – Tabungan', 'Bank A – Giro', 'Bank B', 'Bank C']
                         },
                         {
                             label: 'Persediaan',
                             leaf: ['Persediaan Barang Dagang']
                         },
                         {
                             label: 'Piutang',
                             leaf: ['Piutang Pelanggan']
                         },
                     ]
                 },
                 {
                     label: 'Aktiva Tetap',
                     children: [{
                             label: 'Gedung',
                             leaf: ['Nilai Perolehan', 'Akumulasi Penyusutan']
                         },
                         {
                             label: 'Elektronik',
                             leaf: ['Nilai Perolehan', 'Akumulasi Penyusutan']
                         },
                         {
                             label: 'Mobil',
                             leaf: ['Nilai Perolehan', 'Akumulasi Penyusutan']
                         },
                         {
                             label: 'Motor',
                             leaf: ['Nilai Perolehan', 'Akumulasi Penyusutan']
                         },
                     ]
                 },
             ]
         },
         {
             label: 'Kewajiban',
             children: [{
                 label: 'Hutang',
                 leaf: ['Hutang Jangka Panjang', 'Hutang Jangka Pendek']
             }, ]
         },
         {
             label: 'Modal',
             leaf: ['Obligasi', 'Saham', 'Dibagikan', 'Rugi Laba Tahun Lalu', 'Rugi Laba Tahun Berjalan']
         },
         {
             label: 'Pendapatan',
             leaf: ['Pendapatan Penjualan', 'Pendapatan Lain-lain']
         },
         {
             label: 'Biaya',
             children: [{
                     label: 'Operasional Kantor (Rutin)',
                     leaf: ['Gaji', 'Listrik', 'PDAM', 'Internet']
                 },
                 {
                     label: 'Non-Rutin',
                     leaf: ['Bensin', 'Makan', 'Entertain', 'Parkir', 'Tol']
                 },
             ]
         },
         {
             label: 'Pajak',
             leaf: ['PPN', 'PPh', 'Restitusi']
         },
     ];

     /* ---------- render sidebar sesuai peran yang dipilih saat registrasi ---------- */
     const raw = sessionStorage.getItem('resepta_registration');
     const data = raw ? JSON.parse(raw) : {
         ownerName: 'Pemilik Toko',
         storeName: 'Toko Anda',
         storeCity: '-',
         roles: ['gudang', 'pengadaan', 'penjualan', 'keuangan'],
         dbengine: 'mysql'
     };

     document.getElementById('greeting').textContent = 'Selamat datang, ' + data.ownerName;
     document.getElementById('storeMeta').textContent = data.storeName + ' · ' + data.storeCity;

     const navRoot = document.getElementById('navRoot');
     data.roles.forEach((roleKey, gi) => {
         const group = MENU[roleKey];
         if (!group) return;
         const groupEl = document.createElement('div');
         groupEl.className = 'group' + (gi === 0 ? ' open' : '');
         groupEl.innerHTML = `
    <div class="group-head"><span>${group.label}</span><span class="chev">▸</span></div>
    <div class="group-body">
      ${group.items.map(it => `<a class="submenu-item" data-id="${it.id}">${it.label}</a>`).join('')}
    </div>`;
         groupEl.querySelector('.group-head').addEventListener('click', () => groupEl.classList.toggle('open'));
         navRoot.appendChild(groupEl);
     });

     /* ---------- render konten kanan sesuai submenu yang diklik ---------- */
     const contentArea = document.getElementById('contentArea');

     function findItem(id) {
         for (const key in MENU) {
             const found = MENU[key].items.find(i => i.id === id);
             if (found) return {
                 group: MENU[key].label,
                 item: found
             };
         }
         return null;
     }

     function renderCOA(nodes) {
         return '<div class="coa">' + nodes.map(n => renderCOANode(n)).join('') + '</div>';
     }

     function renderCOANode(n) {
         if (n.leaf && !n.children) {
             return `<div class="coa-node"><div class="coa-row" style="cursor:default;"><span class="chev"></span><span>${n.label}</span></div>
      <div class="coa-children" style="display:block;">${n.leaf.map(l => `<div class="coa-leaf">${l}</div>`).join('')}</div></div>`;
         }
         const inner = n.children ? n.children.map(c => renderCOANode(c)).join('') :
             (n.leaf || []).map(l => `<div class="coa-leaf">${l}</div>`).join('');
         return `<div class="coa-node"><div class="coa-row"><span class="chev">▸</span><span>${n.label}</span></div>
    <div class="coa-children">${inner}</div></div>`;
     }

     function bindCOAToggles() {
         document.querySelectorAll('.coa-row').forEach(row => {
             row.addEventListener('click', () => {
                 const node = row.parentElement;
                 if (node.querySelector('.coa-children').children.length) node.classList.toggle('open');
             });
         });
     }

     function showItem(id) {
         document.querySelectorAll('.submenu-item').forEach(a => a.classList.toggle('active', a.dataset.id === id));
         const found = findItem(id);
         if (!found) return;
         const {
             group,
             item
         } = found;
         let bodyHTML;
         if (item.desc === 'coa') {
             bodyHTML =
                 `<div class="card"><h3>Struktur rekening (contoh)</h3><p style="margin-bottom:14px;">Ini kerangka akun yang dipakai proses posting dan penyusunan neraca — bisa dikembangkan sesuai kebutuhan tiap toko.</p>${renderCOA(COA)}</div>`;
         } else {
             bodyHTML =
                 `<div class="card"><h3>${item.label}</h3><p>${item.desc}</p></div>
      <div class="card"><p class="empty-note">Halaman fungsional untuk "${item.label}" belum dibangun — ini pratinjau alur navigasi sesuai rancangan tesis.</p></div>`;
         }
         contentArea.innerHTML = `<div class="breadcrumb">Keuangan &amp; Operasional / ${group} / ${item.label}</div>` +
             bodyHTML;
         if (item.desc === 'coa') bindCOAToggles();
     }

     document.querySelectorAll('.submenu-item').forEach(a => a.addEventListener('click', () => showItem(a.dataset.id)));

     /* tampilkan submenu pertama dari grup pertama sebagai default */
     const firstRole = data.roles.find(r => MENU[r]);
     if (firstRole) showItem(MENU[firstRole].items[0].id);

     /* ---------------- drawer sidebar (tablet & ponsel) ---------------- */
     const asideEl = document.querySelector('aside');
     const menuToggle = document.getElementById('menuToggle');
     const navBackdrop = document.getElementById('navBackdrop');

     function openDrawer() {
         asideEl.classList.add('open');
         navBackdrop.classList.add('show');
     }

     function closeDrawer() {
         asideEl.classList.remove('open');
         navBackdrop.classList.remove('show');
     }
     menuToggle.addEventListener('click', openDrawer);
     navBackdrop.addEventListener('click', closeDrawer);
     document.addEventListener('click', e => {
         if (e.target.classList.contains('submenu-item') && window.innerWidth <= 860) closeDrawer();
     });
 </script>
