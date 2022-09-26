<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url()?>/asset/css/bootstrap.rtl.min.css">
  <title>LOGIN</title>
</head>
<body style="background-image: url(/asset/wallpaperbetter.jpg); display: flex; align-content: center; justify-content: center;">
  <div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="col-lg-3 col-md-4">
        <div class="card">
          <div class="card-header bg-info" style="align-items: center; justify-content: center; display: flex;">
            <b>FROM LOGIN
          </div>
          <div class="card-body">
            <form action="plogin" method="post">
              <img src="/asset/pngwing.png" alt="profile" style="display: flex; padding:auto; margin-left: auto; margin-right: auto; width:40% ;">
              <div class="form-group">
                <label for="user" style="align-items: center; justify-content: center; display: flex;">Username</label>
                <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password" style="align-items: center; justify-content: center; display: flex; margin-top: 2%;">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="modal-footer" style="display: flex; justify-content: center; align-items: center;">
                <button type="submit" class="btn btn-info mt-4 mx-3">Login</button>
                <button type="reset" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Reset</button>
              </div>
            </form>
          </div>
          </b>
        </div>
        <?php if(!empty(session()->getFlashdata('eror'))) : ?>
          <div class="alert alert-success">
            <?php session()->getFlashdata('eror');?>
          </div>
          <?php endif?>
      </div>
    </div>
  </div>


</div>
</body>
</html>