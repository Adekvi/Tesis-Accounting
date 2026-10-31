<?php

namespace App\Support\Admin;

class AdminMenu
{
    public static function global(): array
    {
        return [

            'toko' => [
                'label' => 'Manajemen Toko',

                'items' => [

                    [
                        'id' => 'persetujuan',
                        'label' => 'Persetujuan Pendaftaran',
                        'route' => 'admin.toko.approval',
                    ],

                    [
                        'id' => 'daftar-toko',
                        'label' => 'Daftar Toko Aktif',
                        'route' => 'admin.toko.index',
                    ],

                    [
                        'id' => 'api-key',
                        'label' => 'Api Key per Toko',
                        'route' => 'admin.toko.api-key',
                    ],

                ],
            ],

            'user' => [
                'label' => 'Manajemen User',

                'items' => [

                    [
                        'id' => 'user-toko',
                        'label' => 'User Akses per Toko',
                        'route' => 'admin.user.toko',
                    ],

                    [
                        'id' => 'user-super',
                        'label' => 'Daftar Super Admin',
                        'route' => 'admin.user.super-admin',
                    ],

                ],
            ],

            'laporan' => [
                'label' => 'Laporan Konsolidasi',

                'items' => [

                    [
                        'id' => 'pajak-gabungan',
                        'label' => 'Pajak Gabungan Seluruh Toko',
                        'route' => 'admin.laporan.pajak',
                    ],

                    [
                        'id' => 'neraca-gabungan',
                        'label' => 'Neraca Gabungan',
                        'route' => 'admin.laporan.neraca',
                    ],

                    [
                        'id' => 'export-data',
                        'label' => 'Export per Toko / Global',
                        'route' => 'admin.laporan.export',
                    ],

                ],
            ],

            'sistem' => [
                'label' => 'Pengaturan Sistem',

                'items' => [

                    [
                        'id' => 'konfigurasi-db',
                        'label' => 'Konfigurasi Mesin Database',
                        'route' => 'admin.sistem.database',
                    ],

                    [
                        'id' => 'log-aktivitas',
                        'label' => 'Log Aktivitas',
                        'route' => 'admin.sistem.activity-log',
                    ],

                ],
            ],

        ];
    }


    public static function store(): array
    {
        return [

            'gudang' => [
                'label' => 'Gudang',

                'items' => [

                    [
                        'id' => 'identifikasi-barang',
                        'label' => 'Identifikasi Barang',
                        'route' => 'admin.gudang.identifikasi',
                    ],

                    [
                        'id' => 'kartu-stok',
                        'label' => 'Kartu Stok',
                        'route' => 'admin.gudang.kartu-stok',
                    ],

                    [
                        'id' => 'order-pengadaan',
                        'label' => 'Order Pengadaan',
                        'route' => 'admin.gudang.order-pengadaan',
                    ],

                    [
                        'id' => 'penerimaan-barang',
                        'label' => 'Penerimaan, Kadaluwarsa & Sortir',
                        'route' => 'admin.gudang.penerimaan',
                    ],

                    [
                        'id' => 'retur-pembelian-gudang',
                        'label' => 'Retur Pembelian',
                        'route' => 'admin.gudang.retur',
                    ],

                ],
            ],


            'pengadaan' => [
                'label' => 'Pengadaan',

                'items' => [

                    [
                        'id' => 'susun-order-supplier',
                        'label' => 'Susun Order by Supplier',
                        'route' => 'admin.pengadaan.susun-order',
                    ],

                    [
                        'id' => 'terbit-order',
                        'label' => 'Terbit Order',
                        'route' => 'admin.pengadaan.order',
                    ],

                    [
                        'id' => 'pembelian',
                        'label' => 'Pembelian',
                        'route' => 'admin.pengadaan.pembelian',
                    ],

                    [
                        'id' => 'retur-proses',
                        'label' => 'Proses Retur Pembelian',
                        'route' => 'admin.pengadaan.retur',
                    ],

                ],
            ],


            'penjualan' => [
                'label' => 'Penjualan',

                'items' => [

                    [
                        'id' => 'order-pelanggan',
                        'label' => 'Order Pelanggan',
                        'route' => 'admin.penjualan.order',
                    ],

                    [
                        'id' => 'jual',
                        'label' => 'Jual',
                        'route' => 'admin.penjualan.transaksi',
                    ],

                    [
                        'id' => 'retur-jual',
                        'label' => 'Retur Penjualan',
                        'route' => 'admin.penjualan.retur',
                    ],

                ],
            ],


            'keuangan' => [
                'label' => 'Keuangan',

                'items' => [

                    [
                        'id' => 'master-rekening',
                        'label' => 'Master Rekening (Chart of Accounts)',
                        'route' => 'admin.keuangan.coa',
                    ],

                    [
                        'id' => 'saldo-awal',
                        'label' => 'Input Saldo Awal',
                        'route' => 'admin.keuangan.saldo-awal',
                    ],

                    [
                        'id' => 'jurnal-transaksi',
                        'label' => 'Jurnal Transaksi',
                        'route' => 'admin.keuangan.jurnal',
                    ],

                    [
                        'id' => 'posting',
                        'label' => 'Posting / Buku Besar',
                        'route' => 'admin.keuangan.buku-besar',
                    ],

                    [
                        'id' => 'neraca',
                        'label' => 'Neraca',
                        'route' => 'admin.keuangan.neraca',
                    ],

                    [
                        'id' => 'tutup-buku',
                        'label' => 'Tutup Buku Tahunan',
                        'route' => 'admin.keuangan.tutup-buku',
                    ],

                ],
            ],

        ];
    }


