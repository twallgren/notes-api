<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 12/2/2015
 * Time: 10:27 PM
 */
require_once __DIR__ . '/../vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app = new Application();

$app['debug'] = true;

$app->get('/',function(){
    return new Response('<h1>REST API</h1>',200);
});

$app->get('/users',function(){
    $repo = new \Notes\Persistence\Entity\MysqlUserRepository();
    $jsons = json_encode($repo->getUsers());
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->post('/users',function(Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
    $data = array(
        'username'  => $request->request->get('username'),
        'firstName'  => $request->request->get('firstName'),
        'lastName'  => $request->request->get('lastName'),
    );
    //return new Response(json_encode($data),200);
    $repo = new \Notes\Persistence\Entity\MysqlUserRepository();
    $userFactory = new \Notes\Domain\Entity\UserFactory();
    $user = $userFactory->create();

    if(isset($data['username']))
    {
        $user->setUsername($data['username']);
    }
    if(isset($data['firstName']))
    {
        $user->setFirstName($data['firstName']);
    }
    if(isset($data['lastName']))
    {
        $user->setLastName($data['lastName']);
    }
    $repo->add($user);
    $jsons = json_encode([$user->getId()->__toString(),$user->getUsername(),$user->getFirstName(),$user->getLastName()]);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});
/*
$app->get('/items/{itemId}',function(Application $app, $itemId) use ($items){
    if(!isset($items[$itemId]))
    {
        $app->abort(404,"item with ID $itemId does not exist.");
    }
    $jsons = json_encode($items[$itemId]);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->post('/items',function(Application $app, Request $request) use (&$items){
    $id=uniqid();
    $items[$id]=json_decode($request->getContent());
    $jsons = json_encode($items);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->put('/items/{itemId}',function(Application $app, Request $request, $itemId) use (&$items){
    if(!isset($items[$itemId]))
    {
        $app->abort(404,"item with ID $itemId does not exist.");
    }
    $items[$itemId]=json_decode($request->getContent());
    $jsons = json_encode($items);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->delete('/items/{itemId}',function(Application $app, $itemId) use (&$items){
    if(!isset($items[$itemId]))
    {
        $app->abort(404,"Note with ID $itemId does not exist.");
    }
    unset($items[$itemId]);
    $response = new Response(null,204);
    return $response;
});



$app->get('/users',function() use ($users){
    $jsons = json_encode($users);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->get('/users/{userId}',function(Application $app, $userId) use ($users){
    if(!isset($users[$userId]))
    {
        $app->abort(404,"user with ID ".$userId." does not exist.");
    }
    $jsons = json_encode($users[$userId]);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->post('/users',function(Application $app, Request $request) use (&$users){
    $id=uniqid();
    $users[$id] = json_decode($request->getContent());
    $jsons = json_encode($users);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->put('/users/{userId}',function(Application $app, Request $request, $userId) use (&$users){
    if(!isset($users[$userId]))
    {
        $app->abort(404,"user with ID $userId does not exist.");
    }
    $users[$userId] = json_decode($request->getContent());
    $jsons = json_encode($users);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->delete('/users/{userId}',function(Application $app, $userId) use (&$users){
    if(!isset($users[$userId]))
    {
        $app->abort(404,"Note with ID $userId does not exist.");
    }
    unset($users[$userId]);
    $response = new Response(null,204);
    return $response;
});



$app->get('/carts',function() use ($carts){
    $jsons = json_encode($carts);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->get('/carts/{cartId}',function(Application $app, $cartId) use ($carts){
    if(!isset($carts[$cartId]))
    {
        $app->abort(404,"Cart with ID $cartId does not exist.");
    }
    $jsons = json_encode($carts[$cartId]);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->post('/carts',function(Application $app, Request $request) use (&$carts){
    $id=uniqid();
    $carts[$id] = json_decode($request->getContent());
    $jsons = json_encode($carts);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->put('/carts/{cartId}',function(Application $app, Request $request, $cartId) use (&$carts){
    if(!isset($carts[$cartId]))
    {
        $app->abort(404,"Cart with ID $cartId does not exist.");
    }
    $carts[$cartId] = json_decode($request->getContent());
    $jsons = json_encode($carts);
    $response =  new Response($jsons,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($jsons));
    return $response;
});

$app->delete('/carts/{cartId}',function(Application $app, $cartId) use (&$carts){
    if(!isset($carts[$cartId]))
    {
        $app->abort(404,"Note with ID $cartId does not exist.");
    }
    unset($carts[$cartId]);
    $response = new Response(null,204);
    return $response;
});*/

$app->run();
