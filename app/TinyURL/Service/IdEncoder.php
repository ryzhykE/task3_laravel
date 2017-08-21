<?php
namespace TinyURL\Service;

class IdEncoder
{

	protected $_base = 64;
	protected $_chars = "0123456789abcdefghijklomnpqrstuvwxyzABCDEFGHIJKLOMNPQRSTUVWXYZ~.";
	public function encode($id)
	{
		$eid = '';
		$c = $id;
		while($c)
		{
			$rem = $c % $this->_base;
			$c = intval($c/$this->_base);
			$eid = $this->_chars[$rem] . $eid;
		}
		return $eid;
	}

	public function decode($eid)
	{
		$id = 0;
		$len = strlen($eid);
		for($i=0; $i<$len; ++$i)
		{
			$char = $eid[$i];
			$n = strpos($this->_chars, $char);
			$id = $id * $this->_base + $n;
		}
		return $id;
	}

}
