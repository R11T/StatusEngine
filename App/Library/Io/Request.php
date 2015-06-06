<?php
namespace App\Library\Io;

/**
 * Request constructor
 *
 * @author Romain L.
 */
class Request
{
    /**
     * Typical softwares' arg
     *
     * @var array
     *
     * @access private
     * @link https://en.wikipedia.org/wiki/Entry_point#C_and_C.2B.2B
     */
    private $argv;

    /**
     * Typical softwares's arg
     *
     * @var int
     *
     * @access private
     * @link https://en.wikipedia.org/wiki/Entry_point#C_and_C.2B.2B
     */
    private $argc;

    /**
     * In the argv, action arg's offset
     *
     * @var int
     *
     * @access public
     */
    const ACTION = 1;

    public function __construct(array $argv, $argc)
    {
        $this->argv = $argv;
        $this->argc = $argc;
    }

    /**
     * Returns action requested by the user
     *
     * @return string|null if action doesn't exist
     * @access public
     */
    public function getAction()
    {
        return isset($this->argv[self::ACTION]) ? $this->argv[self::ACTION] : null;
    }
}
