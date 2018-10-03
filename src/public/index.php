<?php

date_default_timezone_set('Europe/London');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \NFAS\NFAS;
use \Propel\Runtime\Exception\PropelException;


require '../../vendor/autoload.php';
require_once 'generated-conf/config.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*$config['db']['host']   = 'db755499624.db.1and1.com';
$config['db']['user']   = 'dbo755499624';
$config['db']['pass']   = 'zivfyv-6Jyvza-nendyh';
$config['db']['dbname'] = 'db755499624';

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = 'L.1x1cixo9Di';
$config['db']['dbname'] = 'NFAS';*/

$app = new \Slim\App(['settings' => $config]);

// CORS
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'User-Agent, Referer, X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler(__DIR__ . '/../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};


$app->post('/nfas_booking/get_shoot', function (Request $request, Response $response) {

    $body = $request->getParsedBody();
    $this->logger->addInfo("Body : " . var_export($body, true));
    $passed_licence = $body['licence'];
    $passed_shoot_id = $body['shoot'];

    $licence = new NFAS\Licence();
    $valid_licence = $licence->validLicence($passed_licence);



    if ($valid_licence === true) {
        // Find the shoot
        $shoot = new NFAS\Shoot();
        $valid_shoot = $shoot->validShoot($passed_shoot_id);
        if ($valid_shoot === true) {
            // Get the data and return it
            $this_shoot = NFAS\ShootQuery::create()->findPk($passed_shoot_id);
            if ($this_shoot->getStatus() === 'open') {
                $from = $this_shoot->getDateStart()->getTimestamp();
                $to = $this_shoot->getDateEnd()->getTimestamp();
                $from = date('jS F Y', $from);
                $to = date('jS F Y', $to);

                if ($from == $to) { // If it is a one day shoot don't want the to
                    $to = null;
                }

                $club = $this_shoot->getClub();
                $this->logger->addInfo("Club : " . var_export($club, true));
                $data = array(
                    "id" => "$passed_shoot_id",
                    "dateFrom" => $from,
                    "dateTo" => $to,
                    "location" => $club->getName());

                return $response->withJson($data);
            } else {
                $data = array('error'=>'Shoot Booking Closed');
                $this->logger->addInfo("Shoot booking closed");
                return $response->withJson($data,400);
            }
        } else {
            // Invalid shoot
            $data = array('error'=>'Invalid Shoot');
            $this->logger->addInfo("Invalid Licence : " . $valid_shoot);
            return $response->withJson($data,400);
        }
    } else {
        // No licence
        $data = array('error'=>'Invalid Licence');
        $this->logger->addInfo("Invalid Licence : " . $valid_licence);
        return $response->withJson($data,400);
    }


});

