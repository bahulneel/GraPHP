<?php

namespace TestGraph;

require_once('library/GraPHP/Edge/Possible.php');
require_once('library/GraPHP/Vertex/From.php');
require_once('library/GraPHP/Vertex/To.php');
require_once('library/GraPHP/Edge.php');
require_once('library/GraPHP/Verb.php');
require_once('library/GraPHP/Vertex.php');

use GraPHP\Edge;
use GraPHP\Vertex;
use GraPHP\verb;

interface Followable extends Edge\Possible
{ }

interface CanFollow extends Vertex\From
{ }

class Follows extends Verb
{
	public function __construct( CanFollow $follower, Followable $vertex )
	{
		parent::__construct($follower, $vertex);
	}
}

class Actor extends Vertex implements CanFollow, Followable
{ }

class Person extends Actor
{ }

class Topic extends Vertex implements Followable
{ }

$person = new Person('u');
$person2 = new Person('u2');

$topic = new Topic('t');

new Follows( $person, $topic );

new Follows( $person2, $person );

var_dump($topic);

// Crazy
try {
	new Follows( $person, $person );
}
catch ( \Exception $e )
{
	error_log('Crazy!');
}

// Awesome
new Follows( $person, $topic );

var_dump($topic);

// Crazy Awesome
new Follows( $topic, $person );
