<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @extends('layouts.conquer2')
    @section('content')
    <main>
        {{-- <section class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Daftar Halte di Surabaya</h1>
                <p class="lead text-muted">Tempat masyarakat untuk menunggu bus yang tercinta</p>
                <p>
                  <a href="#" class="btn btn-primary my-2">Pesan</a>
                  <a href="#" class="btn btn-secondary my-2">Kembali ke Home</a>
                </p>
              </div>
            </div>
          </section> --}}
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($data as $place)
                    <div class="col">
                        <div class="card shadow-sm">
                            <!-- Image Placeholder or dynamic image URL -->
                            <img src="{{asset('images/'.$place->image)}}" class="card-img-top" alt="Ticket Image">
                            <div class="card-body">
                                <p class="card-text">{{ $place->name }}</p>
                                <p class="card-text"><strong>Description:</strong> {{ $place->description }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $place->address }}</p>
                                <p class="card-text"><strong>City:</strong> {{ $place->city }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    {{-- <small class="text-muted">{{ $ticket->created_at->diffForHumans() }}</small>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @endsection
</body>

</html>