    public static function coa(): array
    {
        return [

            [
                'label' => 'Aktiva',

                'children' => [

                    [
                        'label' => 'Aktiva Lancar',

                        'children' => [

                            [
                                'label' => 'Kas & Bank',
                                'leaf' => [
                                    'Kas',
                                    'Bank A – Tabungan',
                                    'Bank A – Giro',
                                    'Bank B',
                                    'Bank C',
                                ],
                            ],

                            [
                                'label' => 'Persediaan',
                                'leaf' => [
                                    'Persediaan Barang Dagang',
                                ],
                            ],

                            [
                                'label' => 'Piutang',
                                'leaf' => [
                                    'Piutang Pelanggan',
                                ],
                            ],

                        ],
                    ],

                    [
                        'label' => 'Aktiva Tetap',

                        'children' => [

                            [
                                'label' => 'Gedung',
                                'leaf' => [
                                    'Nilai Perolehan',
                                    'Akumulasi Penyusutan',
                                ],
                            ],

                            [
                                'label' => 'Elektronik',
                                'leaf' => [
                                    'Nilai Perolehan',
                                    'Akumulasi Penyusutan',
                                ],
                            ],

                            [
                                'label' => 'Mobil',
                                'leaf' => [
                                    'Nilai Perolehan',
                                    'Akumulasi Penyusutan',
                                ],
                            ],

                            [
                                'label' => 'Motor',
                                'leaf' => [
                                    'Nilai Perolehan',
                                    'Akumulasi Penyusutan',
                                ],
                            ],

                        ],
                    ],

                ],
            ],


            [
                'label' => 'Kewajiban',

                'children' => [

                    [
                        'label' => 'Hutang',

                        'leaf' => [
                            'Hutang Jangka Panjang',
                            'Hutang Jangka Pendek',
                        ],
                    ],

                ],
            ],


            [
                'label' => 'Modal',

                'leaf' => [
                    'Obligasi',
                    'Saham',
                    'Dibagikan',
                    'Rugi Laba Tahun Lalu',
                    'Rugi Laba Tahun Berjalan',
                ],
            ],


            [
                'label' => 'Pendapatan',

                'leaf' => [
                    'Pendapatan Penjualan',
                    'Pendapatan Lain-lain',
                ],
            ],


            [
                'label' => 'Biaya',

                'children' => [

                    [
                        'label' => 'Operasional Kantor (Rutin)',

                        'leaf' => [
                            'Gaji',
                            'Listrik',
                            'PDAM',
                            'Internet',
                        ],
                    ],

                    [
                        'label' => 'Non-Rutin',

                        'leaf' => [
                            'Bensin',
                            'Makan',
                            'Entertain',
                            'Parkir',
                            'Tol',
                        ],
                    ],

                ],
            ],


            [
                'label' => 'Pajak',

                'leaf' => [
                    'PPN',
                    'PPh',
                    'Restitusi',
                ],
            ],

        ];
    }
}
