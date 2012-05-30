<?php

namespace GraPHP;

class Edge implements Edge\Possible
{
	private $inbound;

	public function __construct( Vertex\From $vertex )
	{
		$this->inbound = $vertex;
	}

	public function getDescriptor()
	{
		return $this->inbound->getUuid() . '[' . get_class($this) . ']';
	}
}
