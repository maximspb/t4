<?php

namespace T4\Tests\Validation\Validators\Std;

use T4\Validation\Validators\Boolean;

require_once realpath(__DIR__ . '/../../../framework/boot.php');

class BooleanTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new Boolean();

        $result = $validator('');
        $this->assertTrue($result);
        $result = $validator('false');
        $this->assertTrue($result);
        $result = $validator('off');
        $this->assertTrue($result);
        $result = $validator('no');
        $this->assertTrue($result);
        $result = $validator('0');
        $this->assertTrue($result);
        $result = $validator(0);
        $this->assertTrue($result);

        $result = $validator('true');
        $this->assertTrue($result);
        $result = $validator('on');
        $this->assertTrue($result);
        $result = $validator('yes');
        $this->assertTrue($result);
        $result = $validator('1');
        $this->assertTrue($result);
        $result = $validator(1);
        $this->assertTrue($result);
    }

    /**
     * @expectedException \T4\Validation\Exceptions\InvalidBoolean
     */
    public function testNegative()
    {
        $validator = new Boolean();
        $validator('foo');
    }

}