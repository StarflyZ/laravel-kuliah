<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Daftar Album Halte di Surabaya</h1>
            <p class="lead text-muted">Tempat masyarakat untuk menunggu bus yang tercinta</p>
            <p>
              <a href="../place/" class="btn btn-primary my-2">Ke halaman daftar halte lengkap</a>
              <a href="../" class="btn btn-secondary my-2">Kembali ke Home</a>
            </p>
          </div>
        </div>
      </section>
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($data as $ticket)
                  <div class="col">
                    <div class="card shadow-sm">
                      <!-- Image Placeholder or dynamic image URL -->
                    <img src="{{asset('images/'.$ticket->place_id.".jpg")}}" class="card-img-top" alt="Ticket Image">
                      <div class="card-body">
                        <p class="card-text">{{ $ticket->report }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ $ticket->place->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                          </div>
                          {{-- <small class="text-muted">{{ $ticket->created_at->diffForHumans() }}</small> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
