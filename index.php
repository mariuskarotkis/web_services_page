<?php
    ini_set('session.cookie_httponly', 1 );
    ini_set("display_errors" , "0");
    header("Content-Type: text/html;charset=UTF-8");

    define("DEFINE_ORGANIZATION", "Organization Name");
    require("services.php");
    $service_class = new Services();
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo DEFINE_ORGANIZATION ?> | Services</title>
        <meta name="description" content="Web services">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="img/icon.png">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <div class="pure-g">
                <div class="pure-u-1">
                    <div class="logo">
                    <?php if(file_exists('img/logo.png')) { ?><img alt="Logo" src="img/logo.png" /> <?php } ?><span class="org_title"><?php echo DEFINE_ORGANIZATION ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="black_line"></div>
        <div class="content">

<?php       foreach($service_class->services_types as $service_type) {
                if(isset($service_class->services[$service_type]['services']) && $service_class->services[$service_type]['services']) { ?>
                    <div class="div_service_title_line">
                        <div class="service_title">
                            <?php echo $service_class->services[$service_type]['title']; ?>
                        </div>
                    </div>
                    <div class="pure-g">
                        <?php       foreach($service_class->services[$service_type]['services'] as $service) { ?>
                            <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-1-5 pure-u-lg-1-6 div_service_line d-flex align-items-stretch">
                                <div class="card c">
                                    <div class="card-header b"><?php echo $service['title']; ?></div>
                                    <?php if(isset($service['img'])) { ?>
                                        <div class="card-body align-items-center d-flex justify-content-center">
                                            <a href="<?php echo $service['url'] ?>" target="_blank">
                                                <?php echo ($service['img'] ? '<img src="'.$service['img'].'" class="service_img" alt="'.$service['type'].'">' : ''); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="card-footer">
                                        <a href="<?php echo $service['url']; ?>" target="_blank" title="<?php echo $service['title']; ?>"><?php echo $service['url']; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php       } ?>
                    </div>
                <?php   }
            } ?>

        </div>
        <div class="footer">
            <div class="content">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-2">
                        <p>&copy; <a href="http://karotkis.lt" target="_blank">karotkis.lt</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
