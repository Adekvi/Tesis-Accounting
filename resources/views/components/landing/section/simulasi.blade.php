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
                    <button type="button" class="on" data-mode="ppn" role="tab" aria-selected="true">Input
                        PPN</button>
                    <button type="button" data-mode="dpp" role="tab" aria-selected="false">Input
                        DPP</button>
                </div>
                <div class="field"><label for="inMasukan" id="lblMasukan">PPN Masukan (dari
                        pembelian)</label><input type="text" inputmode="numeric" id="inMasukan" value="2450000"
                        autocomplete="off"></div>
                <div class="field"><label for="inKeluaran" id="lblKeluaran">PPN Keluaran (dari
                        penjualan)</label><input type="text" inputmode="numeric" id="inKeluaran" value="3120000"
                        autocomplete="off"></div>
                <div class="field" id="rateField" hidden><label for="inRate">Tarif PPN (%)</label><input
                        type="number" id="inRate" value="11" min="0" max="100" step="0.5"></div>
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
