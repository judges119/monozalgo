<?php
declare(strict_types=1);
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Judges119\Monolog\Formatter\ZalgoFormatter;
use Zalgo\Mood;
use Zalgo\Soul;
use Zalgo\Zalgo;

final class ZalgoFormatterTest extends TestCase
{
    public function testFormatReturnsString(): void
    {
        $formatter = new ZalgoFormatter();
        $this->assertInternalType(
            'string',
            $formatter->format(["message" => "He comes"])
        );
    }

    public function testZalgoTextCanBeReversed(): void
    {
        $zalgo = new Zalgo(new Soul(), Mood::soothed());
        $formatter = new ZalgoFormatter();
        $record = ['message' => 'He comes'];
        $prophecy = $formatter->format($record);
        $this->assertEquals(
            $zalgo->soothe($prophecy),
            $record['message']
        );
    }

    public function testFormatBatchReturnsArrayOfStrings(): void
    {
        $formatter = new ZalgoFormatter();
        $records = [
            ['message' => 'He comes'],
            ['message' => 'From behind the veil'],
            ['message' => 'He listens']
        ];
        $prophecies = $formatter->formatBatch($records);
        $this->assertInternalType(
            'array',
            $prophecies
        );
        $this->assertInternalType(
            'string',
            $prophecies[0]
        );
    }
}
