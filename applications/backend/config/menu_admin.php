<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Menu
| -------------------------------------------------------------------------
| This file lets you define navigation menu items on sidebar.
|
*/

$config['menu'] = array(

	'home' => array(
		'name'      => 'Accueil',
		'url'       => site_url(),
		'icon'      => 'fa fa-home'
	),

	'user' => array(
		'name'      => 'Utilisateurs',
		'url'       => site_url('user'),
		'icon'      => 'fa fa-users'
	),

	'actualite' => array(
		'name'      => 'Actuatités',
		'url'       => site_url('actualite'),
		'icon'      => 'fa fa-list-alt'
	),

	'slider_homepage' => array(
		'name'      => 'Slider Accueil',
		'url'       => site_url('/home/slider_homepage'),
		'icon'      => 'fa fa-list-alt'
	),

	'restaurant' => array(
		'name'      => 'Tous les restaurants',
		'url'       => site_url('restaurant'),
		'icon'      => 'fa fa-cutlery'
	),

	'evenement' => array(
		'name'      => 'Tous les événements',
		'url'       => site_url('evenement'),
		'icon'      => 'fa fa-glass'
	),

	// Example to add sections with subpages
	'example' => array(
		'name'      => 'Examples',
		'url'       => site_url('example'),
		'icon'      => 'fa fa-cog',
		'children'  => array(
			'Demo 1'		=> site_url('example/demo/1'),
			'Demo 2'		=> site_url('example/demo/2'),
			'Demo 3'		=> site_url('example/demo/3'),
		)
	),
	// end of example

	'admin' => array(
		'name'      => 'Administration',
		'url'       => site_url('admin'),
		'icon'      => 'fa fa-cog',
		'children'  => array(
			'SEO'	=> site_url('home/seo'),
			'Backend Users'			=> site_url('admin/backend_user'),
			'Villes'				=> site_url('ville'),
			'Mode de paiement'		=> site_url('modepaiement'),
			'Services'				=> site_url('service'),
			'Type d\'hébergement'	=> site_url('hebergement/type_hebergement'),
		)
	),

	'logout' => array(
		'name'      => 'Se déconnecter',
		'url'       => site_url('account/logout'),
		'icon'      => 'fa fa-sign-out'
	),
);