<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/Laporan.css') }}">
</head>
<body>
    <section class="tentang-section">
        <div class="logo-container">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="logo">
            </a>
        </div>

        <div class="title">
            LAPORAN TRANSAKSI RESERVASI
        </div>

        <div class="search-container">
            <form action="{{ route('laporan.index') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari transaksi..."
                    class="search-input"
                    value="{{ request('search') }}"
                >
                <button type="submit" class="search-btn">
                    Search
                </button>
            </form>
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <div class="table-scroll-wrapper">
                    <table class="transaksi-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                               <th>Paket</th>
                                <th>Jumlah Orang</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>No Tlpn</th>
                                <th>Total</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->reservasi->nama }}</td>
                                    <td>{{ $transaksi->setmenu->Nama }}</td>
                                    <td>{{ $transaksi->reservasi->jumlah_orang }}</td>
                                    <td>{{ $transaksi->reservasi->waktu }}</td>
                                    <td>{{ $transaksi->reservasi->tanggal }}</td>
                                    <td>{{ $transaksi->reservasi->no_tlpn }}</td>
                                    <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                                    <td>
                                        <!-- DETAIL -->
                                        <button
                                            type="button"
                                            class="btn-detail open-detail-modal"
                                            data-id="{{ $transaksi->id }}"
                                            data-nama="{{ $transaksi->reservasi->nama }}"
                                            data-paket="{{ $transaksi->setmenu->Nama }}"
                                            data-jumlah="{{ $transaksi->reservasi->jumlah_orang }}"
                                            data-waktu="{{ $transaksi->reservasi->waktu }}"
                                            data-tanggal="{{ $transaksi->reservasi->tanggal }}"
                                            data-no="{{ $transaksi->reservasi->no_tlpn }}"
                                            data-total="{{ $transaksi->total }}"
                                            data-status="{{ $transaksi->status }}"
                                        >
                                            Detail
                                        </button>

                                        <!-- EDIT -->
                                        <button
                                            type="button"
                                            class="btn-edit open-edit-modal"
                                            data-id="{{ $transaksi->id }}"
                                            data-nama="{{ $transaksi->reservasi->nama }}"
                                            data-paket="{{ $transaksi->setmenu->Nama }}"
                                            data-jumlah="{{ $transaksi->reservasi->jumlah_orang }}"
                                            data-waktu="{{ $transaksi->reservasi->waktu }}"
                                            data-tanggal="{{ $transaksi->reservasi->tanggal }}"
                                            data-no="{{ $transaksi->reservasi->no_tlpn }}"
                                            data-total="{{ $transaksi->total }}"
                                            data-status="{{ $transaksi->status }}"
                                        >
                                            Edit
                                        </button>

                                        <!-- HAPUS -->
                                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                onclick="return confirm('Yakin ingin menghapus?')"
                                                class="btn-delete"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="table-pagination">
                    <span class="pagination-label">
                        Halaman {{ $transaksis->currentPage() }} dari {{ $transaksis->lastPage() }}
                    </span>
                    {{ $transaksis->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- Modal Detail -->
        <div id="detailTransaksiModal" class="modal">
            <div class="modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>DETAIL TRANSAKSI</h5>
                    </div>

                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="modal-label">NAMA</td>
                                    <td id="detail_nama"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">PAKET</td>
                                    <td id="detail_paket"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">JUMLAH</td>
                                    <td id="detail_jumlah"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">WAKTU</td>
                                    <td id="detail_waktu"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">TANGGAL</td>
                                    <td id="detail_tanggal"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">NO TELP</td>
                                    <td id="detail_no"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label">TOTAL</td>
                                    <td id="detail_total" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td class="modal-label-alt">STATUS</td>
                                    <td id="detail_status" style="font-weight:bold; text-transform:uppercase;"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center mt-3">
                            <button type="button" class="btn-tutup-modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editTransaksiModal" class="modal">
            <div class="modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>EDIT TRANSAKSI</h5>
                    </div>

                    <div class="modal-body">
                        <form id="editTransaksiForm" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="modal_transaksi_id" name="id">

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="modal-label">NAMA</td>
                                        <td><input type="text" id="modal_nama" class="form-control" readonly></td>
                                    </tr>
                                    <tr>
                                        <td class="modal-label">WAKTU</td>
                                        <td><input type="text" name="waktu" id="modal_waktu" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td class="modal-label">TANGGAL</td>
                                        <td><input type="date" name="tanggal" id="modal_tanggal" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td class="modal-label">NO TELP</td>
                                        <td><input type="text" name="no_tlpn" id="modal_no" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td class="modal-label-alt">STATUS</td>
                                        <td>
                                            <select name="status" id="modal_status" class="form-control">
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="batal">Batal</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="modal-footer-btns mt-3">
                                <button type="button" class="btn-tutup-modal">Tutup</button>
                                <button type="submit" class="btn-simpan">Simpan</button>
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

            // Fungsi modal (Helper)
            const showModal = (modal) => {
                if (!modal) return;
                modal.style.setProperty('display', 'block', 'important');
            };
            const hideModal = (modal) => {
                if (!modal) return;
                modal.style.setProperty('display', 'none', 'important');
            };

            // Tutup modal
            document.querySelectorAll('.btn-tutup-modal').forEach(btn => {
                btn.onclick = () => {
                    hideModal(editModal);
                    hideModal(detailModal);
                };
            });

            // Tutup modal jika klik di luar kotak
            window.onclick = e => {
                if (e.target === editModal) hideModal(editModal);
                if (e.target === detailModal) hideModal(detailModal);
            };

            // Event delegation
            document.addEventListener('click', function (e) {
                // Tombol DETAIL
                const detailBtn = e.target.closest('.open-detail-modal');
                if (detailBtn) {
                    e.preventDefault();

                    document.getElementById('detail_nama').innerText = detailBtn.dataset.nama;
                    document.getElementById('detail_paket').innerText = detailBtn.dataset.paket;
                    document.getElementById('detail_jumlah').innerText = detailBtn.dataset.jumlah;
                    document.getElementById('detail_waktu').innerText = detailBtn.dataset.waktu;
                    document.getElementById('detail_tanggal').innerText = detailBtn.dataset.tanggal;
                    document.getElementById('detail_no').innerText = detailBtn.dataset.no;

                    const total = parseInt(detailBtn.dataset.total) || 0;
                    document.getElementById('detail_total').innerText = 'Rp ' + total.toLocaleString('id-ID');
                    document.getElementById('detail_status').innerText = detailBtn.dataset.status;

                    showModal(detailModal);
                    return;
                }

                // Tombol EDIT
                const editBtn = e.target.closest('.open-edit-modal');
                if (editBtn) {
                    e.preventDefault();

                    const id = editBtn.dataset.id;
                    document.getElementById('modal_transaksi_id').value = id;
                    document.getElementById('modal_nama').value = editBtn.dataset.nama;
                    document.getElementById('modal_waktu').value = editBtn.dataset.waktu;
                    document.getElementById('modal_tanggal').value = editBtn.dataset.tanggal;
                    document.getElementById('modal_no').value = editBtn.dataset.no;
                    document.getElementById('modal_status').value = editBtn.dataset.status;
                    document.getElementById('editTransaksiForm').action = '/transaksi/' + id;

                    showModal(editModal);
                    return;
                }
            });
        });
    </script>
</body>
</html>