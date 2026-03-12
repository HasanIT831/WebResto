<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Laporan.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <style>
        @keyframes modalFadeIn {
            0% { opacity: 0; transform: translate(-50%, -60%) scale(0.8); }
            100% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        }
        
        .modal {
            display: none; 
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(4px);
            z-index: 9999;
        }

        .modal-dialog-centered {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
            width: 90%;
            max-width: 450px;
        }

        .table-container thead tr {
            background-color: #c04848 !important;
            color: white;
        }

        .aksi-kolom {
            white-space: nowrap;
        }

        input:focus, select:focus { outline: none !important; box-shadow: none !important; }
    </style>
</head>
<body>

<section class="tentang-section">
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" class="logo" style="max-height: 80px;">
        </a>
    </div>

    <div class="title" style="text-align: center; font-weight: 600; font-size: 24px; margin-bottom: 30px; color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
        LAPORAN TRANSAKSI RESERVASI
    </div>

    <div class="search-container" style="display: flex; justify-content: flex-end; margin-bottom: 20px; padding-right: 20px;">
        <form action="{{ route('laporan.index') }}" method="GET" style="display: flex; gap: 5px;">
            <input type="text" name="search" placeholder="Cari transaksi..." class="search-input" value="{{ request('search') }}" style="padding: 8px 15px; border-radius: 4px; border: 1px solid #ccc;">
            <button type="submit" class="btn" style="background-color: #c04848; color: white;">Search</button>
        </form>
    </div>

    <div class="table-container" style="background: white; border-radius: 8px; overflow: auto; margin: 0 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        <table class="table text-center" style="margin-bottom: 0;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Paket</th>
                    <th>Jumlah Orang</th>
                    <th>Waktu</th>
                    <th>Tanggal</th>
                    <th>No Tlpn</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aktivitas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $t)
                <tr>
                    <td>{{ $t->reservasi->nama ?? '-' }}</td>
                    <td>{{ $t->setmenu->Nama ?? '-' }}</td>
                    <td>{{ $t->reservasi->jumlah_orang ?? '-' }}</td>
                    <td>{{ $t->reservasi->waktu ?? '-' }}</td>
                    <td>{{ $t->reservasi->tanggal ?? '-' }}</td>
                    <td>{{ $t->reservasi->no_tlpn ?? '-' }}</td>
                    <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge badge-info">{{ ucfirst($t->status) }}</span>
                    </td>
                    <td class="aksi-kolom">
                        <button class="btn btn-sm btn-danger open-detail-modal" 
                                data-nama="{{ $t->reservasi->nama ?? '' }}" 
                                data-paket="{{ $t->setmenu->Nama ?? '' }}" 
                                data-jumlah="{{ $t->reservasi->jumlah_orang ?? '' }}"
                                data-waktu="{{ $t->reservasi->waktu ?? '' }}"
                                data-tanggal="{{ $t->reservasi->tanggal ?? '' }}"
                                data-no="{{ $t->reservasi->no_tlpn ?? '' }}"
                                data-total="{{ $t->total }}"
                                data-status="{{ $t->status }}">Detail</button>
                        
                        <button class="btn btn-sm btn-danger open-edit-modal"
                                data-id="{{ $t->id }}"
                                data-nama="{{ $t->reservasi->nama ?? '' }}"
                                data-waktu="{{ $t->reservasi->waktu ?? '' }}"
                                data-tanggal="{{ $t->reservasi->tanggal ?? '' }}"
                                data-no="{{ $t->reservasi->no_tlpn ?? '' }}"
                                data-status="{{ $t->status }}">Edit</button>
                        
                        <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
     <div class="text-center mt-3">
    {{ $transaksis->links('pagination::bootstrap-4') }}
