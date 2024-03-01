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

use Psr\Log\AbstractLogger as PsrAbstractLogger;

class AbstractLogger extends PsrAbstractLogger
{

    protected $stdLogFilePath;

    protected $errLogFilePath;

    protected $exceptionLogFilePath;

    public function __construct()
    {
        $this->stdLogFilePath = _PS_ROOT_DIR_. '/var/logs/' . 'application.log';
        $this->errLogFilePath = _PS_ROOT_DIR_.'/var/logs/' . 'phperror.log';
        $this->exceptionLogFilePath = _PS_ROOT_DIR_.'/var/logs/' . 'exception.log';
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed   $level
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     *
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function log($level, $message, array $context = array())
    {
        $levelFormat = sprintf("[%s]\t", strtoupper($level));
        error_log("\n". gmdate('Y-m-d H:i:s')."\t" . $levelFormat .$message, 3, $this->stdLogFilePath);
    }

    /**
     * @param $stringLine
     */
    public function errorLog($stringLine)
    {
        error_log("\n". gmdate('Y-m-d H:i:s')."\t".$stringLine, 3, $this->errLogFilePath);
    }

    /**
     * @param $stringLine
     */
    public function exceptionLog($stringLine)
    {
        error_log("\n". gmdate('Y-m-d H:i:s')."\t".$stringLine, 3, $this->exceptionLogFilePath);
    }
}
