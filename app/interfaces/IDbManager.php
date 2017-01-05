<?php 

//INTERFACCIA DELLE CLASSI CHE UTILIZZANO IL DATABASE
interface IDbManager
{
	public function create($values,$fields);
	
	public function update($fields,$params,$values,$extra_params);
	
	public function delete($params,$values,$extra_params);
	
	public function read($params,$extra_params,$values ,$fields);

    //public function readOptions($what,$id_parent = null);
}