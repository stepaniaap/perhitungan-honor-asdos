<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="card mt-4">
        <div class="card-header"><strong>Edit Data Matakuliah</strong></div>
        <div class="card-body">
        <form action="/data_matakuliah/update_mk/{{$mk->id_makul}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Kode Matakuliah</label>
                    <input type="text" name="kode_mk" class="form-control" value="{{$mk->kode_mk}}"readonly>
                </div>
    
                <div class="form-group">
                    <label>Nama Matakuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="{{$mk->nama_mk}}">
                </div>
    
                <div class="form-group">
                    <label>Bobot SKS</label>
                    <input type="number" name="bobot_sks" class="form-control" value="{{$mk->bobot_sks}}">
                </div>
    
                <div class="form-group">
                    <label>Grup</label>
                    <input type="text" name="grup" class="form-control" value="{{$mk->grup}}">
                </div>
    
                <div class="form-group">
                    <label>Ruang</label>
                    <input type="text" name="ruang" class="form-control" value="{{$mk->ruang}}">
                </div>
    
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="text" name="waktu" class="form-control" value="{{$mk->waktu}}">
                </div>
    
                <div class="form-group">
                    <label>Dosen Pengampu</label>
                    <input type="text" name="dosen_pengampu" class="form-control" value="{{$mk->dosen_pengampu}}">
                </div>
    
                <div class="form-group mt-4">
                    <button type="submit" role="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
       
        </div>
    </div>
</div>
    
</body>
</html>

