<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Andi<?=$this->renderSection('title')?></title>
    <link rel="stylesheet" href="<?=base_url()?>/asset/css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" class="navbar-brand">ANDI LAUNDRY</a>
            <button class="navbar-toggler navbar-toggler-right" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbara"
            aria-controll="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbara">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
            </div>
        </div>
    </nav> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-primary">
                <?= $this->include('componen/sidebar.php') ?>
            </div>
            <div class="col-md-10">
                <?= $this->renderSection('content')?>
            </div>
        </div>
    </div>
</body>
</html>
<script src="<?=base_url()?>/asset/jquery/jquery-3.6.0.min.js"></script>
<script src="<?=base_url()?>/asset/js/bootstrap.js"></script>
<?=$this->renderSection('script')?>