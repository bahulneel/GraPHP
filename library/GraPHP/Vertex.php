<?php

namespace GraPHP;

class Vertex implements VerTex\To
{
	private $inbound = array();

	private $uuid;

	public function __construct( $uuid )
	{
		$this->uuid = $uuid;
	}

	public function link( Edge\Possible $edge )
	{
		$this->inbound[ $edge->getDescriptor() ] = $edge;
	}

	public function getUuid()
	{
		return $this->uuid;
	}
}
