<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Ebook</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        ::selection {
            background-color: transparent;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>List Ebook</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ebook</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ebooks as $ebook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ebook->nama }}</td>
                    <td>
                        <a href="{{ route('viewPdf', $ebook->id) }}" class="btn btn-primary">Lihat</a>
                        <form action="{{ route('ebook.destroy', $ebook->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus eBook ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahEbookModal">Tambah Ebook</button>
    </div>

    <div class="modal fade" id="tambahEbookModal" tabindex="-1" role="dialog" aria-labelledby="tambahEbookModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahEbookModalLabel">Tambah Ebook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('ebook.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Ebook:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="file_pdf">File Ebook (PDF):</label>
                            <input type="file" class="form-control-file" id="file_pdf" name="file_pdf" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function viewPdf(url) {
            window.open(url, '_blank', 'toolbar=no,scrollbars=no,resizable=no,status=no');
        }
    </script>
</body>
</html>
