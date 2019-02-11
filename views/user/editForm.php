




<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= $baseUrl . "public/" ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
        em{
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sửa</h3>
            </div>
            <div class="panel-body">
                <form name="myForm" id="signupForm" onsubmit="return validateForm()" action="<?= $baseUrl . "user-save-edit"?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="name">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $user->name ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="email">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user->email ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="password">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="confirm_password">Confirm password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-4">
                            <label>Role</label>
                            <?php
                            $select = "";
                            foreach ($users as $u) {
                                if ($u->role === $user->role) {
                                   $select = "selected";
                                }
                            }
                             ?>
                            <select name="role" id="role" class="role form-control">
                                <option value="">---</option>
                                <option <?= $select ?> value="900">Admin</option>
                                <option <?= $select ?> value="700">Moderator</option>
                                <option <?= $select ?> value="1">Member</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>













    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery/jquery.validate.min.js"></script>
    <script src="plugins/jquery/jquery.mockjax.js"></script>    
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>



    <script type="text/javascript">


        $( document ).ready( function () {

            $.mockjax({
                url: "emails.action",
                response: function(settings) {
                    var email = settings.data.email,
                    emails = [<?=$checkemail?>];
                    this.responseText = "true";
                    if ($.inArray(email, emails) !== -1) {
                        this.responseText = "false";
                    }
                },
                responseTime: 500
            });


            $( "#signupForm" ).validate( {
                rules: {
                    name: "required",
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        "regex": /^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/,
                        remote: "emails.action"

                    },
                    role: "required"
                },
                messages: {
                    name: "Please enter your name",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        remote: jQuery.validator.format("{0} is already in use")
                    },
                    role: "Please accept our policy"
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                },


            } );
            jQuery.validator.addMethod(
              "regex",
               function(value, element, regexp) {
                   if (regexp.constructor != RegExp)
                      regexp = new RegExp(regexp);
                   else if (regexp.global)
                      regexp.lastIndex = 0;
                      return this.optional(element) || regexp.test(value);
               },"Please enter a valid email address"
            );


        } );
    </script>    

</body>
</html>