</div>

    <div id="detailTransaksiModal" class="modal">
        <div class="modal-dialog-centered">
            <div class="modal-content" style="border-radius:12px; border:none; animation: modalFadeIn 0.3s ease; overflow: hidden;">
                <div class="modal-header" style="background: #bc9c75; padding:15px; display:flex; justify-content:center; border:none;">
                    <h5 style="color:#fff; margin:0; font-size:16px; font-weight:600;">DETAIL TRANSAKSI</h5>
                </div>
                <div class="modal-body" style="background:#faf8f5; padding:20px;">
                    <table class="table table-bordered bg-white" style="margin-bottom:0;">
                        <tbody>
                            <tr><td style="background:#bc9c75; color:white; width:40%; font-size:12px; font-weight:bold;">NAMA</td><td id="detail_nama"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">PAKET</td><td id="detail_paket"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">JUMLAH</td><td id="detail_jumlah"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">WAKTU</td><td id="detail_waktu"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">TANGGAL</td><td id="detail_tanggal"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">NO TELP</td><td id="detail_no"></td></tr>
                            <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">TOTAL</td><td id="detail_total" style="font-weight:bold;"></td></tr>
                            <tr><td style="background:#d4a574; color:white; font-size:12px; font-weight:bold;">STATUS</td><td id="detail_status" style="font-weight:bold; text-transform:uppercase;"></td></tr>
                        </tbody>
                    </table>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-tutup-modal" style="border:1px solid #bc9c75; color:#bc9c75; background:white; padding:5px 30px; border-radius:5px;">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editTransaksiModal" class="modal">
        <div class="modal-dialog-centered">
            <div class="modal-content" style="border-radius:12px; border:none; animation: modalFadeIn 0.3s ease; overflow: hidden;">
                <div class="modal-header" style="background: #bc9c75; padding:15px; display:flex; justify-content:center; border:none;">
                    <h5 style="color:#fff; margin:0; font-size:16px; font-weight:600;">EDIT TRANSAKSI</h5>
                </div>
                <div class="modal-body" style="background:#faf8f5; padding:20px;">
                    <form id="editTransaksiForm" method="POST">
                        @csrf @method('PUT')
                        <table class="table table-bordered bg-white" style="margin-bottom:0;">
                            <tbody>
                                <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">NAMA</td><td><input type="text" name="nama" id="modal_nama" class="form-control" ></td></tr>
                                <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">WAKTU</td><td><input type="text" name="waktu" id="modal_waktu" class="form-control"></td></tr>
                                <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">TANGGAL</td><td><input type="date" name="tanggal" id="modal_tanggal" class="form-control"></td></tr>
                                <tr><td style="background:#bc9c75; color:white; font-size:12px; font-weight:bold;">NO TELP</td><td><input type="text" name="no_tlpn" id="modal_no" class="form-control"></td></tr>
                                <tr><td style="background:#d4a574; color:white; font-size:12px; font-weight:bold;">STATUS</td><td>
                                    <select name="status" id="modal_status" class="form-control">
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="batal">Batal</option>
                                    </select>
                                </td></tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-3" style="display:flex; justify-content:center; gap:10px;">
                            <button type="button" class="btn btn-tutup-modal" style="border:1px solid #bc9c75; color:#bc9c75; background:white; padding:5px 25px; border-radius:5px;">Tutup</button>
                            <button type="submit" class="btn" style="background:#ff6b35; color:white; padding:5px 25px; border-radius:5px;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editTransaksiModal');
    const detailModal = document.getElementById('detailTransaksiModal');

    document.querySelectorAll('.btn-tutup-modal').forEach(btn => {
        btn.onclick = () => {
            editModal.style.display = 'none';
            detailModal.style.display = 'none';
        }
    });

    document.querySelectorAll('.open-detail-modal').forEach(btn => {
        btn.onclick = function() {
            document.getElementById('detail_nama').innerText = this.dataset.nama;
            document.getElementById('detail_paket').innerText = this.dataset.paket;
            document.getElementById('detail_jumlah').innerText = this.dataset.jumlah;
            document.getElementById('detail_waktu').innerText = this.dataset.waktu;
            document.getElementById('detail_tanggal').innerText = this.dataset.tanggal;
            document.getElementById('detail_no').innerText = this.dataset.no;
            const total = parseInt(this.dataset.total) || 0;
            document.getElementById('detail_total').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('detail_status').innerText = this.dataset.status;
            detailModal.style.display = 'block';
        }
    });

    document.querySelectorAll('.open-edit-modal').forEach(btn => {
        btn.onclick = function() {
            document.getElementById('modal_nama').value = this.dataset.nama;
            document.getElementById('modal_waktu').value = this.dataset.waktu;
            document.getElementById('modal_tanggal').value = this.dataset.tanggal;
            document.getElementById('modal_no').value = this.dataset.no;
            document.getElementById('modal_status').value = this.dataset.status;
            document.getElementById('editTransaksiForm').action = '/transaksi/' + this.dataset.id;
            editModal.style.display = 'block';
        }
    });

    window.onclick = (e) => {
        if (e.target == editModal) editModal.style.display = 'none';
        if (e.target == detailModal) detailModal.style.display = 'none';
    }
});
</script>
</body>
</html>