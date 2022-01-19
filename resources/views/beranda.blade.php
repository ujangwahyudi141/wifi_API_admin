<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Sebaran Lokasi Wifi</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sebaran Wifi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Sebaran Lokasi Wifi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h3>WIFI</h3>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                                            Tambah Data
                                        </button>
                                    </div>
                                    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahData">Tambah Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="/simpan" method="POST">
                                                    @csrf
                                                    <div class="mb-3 row">
                                                        <label for="nama_wifi" class="col-sm-4 col-form-label">Nama Wifi</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="nama_wifi" class="form-control" id="nama_wifi">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="lokasi" class="form-control" id="lokasi">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-7">
                                                            <select name="status" id="status">
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <form action="/home">
                                            @csrf
                                        <div class="input-group mb-3">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search..</button>
                                            <input type="text" name="search" class="form-control" placeholder="Ketik Pencarian" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Nama Wifi</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=0;
                                @endphp
                                @foreach ($dataWifi as $data)
                                @php
                                    ++$no;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $data->nama_wifi }}</td>
                                    <td>{{ $data->lokasi }}</td>
                                    <td>{{ ($data->status == 1) ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td></td>
                                    <td><button type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $data->id }}">
                                        Update
                                    </button> | <a href="/delete/{{ $data->id }}"><button class="badge bg-danger">Delete</button></a></td>
                                </tr>

                                {{-- edit Data --}}
                                <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="edit">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/edit/{{ $data->id }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3 row">
                                                        <label for="nama_wifi" class="col-sm-4 col-form-label">Nama Wifi</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="nama_wifi" class="form-control" id="nama_wifi" value="{{ $data->nama_wifi }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $data->lokasi }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-7">
                                                            <select name="status" id="status">
                                                                @if ($data->status == 1)
                                                                    <option value="1">Aktif</option>
                                                                    <option value="0">Tidak Aktif</option>
                                                                @else
                                                                <option value="0">Tidak Aktif</option>
                                                                <option value="1">Aktif</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
