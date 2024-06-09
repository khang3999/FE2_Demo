<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FE2 | FIT-TDC 2024</title>
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: #000;
        }

        .canvas {
            perspective: 500px;
            position: fixed;
            inset: 0;
        }

        .gallery {
            position: fixed;
            inset: 0;
            transform-style: preserve-3d;
            transition: .5s ease-out;
        }

        .gallery-bg {
            background: url(public/images/background.jpg);
            background-size: cover;
            position: fixed;
            inset: -20%;
            transition: .5s ease-out;
        }

        .pic {
            width: 100px;

            position: fixed;
            /* background: #fff; */
            box-shadow: 0 0 20px #000;
            transition: .5s;
            cursor: pointer;

        }

        .pic img {
            width: 100%;
        }

        .pic:hover {
            box-shadow: 0 0 20px yellow;
            z-index: 100;
            transform: translateZ(250px) !important;
            filter: brightness(100%) !important;
        }

        .control {
            padding: 5px;
            font-size: .5em;
            color: #fff;
            background: rgba(0, 0, 0, .5);
        }
    </style>
</head>

<body>
    <div class="canvas">
        <div class="gallery-bg"></div>
        <div class="gallery"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="public/js/app.js"></script>
</body>

</html>