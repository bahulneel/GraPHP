<?php

namespace GraPHP;

class Verb extends Edge
{
	public function __construct( Vertex\From $from, Vertex\To $to )
	{
		if ( $from->getUuid() === $to->getUuid() )
		{
			throw new \InvalidArgumentException( 'Identity crisis' );
		}
		parent::__construct($from);
		$to->link( $this );
	}
}
