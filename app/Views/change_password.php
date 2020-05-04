<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'scripts/headScripts.php';?>
    <title>Exigo</title>
    <style type="text/css">
    
    .error{
        
        color:red;
    }
</style>
</head>
<body data-theme="">
        <?php require_once 'includes/appHeader.php';?>
        <?php require_once 'includes/appSidebar.php';?>
        <div class="app-content">
            <?php require_once 'templates/change_password.php';?>
        </div>
    <?php require_once 'scripts/bodyScripts.php';?>
</body>
</html>