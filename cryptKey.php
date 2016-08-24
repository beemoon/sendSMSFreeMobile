<!DOCTYPE html>
<html lang="en">
  <head>
		<title></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		
		<div class="container">

            <div class="row">

                <div class="col-lg-9 col-lg-offset-2">

                    <h1>Send SMS (Free Mobile) form by <a href="http://www.beemoon.fr">www.beemoon.fr</a></h1>

                    <legend class="lead"><p>Crypt user key to store it in file.</p></legend>
					<p></p>
					<div class="col-lg-9 col-lg-offset-2">
                    <form id="send-form" method="post" action="crypt.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">
						
							<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="userID">User ID</label>
                                        <input id="userID" type="text" name="userID" class="form-control" placeholder="user ID">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="key">UserID key</label>
                                        <input id="key" type="text" name="key" class="form-control" placeholder="userID key">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            
							<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password to crypt*</label>
                                        <input id="password" type="text" name="password" class="form-control" placeholder="Please, your password" required="required" data-error="password is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btn-send" value="Crypt key">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                </div>
                            </div>
                        </div>

                    </form>
					</div>
                </div>

            </div>

        </div>
        		
		
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/validator.js"></script>
        <script src="js/crypt.js"></script>
    </body>
</html>
