<?php
namespace App\Library;

/**
 * App 
 *
 * @author Romain L.
 */
class App
{
     /**
     * Launch data gathering
     *
     * @return void
     * @access public
     */
    public function start()
    {
        $path     = CONFIG_DIR . 'config.json';
        $config   = (new System\File($path))->getAsJson();
        $analyzer = new Analyzer($config['servers']);
        $results = $analyzer->checkServiceAvailability();
        print_r($results);
    }
}
