<?php
/**
 * This file is part of the Symfony package.
 *
 * (c) Arnaud Scoté <arnaud@griiv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 **/

namespace Griiv\Logger;

class Logger
{

    /**
     * @var AbstractLogger
     */
    private $logger;

    public function __construct()
    {
        $this->logger = new AbstractLogger();
    }

    /**
     * the singleton instance
     * @var Logger
     */
    private static $instance = null;

    /**
     * @return AbstractLogger|null
     */
    private static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return AbstractLogger
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param $message
     */
    public static function debug($message)
    {
        self::getInstance()->getLogger()->debug($message);
    }

    /**
     * @param $message
     */
    public static function info($message)
    {
        self::getInstance()->getLogger()->info($message);
    }

    /**
     * @param $message
     */
    public static function warning($message)
    {
        self::getInstance()->getLogger()->warning($message);
    }

    /**
     * @param $message
     */
    public static function error($message)
    {
        self::getInstance()->getLogger()->errorLog($message);
    }

    /**
     * @param $message
     */
    public static function critical($message)
    {
        self::getInstance()->getLogger()->critical($message);
    }

    /**
     * @param $message
     */
    public static function notice($message)
    {
        self::getInstance()->getLogger()->notice($message);
    }

    /**
     * @param $message
     */
    public static function alert($message)
    {
        self::getInstance()->getLogger()->alert($message);
    }

    /**
     * @param $message
     */
    public static function emergency($message)
    {
        self::getInstance()->getLogger()->emergency($message);
    }

    /**
     * @param $e
     */
    public static function exception($e)
    {
        self::getInstance()->getLogger()->exceptionLog("[EXCEPTION]\t".get_class($e).": ".$e->getMessage()."\n".$e->getTraceAsString());
    }
}
