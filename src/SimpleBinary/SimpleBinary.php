<?php

namespace SimpleBinary;

class SimpleBinary
{
	private $binary;
	private $offset;

	public function __construct($binarystring,$offset = 0){
		$this->binary = $binarystring;
		$this->offset = $offset;
	}

	public function getBinary(){
		return $this->binary;
	}

	public function setBinary($binary){
		$this->binary = $binary;
	}

	public function getOffset(){
		return $this->offset;
	}

	public function setOffset($offset){
		$this->offset = $offset;
	}

	public function getInt8(){
		return $this->unpack('C');
	}

	public function setInt8($num){
		$this->binary .= pack('c',$num);
	}

	public function getInt16(){
		return $this->unpack('n');
	}

	public function setInt16($num){
		$this->binary .= pack('n',$num);
	}

	public function getInt32(){
		return $this->unpack('N');
	}

	public function setInt32($num){
		$this->binary .= pack('N',$num);
	}

	public function getInt64(){
		return $this->unpack('J');
	}

	public function setInt64($num){
		$this->binary .= pack('J',$num);
	}

	public function setString($string){
		$this->binary .= $string;
	}

	public function getString($length){
		$val = substr($this->binary,$this->offset,$length);
		$this->offset += $length;
		return $val;
	}

	private function unpack($code){
		switch($code){
			case 'C':
				$offset = 1;
				break;
			case 'n':
				$offset = 2;
				break;
			case 'N':
				$offset = 4;
				break;
			case 'J':
				$offset = 8;
				break;
		}
		$val = unpack($code,substr($this->binary,$this->offset,$offset))[1];
		$this->offset += $offset;
		return $val;
	}

}
