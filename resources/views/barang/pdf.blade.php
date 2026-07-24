<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Barang Inventaris</title>

    <!-- CDN html2pdf.js untuk Otomatis Download PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            padding: 20px; 
            color: #0f172a; 
            background: #ffffff; 
        }
        .header { 
            text-align: center; 
            margin-bottom: 25px; 
            border-bottom: 3px solid #312e81; 
            padding-bottom: 12px; 
        }
        .header h2 { 
            margin: 0; 
            text-transform: uppercase; 
            color: #1e1b4b; 
            font-size: 20px; 
            font-weight: 800; 
            letter-spacing: 1px;
        }
        .header p { 
            margin: 6px 0 0 0; 
            font-size: 12px; 
            color: #64748b; 
            font-weight: 600;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid #cbd5e1; 
            padding: 10px 12px; 
            text-align: left; 
            font-size: 13px; 
        }
        th { 
            background-color: #312e81 !important; 
            color: #ffffff !important; 
            text-transform: uppercase; 
            font-size: 11px; 
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) { 
            background-color: #f8fafc; 
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        
        .btn-container {
            margin-bottom: 20px; 
            display: flex; 
            gap: 10px;
            align-items: center; 
            background: #f1f5f9; 
            padding: 12px 16px; 
            border-radius: 8px;
        }
        .btn-download { 
            padding: 10px 20px; 
            background: #4f46e5; 
            color: white; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 13px; 
            transition: all 0.2s;
        }
        .btn-download:hover {
            background: #4338ca;
        }
        .btn-print { 
            padding: 10px 20px; 
            background: #0284c7; 
            color: white; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 13px; 
        }

        @media print {
            .no-print { display: none !important; }
            body { padding: 0; margin: 0; }
        }
    </style>
</head>
<body>

    <!-- Panel Tombol (Sembunyi saat diprint) -->
    <div class="no-print btn-container">
        <button onclick="downloadPDF()" class="btn-download">
            📥 Unduh File PDF
        </button>
        <button onclick="window.print()" class="btn-print">
            🖨️ Cetak Manual
        </button>
        <span style="font-size: 12px; color: #475569; font-weight: 600; margin-left: auto;">
        <b></b>
        </span>
    </div>

    <!-- Area Konten Laporan yang akan di-export ke PDF -->
    <div id="area-laporan">
        <!-- Kop / Header Laporan -->
        <div class="header">
            <h2>LAPORAN STOK BARANG</h2>
            <p>Sistem Informasi Manajemen Inventaris • Tanggal Dicetak: {{ date('d F Y') }}</p>
        </div>

        <!-- Tabel Data Barang -->
        <table>
            <thead>
                <tr>
                    <th class="text-center" width="40">NO</th>
                    <th>NAMA BARANG</th>
                    <th class="text-center" width="120">JUMLAH STOK</th>
                    <th class="text-right" width="150">HARGA SATUAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $index => $item)
                    <tr>
                        <td class="text-center" style="font-weight: bold; color: #64748b;">{{ $index + 1 }}</td>
                        <td style="font-weight: 700; color: #0f172a;">{{ $item->nama_barang }}</td>
                        <td class="text-center" style="font-weight: 600;">{{ $item->stok }} Unit</td>
                        <td class="text-right" style="font-weight: 700; color: #4338ca;">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center" style="padding: 30px; color: #94a3b8; font-style: italic;">
                            Belum ada data barang yang tersimpan dalam sistem.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        // Fungsi untuk mengunduh PDF secara otomatis
        function downloadPDF() {
            const element = document.getElementById('area-laporan');
            const options = {
                margin:       10,
                filename:     'Laporan-Stok-Barang-{{ date("Y-m-d") }}.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(options).from(element).save();
        }
    </script>
</body>
</html>