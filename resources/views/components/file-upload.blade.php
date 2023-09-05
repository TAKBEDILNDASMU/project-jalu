@php
if (!isset($path)) {
$path = "Tidak ada file";
} else {
$pathBerkas = $path->path_berkas;
$fileInfo = pathinfo($pathBerkas);
$path = $path->nama_berkas . "." . $fileInfo['extension'];

$maxLength = 20; // Adjust this to your desired maximum length
$extension = pathinfo($path, PATHINFO_EXTENSION); // Get the file extension
$basename = pathinfo($path, PATHINFO_FILENAME); // Get the filename without extension

// Shorten the filename if it's longer than the maximum length
if (strlen($basename) > $maxLength) {
$basename = substr($basename, 0, $maxLength) . '...';
$path = $basename . '.' . $extension;
}
}
@endphp

<div class="form-group my-4">
    <input style="display:none" type="file" class="form-control-file" id="file{{$id}}" name="path_berkas">
    <label class="btn btn-info text-white" for="file{{$id}}">Klik untuk Upload</label>
    <span class="ms-2" id="file-chosen">{{$path}}</span>
</div>