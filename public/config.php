<?php

if ($_GET["codigo"]=="asdQWE123")
{

	
	$site_url = 'http://www.receptoriapatagonia.com/servicios';

	$laravel_dir = '/home2/receptoriapatago/servicios-laravel';

	echo $laravel_dir ;



	require $laravel_dir . '/vendor/autoload.php';

	$app = require_once $laravel_dir . '/bootstrap/app.php';

	$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

	echo 'Installing...<br>';


	$kernel->call('migrate',['--force' => true]);
	echo 'Migrated OK!';
	//$$kernel->call('migrate:fresh')
	//$kernel->call('migrate:fresh', ['--force' => true]);

	//echo 'Seeding...<br>';
	//$kernel->call('db:seed', ['--force' => true]);

	// redirect
	//echo "<script>window.location = '$site_url'</script>";
	//echo 'SEEDED OK!';
	
}
else
{
	echo 'Unauthorized!';
}
