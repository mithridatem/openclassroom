<?php
    //require_once './env.php';
    //import de l'autoloader des classes
    require './vendor/autoload.php';
    use App\Controller\HomeController;
    /* use App\Controller\RolesController;
    use App\Controller\CategorieController;
    $rolesController = new RolesController(); */
    $homeController = new HomeController();
    //$categorieController = new CategorieController();
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    $id = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/openclassroom/':
            $homeController->getHome();
            break;
        case '/openclassroom/api/roles/add':
            $rolesController->addRoles();
            break;
        case '/openclassroom/api/roles/':
            $rolesController->findRolesById();
            break;
        case '/openclassroom/api/roles/all':
            $rolesController->findAllRoles();
            break;
        case '/openclassroom/api/roles/update':
            $rolesController->updateRoles();
            break;
        case '/openclassroom/api/categorie/add':
            $categorieController->addCategorie();
            break;
        case '/openclassroom/api/categorie/':
            $categorieController->findCategorieById();
            break;
        case '/openclassroom/api/categorie/all':
            $categorieController->findAllCategorie();
            break;
        case '/openclassroom/api/categorie/update':
            $categorieController->updateCategorie();
            break;
        default:
            $homeController->get404();
            break;
    }
?>
