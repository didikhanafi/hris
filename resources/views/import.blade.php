<!DOCTYPE html>
<html>
<head>
    <title>Import Data Mutasi Karyawan</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import Data</button>
    </form>
</body>
</html>
