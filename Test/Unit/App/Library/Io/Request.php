<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
namespace Test\Unit\App\Library\Io;

use \App\Library\Io\Request as _Request;

/**
 * Unit testing on request constructor
 *
 * @author Romain L.
 * @since 0.2
 */
class Request extends \Test\Unit\TestCase
{
    /**
     * Tests if tested has well defined constants
     *
     * @return void
     * @access public
     */
    public function testHasConstants()
    {
        $this->testedClass->hasConstant('ACTION')->isEqualTo(1);
    }

    /**
     * Tests if constructor alerts in case of bad request
     *
     * @return void
     * @access public
     */
    public function test__constructWithTooManyArguments()
    {
        $arg = ['one', 'two', 'three', 'four'];

        $this->exception(function () use ($arg) {
            new _Request($arg, count($arg));
        })->isInstanceOf('\Exception');
    }

    /**
     * Tests get action when there's an action
     *
     * @return void
     * @access public
     */
    public function testGetActionWithAction()
    {
        $arg = ['one', 'two'];
        $obj = new _Request($arg, count($arg));

        $this->string($obj->getAction())->isIdenticalTo('two');
    }

    /**
     * Tests get action when there's no action
     *
     * @return void
     * @access public
     */
    public function testGetActionWithoutAction()
    {
        $arg = ['one'];
        $obj = new _Request($arg, count($arg));

        $this->string($obj->getAction())->isIdenticalTo('');
    }
}
