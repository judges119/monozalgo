<?php
/**
 * Normalises log output before turning it into prophecies of he who waits behind the curtain.
 *
 * @link https://github.com/judges119/monozalgo
 * @author Adam O'Grady <adam.ogrady@gmail.com>
 */

namespace Judges119\Monolog\Formatter;

use Monolog\Formatter\FormatterInterface;
use Zalgo\Mood;
use Zalgo\Soul;
use Zalgo\Zalgo;

/**
 * @package Formatter
 */
class ZalgoFormatter implements FormatterInterface
{

    protected $zalgo;

    /**
     * Forge the soul, prepare the vessel
     */
    public function __construct()
    {
        $soul = new Soul();
        $this->zalgo = new Zalgo($soul, Mood::soothed());
    }
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        return $this->zalgo->speaks($record['message']);
    }

    /**
     * {@inheritdoc}
     */
    public function formatBatch(array $records)
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->format($record);
        }
        return $records;
    }
}
