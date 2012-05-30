<?php

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

class User extends Vertex implements CanFollow, Followable
{ }

class Topic extends Vertex implements Followable
{ }

$user = new User('u');
$user2 = new User('u2');

$topic = new Topic('t');

new Follows( $user, $topic );

new Follows( $user2, $user );

print_r($topic);

// Crazy
try {
	new Follows( $user, $user );
}
catch ( \Exception $e )
{
	error_log('Crazy!');
}

// Awesome
new Follows( $user, $topic );
print_r($topic);

// Crazy Awesome
new Follows( $topic, $user );
