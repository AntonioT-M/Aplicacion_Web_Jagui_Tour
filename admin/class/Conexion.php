<?php
class Conexion extends PDO{
	public function __construct($file = 'conection_settings.ini'){
		if(!$settings = parse_ini_file($file, TRUE)){
			throw new exception('La base de datos no pudo abrirse desde '.$file.'.');
		}
		$dns = $settings['database']['driver'].':host='.$settings['database']['host'].((!empty($settings['database']['port'])) ? (';port='.$settings['database']['port']):'').';dbname='.$settings['database']['schema'];
		parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
	} 
}
?>