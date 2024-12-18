<?php /** @var yii\web\View $this */ $this->title = 'pradogest | Reservas';
?>

<head>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.10.1/styles/overlayscrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs5.min.css">
</head>
<div class="site-index">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0">Listado de reservas</h2>
            </div>
            <div class="col-sm-6 d-grid justify-content-md-end">
                <h2 class="m-0"><button class="btn btn-success" type="button">Nueva reserva</button></h2>
            </div>
        </div>
    </div>
    <br>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="mb-1 row">
                        <label class=" col-sm-3 col-form-label">Reserva #3</label>
                        <label class="col-sm-1 col-form-label">Entrada</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="fechaEntrada"
                                value="01/01/2024">
                        </div>
                        <label class=" col-sm-1 col-form-label">Salida</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="fechaSalida"
                                value="01/01/2024">
                        </div>
                        <label class="col-sm-1 col-form-label">Estado</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="estado" value="En progreso">
                        </div>
                    </div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h5 class="m-0">Datos de la reserva</h5>
                            </div>
                            <div class="col-sm-6 d-grid justify-content-md-end">
                                <h5 class="m-0">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">Nombre</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Primer apellido</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Segundo apellido</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">Entrada</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control-plaintext" id="staticEmail" value="">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Salida</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control-plaintext" id="staticEmail" value="">
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">Reserva</label>
                        <div class="col-sm-1">
                            <input type="number" class=" form-control-plaintext" id="staticEmail" value="" min="10.0"
                                max="30" step="0.5">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Total</label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control-plaintext" id="staticEmail" value="" min="30.0"
                                max="3000" step="0.5">
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Origen</label>
                        <div class="col-sm-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>


                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h5 class="m-0">Húespedes</h5>
                            </div>
                            <div class="col-sm-6 d-grid justify-content-md-end">
                                <h2 class=" m-0">
                                    <button class="btn btn-success btn-sm" type="button">
                                        Nuevo húesped </button>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <table class="table sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <t>
                                <th scope=" row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-warning btn-sm" type="button"><i class="fa
                                            fa-tasks" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"
                                                aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <h5>Reserva #2</h5>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                    the
                    <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine
                    this
                    being filled with some actual content.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <h5>Reserva #1</h5>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                    the
                    <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                    exciting
                    happening here in terms of content, but just filling up the space to make it look, at least at
                    first
                    glance, a bit more representative of how this would look in a real-world application.
                </div>
            </div>
        </div>
    </div>
</div>