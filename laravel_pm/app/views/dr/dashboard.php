<!DOCTYPE html>
<html>
<head>
    <title>Prescription Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/validation/validationEngine.jquery.css" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/alertify/alertify.core.css" rel="stylesheet" media="screen">
    <link href="css/alertify/alertify.default.css" rel="stylesheet" media="screen">
    <link href="css/app/base-style.css" rel="stylesheet">

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/app/App.js"></script>
    <script src="js/app/utility/form.jquery.js"></script>
    <script src="js/app/utility/alertify.min.js"></script>
    <script src="js/app/utility/util.js"></script>
    <script src="js/app/utility/prototype.js"></script>
    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/app/utility/form.js"></script>
    <script src="js/app/utility/srui-tabs.js"></script>
    <script src="js/app/utility/ui.js"></script>

    <script src="js/app/utility/TableTab.js"></script>
    <script src="js/app/tabs/dr/prescription-tab.js"></script>

</head>

<body>
    <div id="admin-panel-container">
        <div class="container-fluid">
            <div class="row top-header">
                <div class="navbar-right">
                    <span>Hi <?php echo $user->userable->name; ?></span>
                    <a href="<?php echo(SR::$baseUrl);?>logout">
                        <button class="btn btn-xs" title="Logout">
                            <span class="glyphicon glyphicon-off"></span>
                        </button>
                    </a>
                    <button class="btn btn-xs" title="Change Password" id="change-password-btn">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                </div>
            </div>
            <div class="row body">
                <div id="tabs">
                    <ul class="header-list">
                        <li tab-id="prescription"><a href="<?php echo SR::$baseUrl ?>prescription/table-view"><div class="icon"></div><div class="head-title">Prescription</div></a></li>
<!--                        <li tab-id="profile"><a href="--><?php //echo SR::$baseUrl ?><!--doctor/profile"><div class="icon"></div><div class="head-title">Profile</div></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>

</body>
</html>