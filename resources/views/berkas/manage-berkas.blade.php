<x-layout>

    @php
    $numberDelete = 1;
    $numberEdit = 1;
    @endphp
    <x-flash-message />
    <div class="container my-4 d-flex justify-content-end">
        <a href="/">Kembali</a>
    </div>



    <div class="container my-4 card bg-light mb-3 p-5">
        <h3>Tambah Berkas</h3>
        <form action="/berkas" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group my-4">
                <label for="exampleInputEmail1">Judul Berkas</label>
                <input type="text" class="form-control" name="nama_berkas" value="{{old('nama_berkas')}}">
            </div>
            <x-file-upload :id=1 />
            <button class="btn btn-primary my-2" type="submit">Tambah</button>
        </form>
    </div>

    <div class="container my-4 card bg-light mb-3 p-5">

        <table class="table container my-4 bg-light" style="vertical-align: middle">
            <h3>Hapus Berkas</h3>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berkas as $item)
                <tr>
                    <th scope="row">{{ $numberDelete++ }}</th>
                    <td>
                        <a href="/storage/{{$item->path_berkas}}" target="_blank" rel="noopener noreferrer">
                            {{$item->nama_berkas}}
                        </a>
                    </td>
                    <td class="d-flex gap-4">
                        <form action="/berkas/{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Apa anda yakin ?')" class="btn btn-danger"
                                type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="container my-4 card bg-light mb-3 p-5">
        <h3>Edit Berkas</h3>
        <table class="table container my-4 bg-light" style="vertical-align: middle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Ganti Judul</th>
                    <th scope="col">Ganti File</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berkas as $item)
                <form action="berkas/{{$item->id}}/" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <tr>
                        <th scope="row">{{$numberEdit++}}</th>
                        <td>
                            <input type="text" name="nama_berkas" value="{{$item->nama_berkas}}">
                        </td>
                        <td>
                            <x-file-upload :id="($numberEdit)" :path="$item" />
                        </td>
                        <td class="">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const fileInputs = document.querySelectorAll('.form-control-file');

        fileInputs.forEach((input, index) => {
            input.addEventListener('change', function () {
                const fileName = truncateFilename(input.value.split('\\').pop(), 20); // Get the selected file's name

                const fileChosen = document.querySelectorAll('#file-chosen')[index];
                fileChosen.textContent = fileName || 'No file'; // Update the text accordingly
            })
        })

        function truncateFilename(path, maxLength) {
            const extension = path.split('.').pop(); // Get the file extension
            const basename = path.substring(0, path.lastIndexOf('.')) || path; // Get the filename without extension

            // Shorten the filename if it's longer than the maximum length
            if (basename.length > maxLength) {
                const truncatedBasename = basename.substring(0, maxLength) + '...';
                return `${truncatedBasename}.${extension}`;
            } else {
                return path; // No need to truncate if it's shorter than the maximum length
            }
        }
    </script>

</x-layout>