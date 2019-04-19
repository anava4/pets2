<?php

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');


//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG',3);

//Define a default route
$f3->route('GET /', function()
{
    //Display a view
//    $view = new Template();
//    echo $view->render('views/home2.html');
    echo "<h1> My Pets </h1>";
    echo "<a href='order'>Order a Pet</a>";
});

$f3->route('GET /@animal', function($f3,$params)
{

    $item = $params['animal'];
    $animals = array('Dog','Chicken','Cat','Cow','Pig');

    if(!in_array($item, $animals)){
        echo "We don't have $item";
    }

    switch($item){
        case 'Dog':
            echo "Woof!";
            break;
        case 'Chicken':
            echo"Cluck!";
            break;
        case 'Cat':
            echo"Meow!";
            break;
        case 'Cow':
            echo"Moo!!";
            break;
        case 'Pig':
            echo "Oink!";
            break;
        default:
            $f3->error(404);
    }
//    //Display a view
//    $view = new Template();
//    echo $view->render('views/home2.html');

});


//Run fat free
$f3->run();
