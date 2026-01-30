<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
use App\Controllers\Accueil;
use App\Controllers\Compte;
use App\Controllers\Actualite;
use App\Controllers\Message;
use App\Controllers\Reservation;


$routes->get('/', [Accueil::class, 'afficher']);
$routes->get('compte/lister', [Compte::class, 'lister']);
$routes->get('compte/lister_profil', [Compte::class, 'lister_profil']);

$routes->get('actualite/afficher', [Actualite::class, 'afficher']);
$routes->get('actualite/afficher/(:num)', [Actualite::class, 'afficher']);

$routes->get('message/suivre', [Message::class, 'suivre']);
$routes->get('message/suivre/(:segment)', [Message::class, 'suivre']);

$routes->get('compte/creer', [Compte::class, 'creer']);
$routes->post('compte/creer', [Compte::class, 'creer']);


$routes->get('message/creer', [Message::class, 'creer']);
$routes->post('message/creer', [Message::class, 'creer']);

$routes->get('message/faire_suivre', [Message::class, 'faire_suivre']);
$routes->post('message/faire_suivre', [Message::class, 'faire_suivre']);

$routes->get('compte/connecter', [Compte::class, 'connecter']);
$routes->post('compte/connecter', [Compte::class, 'connecter']);

$routes->get('compte/accueil', [Compte::class, 'accueil']);

$routes->get('compte/deconnecter', [Compte::class, 'deconnecter']);
$routes->get('compte/afficher_profil', [Compte::class, 'afficher_profil']);


$routes->get('reservation/lister_rsv', [Reservation::class, 'lister_rsv']);
$routes->get('reservation/lister_res', [Reservation::class, 'lister_res']);
$routes->get('reservation/lister_rsv_par_date', [Reservation::class, 'lister_rsv_par_date']);


$routes->get('message/afficher', [Message::class, 'afficher']);


$routes->post('message/repondre/(:num)', [Message::class, 'repondre']);

$routes->get('compte/creer_invite', [Compte::class, 'creer_invite']);


$routes->get('compte/creer_invite', [Compte::class, 'creer_invite']);
$routes->post('compte/creer_invite', [Compte::class, 'creer_invite']);


$routes->get('reservation/supprimer/(:num)', [Reservation::class, 'supprimer']);

$routes->get('reservation/insert', [Reservation::class, 'insert']);
$routes->post('reservation/insert', [Reservation::class, 'insert']);















