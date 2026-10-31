<?php

namespace App\Support\User;

class UserMenu
{
    /**
     * Menu operasional toko (sama struktur dengan AdminMenu::store()).
     * Key group = role key yang bisa dibatasi.
     */
    public static function all(): array
    {
        return [
            'gudang' => [
                'label' => 'Gudang',
                'items' => [
                    [
                        'id'    => 'identifikasi-barang',
                        'label' => 'Identifikasi Barang',
                        'route' => 'user.gudang.identifikasi',
                        'desc'  => 'Master data barang: nama, satuan, kategori, golongan obat, dan kode barang unik.',
                    ],
                    [
                        'id'    => 'kartu-stok',
                        'label' => 'Kartu Stok',
                        'route' => 'user.gudang.kartu-stok',
                        'desc'  => 'Riwayat keluar-masuk tiap barang per lokasi penyimpanan.',
                    ],
                    [
                        'id'    => 'order-pengadaan',
                        'label' => 'Order Pengadaan',
                        'route' => 'user.gudang.order-pengadaan',
                        'desc'  => 'Kebutuhan restock dari ambang stok minimum.',
                    ],
                    [
                        'id'    => 'penerimaan-barang',
                        'label' => 'Penerimaan, Kadaluwarsa & Sortir',
                        'route' => 'user.gudang.penerimaan',
                        'desc'  => 'Pencocokan barang datang, kadaluwarsa, dan sortir.',
                    ],
                    [
                        'id'    => 'retur-pembelian-gudang',
                        'label' => 'Retur Pembelian',
                        'route' => 'user.gudang.retur',
                        'desc'  => 'Pencatatan fisik barang dikembalikan ke supplier.',
                    ],
                ],
            ],
            'pengadaan' => [
                'label' => 'Pengadaan',
                'items' => [
                    [
                        'id'    => 'susun-order-supplier',
                        'label' => 'Susun Order by Supplier',
                        'route' => 'user.pengadaan.susun-order',
                        'desc'  => 'Bandingkan harga kulakan antar-supplier.',
                    ],
                    [
                        'id'    => 'terbit-order',
                        'label' => 'Terbit Order',
                        'route' => 'user.pengadaan.order',
                        'desc'  => 'Order resmi ke supplier terpilih.',
                    ],
                    [
                        'id'    => 'pembelian',
                        'label' => 'Pembelian',
                        'route' => 'user.pengadaan.pembelian',
                        'desc'  => 'Transaksi pembelian tunai atau hutang.',
                    ],
                    [
                        'id'    => 'retur-proses',
                        'label' => 'Proses Retur Pembelian',
                        'route' => 'user.pengadaan.retur',
                        'desc'  => 'Tindak lanjut retur: ganti barang, potong hutang, atau refund.',
                    ],
                ],
            ],
            'penjualan' => [
                'label' => 'Penjualan',
                'items' => [
                    [
                        'id'    => 'order-pelanggan',
                        'label' => 'Order Pelanggan',
                        'route' => 'user.penjualan.order',
                        'desc'  => 'Permintaan pelanggan / pre-order.',
                    ],
                    [
                        'id'    => 'jual',
                        'label' => 'Jual',
                        'route' => 'user.penjualan.transaksi',
                        'desc'  => 'Transaksi penjualan + PPN keluaran.',
                    ],
                    [
                        'id'    => 'retur-jual',
                        'label' => 'Retur Penjualan',
                        'route' => 'user.penjualan.retur',
                        'desc'  => 'Barang kembali dari pelanggan.',
                    ],
                ],
            ],
            'keuangan' => [
                'label' => 'Keuangan',
                'items' => [
                    [
                        'id'    => 'master-rekening',
                        'label' => 'Master Rekening (COA)',
                        'route' => 'user.keuangan.coa',
                        'desc'  => 'coa', // flag khusus untuk render tree COA
                    ],
                    [
                        'id'    => 'saldo-awal',
                        'label' => 'Input Saldo Awal',
                        'route' => 'user.keuangan.saldo-awal',
                        'desc'  => 'Nilai pembuka tiap rekening.',
                    ],
                    [
                        'id'    => 'jurnal-transaksi',
                        'label' => 'Jurnal Transaksi',
                        'route' => 'user.keuangan.jurnal',
                        'desc'  => 'Jurnal sistem dan non-sistem.',
                    ],
                    [
                        'id'    => 'posting',
                        'label' => 'Posting / Buku Besar',
                        'route' => 'user.keuangan.buku-besar',
                        'desc'  => 'Posting ke rekening induk.',
                    ],
                    [
                        'id'    => 'neraca',
                        'label' => 'Neraca',
                        'route' => 'user.keuangan.neraca',
                        'desc'  => 'Ringkasan posisi keuangan.',
                    ],
                    [
                        'id'    => 'tutup-buku',
                        'label' => 'Tutup Buku Tahunan',
                        'route' => 'user.keuangan.tutup-buku',
                        'desc'  => 'Tutup periode dan pindah saldo.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Filter menu berdasarkan role yang dimiliki user toko.
     * Contoh $roles = ['gudang', 'penjualan']
     * Kosong / null = tampilkan semua (untuk prototyping).
     */
    public static function forRoles(?array $roles = null): array
    {
        $all = self::all();

        if ($roles === null || $roles === []) {
            return $all;
        }

        return array_filter(
            $all,
            fn(string $key) => in_array($key, $roles, true),
            ARRAY_FILTER_USE_KEY
        );
    }

    public static function coa(): array
    {
        // Bisa dipindah dari AdminMenu::coa() agar satu sumber
        return \App\Support\Admin\AdminMenu::coa();
    }
}
