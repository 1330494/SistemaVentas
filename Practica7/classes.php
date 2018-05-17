<?php 

/**
* //////////////////////////////////////////////////////////////////
*/
class Usuario
{
	public $id;
	public $nombre;
	public $apellidos;
	public $fecha_nac;
	public $user_name;
	public $password;
	public $email;

	function __construct()
	{
		$this->nombre = '';
		$this->apellidos = '';
		$this->user_name = '';
		$this->password = '';
		$this->email = '';
	}

	public function set($nombre, $apellidos,$user_name, $password, $email)
	{
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->user_name = $user_name;
		$this->password = $password;
		$this->email = $email;
	}

	public function setID($id){
		$this->id = $id;
	}

	public function get()
	{
		$DATA['ID'] = $this->id;
		$DATA['NOMBRE'] = $this->nombre;
		$DATA['APELLIDOS'] = $this->apellidos;
		$DATA['USER_NAME'] = $this->user_name;
		$DATA['PASSWORD'] = $this->password;
		$DATA['EMAIL'] = $this->email;
		return $DATA;
	}
}

/**
* ////////////////////////////////////////////////////////////////
*/
class Venta
{
	public $folio;
	public $fecha;
	public $monto;
	public $descripcion;

	function __construct()
	{
		$this->folio = '';
		$this->fecha = '';
		$this->monto = '';
		$this->descripcion = '';
	}

	function set($fecha,$monto,$descripcion)
	{
		$this->fecha = $fecha;
		$this->monto = $monto;
		$this->descripcion = $descripcion;
	}

	public function setFolio($folio){
		$this->folio = $folio;
	}

	public function get()
	{
		$DATA['FOLIO'] = $this->folio;
		$DATA['FECHA'] = $this->fecha;
		$DATA['MONTO'] = $this->monto;
		$DATA['DESCRIP'] = $this->descripcion;
		return $DATA;
	}
}

/**
* ////////////////////////////////////////////////////////////////
*/
class Producto
{
	public $id;
	public $nombre;
	public $descripcion;
	public $precio;

	function __construct()
	{
		$this->id = '';
		$this->nombre = '';
		$this->descripcion = '';
		$this->precio = '';
	}

	public function set($nombre,$descripcion,$precio)
	{
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
	}

	public function setID($id){
		$this->id = $id;
	}

}

//$venta = new Venta('1','2018/02/27',300.0,'1,Leche Nido 980grs.');
//echo get_class($venta);

?>