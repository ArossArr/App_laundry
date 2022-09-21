<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url()?>/asset/css/bootstrap.rtl.min.css">
  <title>LOGIN</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="col-lg-4 col-md-4">
        <div class="card">
          <div class="card-header bg-info" >
            From Login
          </div>
          <div class="card-body">
            <form action="plogin" method="post">
              <div class="form-group">
                <label for="user ">username</label>
                <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info mt-4 mx-3">Login</button>
                <button type="reset" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Reset</button>
              </div>
            </form>
          </div>
        </div>
        <?php if(!empty(session()->getFlashdata('eror'))) : ?>
          <div class="alert alert-success">
            <?php session()->getFlashdata('eror');?>
          </div>
          <?php endif?>
      </div>
    </div>
  </div>
<div class="modal-body">

</div>
</body>
</html>