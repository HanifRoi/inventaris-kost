<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Kost</title>
</head>
<body>
    <h1>Daftar Barang Inventaris Kost</h1>
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('items.create') }}">Tambah Barang Baru</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px; width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->code_item }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->condition }}</td>
                    <td>{{ $item->location }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>