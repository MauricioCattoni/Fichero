<?php
class IngresoData {
	public static $tablename = "ingreso";


	public function IngresoData(){
        
	}
	
	public function add(){
		$sql = "insert into ".self::$tablename." (legajo,entrada,salida,name,image) ";
		$sql .="value ($this->legajo,\"$this->entrada\",\"$this->salida\",\"$this->name\",\"$this->image\")"; Executor::doit($sql);
	}

	public function addsub(){
		$sql = "insert into ".self::$tablename." (category_id,image,name,description,created_at,precio,marca,modelo,año,condicion,color,kilometraje,combustible,transmision,motor,alarma,cierreCentralizado,levantaVidriosAuto) ";
		$sql .= "value ($this->category_id,\"$this->image\",\"$this->name\",\"$this->description\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto IngresoData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set legajo=$this->legajo,entrada=\"$this->entrada\",salida=\"$this->salida\",name=\"$this->name\",image=\"$this->image\"
		where id=$this->id";
		Executor::doit($sql);
	}

	public function updateCant(){
		$sql = "update ".self::$tablename." set cantidad=$this->cantidad where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new IngresoData());
	}

	public static function getAllByLegajo($legajo){
		$sql = "select * from ".self::$tablename." where legajo=$legajo";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by entrada desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}

	public static function getAllByPost($id){
		$sql = "select * from ".self::$tablename." where post_id=$id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}
	public static function getAllByUser($id){
		$sql = "select * from ".self::$tablename." where user_id=$id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}
	
	public static function getAllByVenta($id){
		$sql = "select * from ".self::$tablename." where id_venta=$id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
    }
  


	public static function getAllRoot(){
		$sql = "select * from ".self::$tablename." where category_id is NULL order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}

	public static function getAllSubs(){
		$sql = "select * from ".self::$tablename." where category_id is not NULL order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}

	public static function getSubsByRoot($id){
		$sql = "select * from ".self::$tablename." where category_id=$id order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}


	public static function getLast10(){
		$sql = "select * from ".self::$tablename." order by created_at desc limit 10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IngresoData());
	}


}

?>