$app->post('/nfas_booking/save_booking', function (Request $request, Response $response, array $args) {
    $data = array();

    // Get data.
    $body = $request->getParsedBody();
    $this->logger->addInfo("Body : " . var_export($body, true));
    $archers = array();

    // Make sure it is correct
    $licence = $body['licence'];
    $shoot = $body['shoot'];
    $email = $body['email'];
    $shoot_together = $body['shoot_together'];
    $shoot_days = $body['shoot_days'];
    $notes = $body['notes'];
    $permission = $body['permission'];
    $name1 = $body['name1'];
    $class1 = $body['class1'];
    $gender1 = $body['gender1'];
    $age1 = $body['age1'];
    $club1 = $body['club1'];
    $name2 = $body['name2'];
    $class2 = $body['class2'];
    $gender2 = $body['gender2'];
    $age2 = $body['age2'];
    $club2 = $body['club2'];
    $name3 = $body['name3'];
    $class3 = $body['class3'];
    $gender3 = $body['gender3'];
    $age3 = $body['age3'];
    $club3 = $body['club3'];
    $name4 = $body['name4'];
    $class4 = $body['class4'];
    $gender4 = $body['gender4'];
    $age4 = $body['age4'];
    $club4 = $body['club4'];
    $name5 = $body['name5'];
    $class5 = $body['class5'];
    $gender5 = $body['gender5'];
    $age5 = $body['age5'];
    $club5 = $body['club5'];

    $l = new NFAS\Licence();
    $valid_licence = $l->validLicence($licence);

    if ($valid_licence !== true) {
        $data = array('error'=>'Invalid Licence');
        $this->logger->addInfo("Invalid Licence : " . $valid_licence);
        return $response->withJson($data,400);
    }

    $s = new NFAS\Shoot();
    $valid_shoot = $s->validShoot($shoot);
    if ($valid_shoot !== true) {
        $data = array('error'=>'Invalid Shoot');
        $this->logger->addInfo("Invalid Licence : " . $valid_shoot);
        return $response->withJson($data,400);
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data = array('error'=>'Invalid email');
        $this->logger->addInfo("Invalid email : " . $email);
        return $response->withJson($data,400);
    }
    if (! $permission) {
        $data = array('error'=>'Invalid permission');
        $this->logger->addInfo("Invalid permission");
        return $response->withJson($data,400);
    }
    // Must have archer 1
    if (
        ! preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u",$name1)
        || ! $class1
        || ! $age1
        || ! $club1
        || ! $gender1
    ) {
        $data = array('error'=>'Invalid first archer');
        $this->logger->addInfo("Invalid first archer");
        return $response->withJson($data,400);
    } else {
        array_push($archers, array('name'=>$name1, 'class'=>$class1, 'gender'=>$gender1, 'age'=>$age1, 'club'=>$club1));
    }

    if ($name2 && preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u",$name2)) {
        if (! $class2 || ! $age2 || ! $gender2 || ! $club2 ) {
            $data = array('error'=>'Invalid 2nd archer');
            $this->logger->addInfo("Invalid 2nd archer");
            return $response->withJson($data,400);
        } else {
            array_push($archers, array('name'=>$name2, 'class'=>$class2, 'gender'=>$gender2, 'age'=>$age2, 'club'=>$club2));
        }
    }
    if ($name3 && preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u",$name3)) {
        if (! $class3 || ! $age3 || ! $gender3 || ! $club3 ) {
            $data = array('error'=>'Invalid 3rd archer');
            $this->logger->addInfo("Invalid 3rd archer");
            return $response->withJson($data,400);
        } else {
            array_push($archers, array('name'=>$name3, 'class'=>$class3, 'gender'=>$gender3, 'age'=>$age3, 'club'=>$club3));
        }
    }
    if ($name4 && preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u",$name4)) {
        if (! $class4 || ! $age4 || ! $gender4 || ! $club4 ) {
            $data = array('error'=>'Invalid 4th archer');
            $this->logger->addInfo("Invalid 4th archer");
            return $response->withJson($data,400);
        } else {
            array_push($archers, array('name'=>$name5, 'class'=>$class5, 'gender'=>$gender5, 'age'=>$age5, 'club'=>$club5));
        }
    }
    if ($name5 && preg_match("/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u",$name5)) {
        if (! $class5 || ! $age5 || ! $gender5 || ! $club5 ) {
            $data = array('error'=>'Invalid 5th archer');
            $this->logger->addInfo("Invalid 5th archer");
            return $response->withJson($data,400);
        } else {
            array_push($archers, array('name'=>$name5, 'class'=>$class5, 'gender'=>$gender5, 'age'=>$age5, 'club'=>$club5));
        }
    }


    // Create a new booking
    $booking = new NFAS\Booking();
    $booking->setBookerEmail($email);
    $booking->setDateBooked(date('Y-m-d H:i'));
    $booking->setPermission(1);
    $booking->setShootTogether($shoot_together ? '1' : '0');
    $booking->setShootDays($shoot_days);
    $booking->setShootId($shoot);
    $booking->setNotes(strip_tags($notes));

    // Save each archer
    foreach ($archers as $a) {
        $archer = new NFAS\Archer();
        $archer->setName($a['name']);
        $archer->setClub($a['club']);
        $archer->setAge($a['age']);
        $archer->setGender($a['gender']);
        $archer->setClass($a['class']);

        $booking->addArcher($archer);
    }

    $booking->save();

    // Send confirmation email to Booker and to club
    $this_shoot = NFAS\ShootQuery::create()->filterById($shoot)->findOne();
    $this_club = NFAS\ClubQuery::create()->filterById($this_shoot->getClubId())->findOne();
    $subject = "Booking for " . $this_club->getName() . " on " . date('d/m/Y', $this_shoot->getDateStart()->getTimestamp())s;
    $message = "----- This is an automated message. Please do not reply ----" . PHP_EOL;
    $message .= "Club: " . $this_club->getName() . PHP_EOL;
    $message .= "Date: " . $this_shoot->getDateStart() . PHP_EOL;
    if ($booking->getShootDays()) {
        $message .= "Shoot Days: " . $booking->getShootDays() . PHP_EOL;
    }
    $message .= "Shoot Together: " . $booking->getShootTogether() . PHP_EOL;
    $message .= "Booker's Email: " . $email . PHP_EOL;
    $message .= "Archers" . PHP_EOL;
    foreach ($archers as $a) {
        $message .= "\t" . $a['name'] . "\t" . $a['class'] . "\t" . $a['age'] . "\t" . $a['gender'] . "\t" . $a['club'] . PHP_EOL;
    }

    $additional_message = PHP_EOL . "===== This is not confirmation of acceptance to the above shoot. You will receive confirmation directly from the club =====" . PHP_EOL;
    $club_message = PHP_EOL . "==== Please contact the above booker's email to confirm that these archers are booked into your shoot =====" . PHP_EOL;
    $headers = 'From: no-reply@singlearrow.co.uk'. PHP_EOL ;
    mail ( $email, $subject, $message . $additional_message, $headers ) ;
    mail ( $email, $subject, $message . $club_message, $headers ) ;




    return $response->withJson($data);
});


