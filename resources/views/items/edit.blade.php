<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang Inventaris</title>
</head>
<body>
    <h1>Edit Data Barang</h1>

    <a href="{{ route('items.index') }}">Kembali ke Daftar</a>
    <br><br>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib untuk proses update data di Laravel -->

        <div style="margin-bottom: 10px;">
            <label>Kode Barang:</label><br>
            <input type="text" name="code_item" value="{{ $item->code_item }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Nama Barang:</label><br>
            <input type="text" name="name" value="{{ $item->name }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Kategori:</label><br>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ $item->stock }}" min="1" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Kondisi:</label><br>
            <select name="condition" required>
                <option value="Baik" {{ $item->condition == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Perbaikan" {{ $item->condition == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                <option value="Rusak" {{ $item->condition == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Lokasi (Misal: Kamar 1, Dapur):</label><br>
            <input type="text" name="location" value="{{ $item->location }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Catatan Tambahan (Opsional):</label><br>
            <textarea name="notes" rows="3">{{ $item->notes }}</textarea>
        </div>

        <button type="submit">Update Barang</button>
    </form>
</body>
</html>