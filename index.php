<?php

// BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';

// Object
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';

// Controller
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/ArticleController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RoleController.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ArticleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RoleManager.php';


// User Manager

    // Object Mika(Groot)
        /*$mika = new User(null, 'Mika', 'furet', 2);

    // C - Create Mika in db

        $mikaManager = new UserManager();
        $mikaManager->saveUser($mika);*/

    // R - Read Mika by Id

        /*$mikaManager = new UserManager();
        $mika = $mikaManager->getById(4);

        echo "<pre>";
        print_r($mika);
        echo "</pre";*/

    // U - Update Mika's password from 'furet' to 'fouine'
        /*$mika = new User(4, 'Mika', 'fouine', 2);

        $mikaManager = new UserManager();
        $mikaManager->saveUser($mika);*/

    // D - Delete Mika from DB

        /*$mikaManager = new UserManager();
        $mika = $mikaManager->getById(4);
        $mikaManager->delUser($mika);*/

    // R - Read All User
        /*$user = new UserManager();
        echo "<pre>";
        print_r($user->getUser());
        echo "</pre>";*/

// Role Manager

    // C - Create role

        /*$role = new Role(null, 'Editor');
        $roleManager = new RoleManager();
        $roleManager->saveRole($role);*/

    // R - Read all Role

        /*$role = new RoleManager();
        echo "<pre>";
        print_r($role->getRoleList());
        echo "</pre>";*/

    // U - Update role

        /*$role = new Role(5, 'Banned');
        $roleManager = new RoleManager();
        $roleManager->saveRole($role);*/

    // D - Delete Role

        /*$role = new Role(5, 'Banned');
        $roleManager = new RoleManager();
        $roleManager->delRole($role);*/

// Article Manager

    // C - Create article

        /*$article1 = new Article(null, 'Mon premier article', 'blablablabla 1er article', 1);
        $articleManager = new ArticleManager();
        $articleManager->saveArticle($article1);*/

        /*$article2 = new Article(null, 'Mon second article', 'blablablabla 2ème article', 1);
        $articleManager = new ArticleManager();
        $articleManager->saveArticle($article2);*/

        /*$article1 = new Article(null, 'Mon premier article', 'blablablabla 1er article', 2);
        $articleManager = new ArticleManager();
        $articleManager->saveArticle($article1);*/

    // R - Read article

            //All article

                /*$article = new ArticleManager();
                echo "<pre>";
                print_r($article->getAllArticle());
                echo "</pre>";*/

            // Article by Id

                /*$article = new ArticleManager();
                echo "<pre>";
                print_r($article->getById(2));
                echo "</pre>";*/

            // Article by Author

                /*$userManager = new UserManager();
                $user = $userManager->getById(1);

                $article = new ArticleManager();
                echo "<pre>";
                print_r($article->getByAuthor($user));
                echo "</pre>";*/

    // U - Update article

        /*$articleManager = new ArticleManager();
        $article1 = new Article(1, 'Mon premier article', 'Article updated', 1);
        $articleManager->saveArticle($article1);*/

    // D - Delete Article

        /*$articleManager = new ArticleManager();
        $article3 = $articleManager->getById(3);
        $articleManager->delArticle($article3);*/