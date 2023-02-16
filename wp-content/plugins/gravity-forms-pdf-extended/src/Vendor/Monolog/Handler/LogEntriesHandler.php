<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GFPDF\Vendor\Monolog\Handler;

use GFPDF\Vendor\Monolog\Logger;
/**
 * @author Robert Kaufmann III <rok3@rok3.me>
 */
class LogEntriesHandler extends \GFPDF\Vendor\Monolog\Handler\SocketHandler
{
    /**
     * @var string
     */
    protected $logToken;
    /**
     * @param string $token  Log token supplied by LogEntries
     * @param bool   $useSSL Whether or not SSL encryption should be used.
     * @param int    $level  The minimum logging level to trigger this handler
     * @param bool   $bubble Whether or not messages that are handled should bubble up the stack.
     *
     * @throws MissingExtensionException If SSL encryption is set to true and OpenSSL is missing
     */
    public function __construct($token, $useSSL = \true, $level = \GFPDF\Vendor\Monolog\Logger::DEBUG, $bubble = \true, $host = 'data.logentries.com')
    {
        if ($useSSL && !\extension_loaded('openssl')) {
            throw new \GFPDF\Vendor\Monolog\Handler\MissingExtensionException('The OpenSSL PHP plugin is required to use SSL encrypted connection for LogEntriesHandler');
        }
        $endpoint = $useSSL ? 'ssl://' . $host . ':443' : $host . ':80';
        parent::__construct($endpoint, $level, $bubble);
        $this->logToken = $token;
    }
    /**
     * {@inheritdoc}
     *
     * @param  array  $record
     * @return string
     */
    protected function generateDataStream($record)
    {
        return $this->logToken . ' ' . $record['formatted'];
    }
}
