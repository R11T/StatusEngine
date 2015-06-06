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
namespace App;

/**
 * Front controller
 *
 * @author Romain L.
 */
class Main
{
    /**
     * Request constructor
     *
     * @var \App\Library\Io\Request
     *
     * @access private
     */
    private $request;

    /**
     * Constructor
     *
     * @param \App\Library\Io\Request
     *
     * @access public
     */
    public function __construct(\App\Library\Io\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute main action
     *
     * @return void
     * @access public
     */
    public function run()
    {
        try {
            $app = new Library\App();
            switch($this->request->getAction()) {
                case 'start':
                    $app->start();
                    break;
                case 'help':
                default:
                    $actions = ['start'];
                    sort($actions);
                    echo 'Usage: {' . implode(', ', $actions) . '}', "\n";
                    }
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
            exit(1);
        }
    }
}
