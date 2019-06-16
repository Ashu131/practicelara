<?php
namespace Tests;

use Faker\Factory as Faker;
use Tests\TestCase;

class ApiTester extends TestCase 
{
    // protected $fake;
    protected $times=1;

    public function __construct()
    {
        // $this->fake =   Faker::create();
    }

    public function times( $count)
    {
        $this->times = $count;
        return $this;
    }
}
