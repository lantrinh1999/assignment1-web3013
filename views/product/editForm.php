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
        <form name="myForm" id="signupForm" action="<?= $baseUrl . "product-save-edit"?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3 mb-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tên sp</label>
                        <input type="text" name="name" id="" class="form-control" value="<?= $product->name?>">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" id="" class="form-control">


                            <?php foreach ($cates as $c):?>
                                <?php $selected = $product->cate_id === $c->id ? "selected" : "" ?>
                                <option <?= $selected ?> value="<?= $c->id?>"><?= $c->cate_name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sp</label>
                        <input type="number" name="price" id="" class="form-control" value="<?= $product->price?>">
                    </div>
                    <div class="form-group">
                        <label for="">Sao đánh giá sp</label>
                        <input type="number" name="star" id="" class="form-control" value="<?= $product->star?>">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem sp</label>
                        <input type="number" name="views" id="" class="form-control" value="<?= $product->views?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="img-preview mt-5">
                        <?php
                        $imgDefault = $product->image != null ? $product->image : "images/default-img.png";
                        ?>
                        <img src="<?= $imgDefault ?>" alt="" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sp</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" id="" rows="3" class="form-control" value=""><?= $product->short_desc?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" id="" rows="6" class="form-control" value=""><?= $product->detail?></textarea>
                    </div>
                </div>
                <div class="justify-content-center">
                    <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                    <a href="<?= $baseUrl . "product" ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
 



    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery/jquery.validate.min.js"></script>
    <script src="plugins/jquery/jquery.mockjax.js"></script>    
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>



    <script type="text/javascript">


        $( document ).ready( function () {

            $.mockjax({
                url: "names.action",
                response: function(settings) {
                    var name = settings.data.name,
                    names = [<?=$checkname?>];
                    this.responseText = "true";
                    if ($.inArray(name, names) !== -1) {
                        this.responseText = "false";
                    }
                },
                responseTime: 500
            });


            $( "#signupForm" ).validate( {
                rules: {
                    name: {
                        required: true,
                        remote: "names.action"

                    },
                    cate_id: "required",
                    price: "required",
                    star: "required",
                    views: "required",
                    short_desc: "required",
                    detail: "required",
                    role: "required"
                },
                messages: {
                    cate_id: "Please enter ",
                    price: "Please enter ",
                    star: "Please enter ",
                    views: "Please enter ",
                    short_desc: "Please enter ",
                    detail: "Please enter ",
                    image: "Please choose image ",

                    role: "Please enter ",
                    name: {
                        required: "Please enter a valid name",
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
               },"Please enter a valid name address"
            );


        } );
    </script>    

</body>
</html>
