<?php

session_start();

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


});

//Define a order route
$f3->route('GET /order', function()
{
    //Display an order view
    $view = new Template();
    echo $view->render('views/form1.html');
}
);

//Define a order2 route
$f3->route('POST /order2', function()
{
    //print_r($_POST);
    $_SESSION['animal'] = $_POST['animal'];
    //Display order received view
    $view = new Template();
    echo $view->render('views/form2.html');
});

//Define a results route
$f3->route('POST /results', function()
{
    //print_r($_POST);
    $_SESSION['color'] = $_POST['color'];
    //Display order received view
    $view = new Template();
    echo $view->render('views/results.html');
});



//Run fat free
$f3->run();
