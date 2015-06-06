<?php
namespace App\Library;

/**
* Check servers/services statuses
*
* @author Romain L.
*/
class Analyzer
{
    /**
     * Configuration data
     *
     * @var array
     *
     * @access private
     */
    private $config;

    /**
     * Constructor
     *
     * @param array $serversConfig
     *
     * @access public
     */
    public function __construct(array $serversConfig)
    {
        $this->config = $serversConfig;
    }

    /**
     * Evaluate each service for availability
     *
     * @return array
     * @access public
     */
    public function checkServiceAvailability()
    {
        $output  = [];

        foreach ($this->config as $server) {
            $output[$server['name']] = $this->isServiceAlive($server);
        }
        return $output;
    }

    /**
     * Ask a service its status
     *
     * @return array
     * @access private
     */
    private function isServiceAlive($server)
    {
        $errno   = -1;
        $errStr  = '';
        $timeout = 3;
        $connection = @fsockopen($server['host'], $server['port'], $errno, $errStr, $timeout);
        if (is_resource($connection)) {
            $status = 'Success !';
            fclose($connection);
        } else {
            $status = 'Failed !';
        }
        return [
            'status' => $status,
            'code'   => $errno,
            'msg'    => $errStr,
        ];
    }
}
