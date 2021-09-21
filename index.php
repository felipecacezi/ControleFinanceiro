<?php include_once "src/helpers/php/constants.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro</title>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo ROOT_PUBLIC.'css/index/index.css'; ?>">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">

    
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-12"><br></div>

            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>Controle Financeiro</h2>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            
                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-md-12 row">

                                        <div class="col-md-4" style="padding-top: 30px;">
                                            <div class="input-group">
                                                <span class="input-group-text">Saldo Atual</span>
                                                <input id="saldo" type="text" aria-label="First name" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Crédito</label>
                                            <div class="input-group mb-3">
                                                <input id="credito" type="text" class="form-control">
                                                <button id="btnAddCredito" class="btn btn-outline-success" type="button"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Débito</label>
                                            <div class="input-group mb-3">
                                                <input id="debito" type="text" class="form-control">
                                                <button id="btnSubCredito" class="btn btn-outline-danger" type="button"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-2" style="margin-top: 30px;">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-chart-line"></i> Extrato</button>
                                        </div> -->

                                    </div>

                                    <div class="col-md-12"><br></div>

                                    <div class="col-md-12">
                                        <center><h2>Movimentação</h2></center>
                                    </div>

                                    <div class="col-md-12"><br></div>

                                    <div class="col-md-12 row" style="max-height: 500px; overflow-y: scroll;"> 
                                        
                                        <center>
                                            <div class="col-md-12">
                                                <table id="tbExtrato" style="width:100%" class="table table-striped table-responsive table-light table-bordered">
                                                    <thead>
                                                        <tr class="table-dark">
                                                            <th><center>#</center></th>
                                                            <th>Mov</th>
                                                            <th>Saldo</th>
                                                            <th>Data</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="grdExtrato"></tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </div>



                                    <div class="col-md-12"><br></div>

                                    

                                    

                                </div>

                            </div>

                            <br>

                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

    </div>

<script src="https://unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="http://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

<script src="<?php echo ROOT_PUBLIC.'js/index/BuscarSaldoAtual.js' ?>"></script>
<script src="<?php echo ROOT_PUBLIC.'js/index/BuscarTbExtrato.js' ?>"></script>
<script src="<?php echo ROOT_PUBLIC.'js/index/AddCredito.js' ?>"></script>
<script src="<?php echo ROOT_PUBLIC.'js/index/SubCredito.js' ?>"></script>

<script src="<?php echo ROOT_PUBLIC.'js/index/index.js' ?>"></script>

</body>
</html>