/* Admin Functions - not sure this is a brilliant idea but easiest solution for me */
// Add Club
$app->get('/nfas_booking/admin/add_club/{name}/{email}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $email = $args['email'];

    try {
        $club = new NFAS\Club();
        if (! $club->exists($name, $email)) {
            $club->setName($name);
            $club->setEmail($email);
            $password = $club->createPassword();
            $this->logger->addInfo("Adding $name / $email / $password");
            $club->save();
            $data = array(
                'id' => $club->getId(),
                'pw' => $password
            );
            return $response->withJson($data);
        } else {
            $data = array('error'=>'Club already exists');
            return $response->withJson($data,400);
        }
    } catch (PropelException $pe) {
        $response->getBody()->write($pe->getTraceAsString());
        return $response;
    }


});

// Add Licence to Club
$app->get('/nfas_booking/admin/add_licence/{id}/{type}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $type = $args['type'];

    try {
        $search = new NFAS\ClubQuery();
        $club = $search->findPk($id);
        $this->logger->addInfo("Club: " . json_encode($club));
        if (isset($club)) {
            // We have a club
            $licence = new NFAS\Licence();
            $licence->setStart('2018-10-01');
            $licence->setEnd('2019-09-30');
            $licence->setType($type);
            $licence->setClubId($id);
            $licence->save();
            $data = array(
                'license' => $licence->getId()
            );
            return $response->withJson($data);

        } else {
            $data = array('error'=>'Club does not exist');
            return $response->withJson($data,400);
        }

    } catch (PropelException $pe) {
        $response->getBody()->write($pe->getTraceAsString());
        return $response;
    }


});

// Add a shoot to a club
$app->get('/nfas_booking/admin/add_shoot/{id}/{start}/{end}/{description}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $start = $args['start'];
    $end = $args['end'];
    $description = $args['description'];

    try {
        $search = new NFAS\ClubQuery();
        $club = $search->findPk($id);
        if (isset($club)) {
            // We have a club
            $shoot = new NFAS\Shoot();
            $shoot->setDateStart($start);
            $shoot->setDateEnd($end);
            $shoot->setDescription($description);
            $shoot->setClubId($id);
            $shoot->save();
            $data = array(
                'shoot_id' => $shoot->getId()
            );
            return $response->withJson($data);

        } else {
            $data = array('error'=>'Club does not exist');
            return $response->withJson($data,400);
        }

    } catch (PropelException $pe) {
        $response->getBody()->write($pe->getTraceAsString());
        return $response;
    }


});



// Catch-all route to serve a 404 Not Found page if none of the routes match
// NOTE: make sure this route is defined last
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();

