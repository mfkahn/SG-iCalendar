<?php
require_once dirname(__FILE__) . '/../common.php';
require_once 'PHPUnit/Framework/TestCase.php';

class RecurrenceTest extends PHPUnit_Framework_TestCase
{
    public function testGetFrequencyGetIntervalWithTypicalLineReturnsFrequency()
    {
        $line = new intouch\ical\Line('RRULE:FREQ=DAILY;INTERVAL=2');
        $recurrence = new intouch\ical\Recurrence($line);
        $this->assertEquals('DAILY', $recurrence->getFreq());
        $this->assertEquals('2', $recurrence->getInterval());
    }

    public function testGetUntilWithTypicalLineReturnsUntil()
    {
        $line = new intouch\ical\Line('RRULE:FREQ=DAILY;UNTIL=19971224T000000Z');
        $recurrence = new intouch\ical\Recurrence($line);
        $this->assertEquals('19971224T000000Z', $recurrence->getUntil());
    }

    public function testGetCountWithTypicalLineReturnsCount()
    {
        $line = new intouch\ical\Line('RRULE:FREQ=WEEKLY;COUNT=10');
        $recurrence = new intouch\ical\Recurrence($line);
        $this->assertEquals('10', $recurrence->getCount());
    }

    public function testGetCountWithCountNotSetReturnsFalse()
    {
        $line = new intouch\ical\Line('RRULE:FREQ=DAILY;UNTIL=19971224T000000Z');
        $recurrence = new intouch\ical\Recurrence($line);
        $this->assertSame(false, $recurrence->getCount());
    }

    public function testGetByDayReturnsArrayWhenMoreThanOneDayIsIncluded()
    {
        $line = new intouch\ical\Line('RRULE:FREQ=WEEKLY;UNTIL=19971007T000000Z;WKST=SU;BYDAY=TU,TH');
        $recurrence = new intouch\ical\Recurrence($line);
        $this->assertEquals(array('TU', 'TH'), $recurrence->getByDay());
        $this->assertEquals('SU', $recurrence->getWkst());
    }

}
