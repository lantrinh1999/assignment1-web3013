
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
                <h3 class="panel-title">Đăng kí</h3>
            </div>
            <div class="panel-body">
                <form name="myForm" id="signupForm" onsubmit="return validateForm()" action="<?= $baseUrl . "category-save-add"?>" method="post" class="form-horizontal">
                    <div class="row mt-3 mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="cate_name" id="" class="form-control">
                                
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                <a href="<?= $baseUrl ."category" ?>" class="btn btn-sm btn-danger">Hủy</a>
                            </div>
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
                url: "cate_names.action",
                response: function(settings) {
                    var cate_name = settings.data.cate_name,
                    cate_names = [<?=$checkcate_name?>];
                    this.responseText = "true";
                    if ($.inArray(cate_name, cate_names) !== -1) {
                        this.responseText = "false";
                    }
                },
                responseTime: 500
            });


            $( "#signupForm" ).validate( {
                rules: {

                    cate_name: {
                        required: true,
                        remote: "cate_names.action"

                    }
                },
                messages: {
                    cate_name: {
                        required: "Please enter a valid Category",
                        remote: jQuery.validator.format("{0} is already in use")
                    }
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


        } );
    </script>    

</body>
</html>