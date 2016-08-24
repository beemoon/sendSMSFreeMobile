<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Send SMS</title>
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

                    <legend class="lead"><p>This is a SMS sending demonstration with Bootstrap form, PHP and AJAX background.</p><p>None UserID or password are stored or saved.</p></legend>
					<p></p>
					<div class="col-lg-9 col-lg-offset-2">
                    <form id="send-form" method="post" action="send.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">
						
							<div class="row">
                                <div class="col-md-4 private">
                                    <div class="form-group">
                                        <label for="userID">User ID</label>
                                        <input id="userID" type="text" name="userID" class="form-control" placeholder="user ID">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 private">
                                    <div class="form-group">
                                        <label for="userIDpwd">UserID key</label>
                                        <input id="userIDpwd" type="text" name="userIDpwd" class="form-control" placeholder="Your identification key">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            
							<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
									<label for="form_message">Destinataire</label>											
										<div class="radio">
										<label for="user-0">
										  <input name="user" id="user-0" value="0" checked="checked" type="radio">
										  Olivier
										</label>
										</div>
										
										<div class="radio">
										<label for="user-1">
										  <input name="user" id="user-1" value="1" type="radio">
										  Alex
										</label>
										</div>
									</div>                                        
									<div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pass">Password *</label>
                                        <input id="pass" type="password" name="pass" class="form-control" placeholder="Please, your password" data-error="password is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
										<label for="msg">Message *</label>
                                        <textarea id="msg" name="msg" class="form-control" placeholder="Your message here..." rows="4" required="required" data-error="Write your message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btn-send" value="Send message">
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
        <script src="js/send.js"></script>
    </body>
</html>
