<?php

namespace GraPHP\Vertex;

use GraPHP\Edge;

interface To extends From
{
	public function link( Edge\Possible $edge );
}

