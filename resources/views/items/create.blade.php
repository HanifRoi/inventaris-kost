<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Inventaris</title>
</head>
<body>
    <h1>Tambah Barang Baru</h1>

    <a href="{{ route('items.index') }}">Kembali ke Daftar</a>
    <br><br>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf <!-- Wajib ada di Laravel untuk keamanan form -->

        <div style="margin-bottom: 10px;">
            <label>Kode Barang:</label><br>
            <input type="text" name="code_item" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Nama Barang:</label><br>
            <input type="text" name="name" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Kategori:</label><br>
            <select name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="1" min="1" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Kondisi:</label><br>
            <select name="condition" required>
                <option value="Baik">Baik</option>
                <option value="Perbaikan">Perbaikan</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Lokasi (Misal: Kamar 1, Dapur):</label><br>
            <input type="text" name="location" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Catatan Tambahan (Opsional):</label><br>
            <textarea name="notes" rows="3"></textarea>
        </div>

        <button type="submit">Simpan Barang</button>
    </form>
</body>
</html>