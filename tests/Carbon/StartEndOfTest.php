<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Carbon;

use Carbon\Carbon;
use Tests\AbstractTestCase;

class StartEndOfTest extends AbstractTestCase
{
    public function testStartOfDay()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfDay());
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, 0, 0, 0);
    }

    public function testEndOfDay()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfDay());
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, 23, 59, 59);
    }

    public function testStartOfMonthIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfMonth());
    }

    public function testStartOfMonthFromNow()
    {
        $dt = Carbon::now()->startOfMonth();
        $this->assertCarbon($dt, $dt->year, $dt->month, 1, 0, 0, 0);
    }

    public function testStartOfMonthFromLastDay()
    {
        $dt = Carbon::create(2000, 1, 31, 2, 3, 4)->startOfMonth();
        $this->assertCarbon($dt, 2000, 1, 1, 0, 0, 0);
    }

    public function testStartOfYearIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfYear());
    }

    public function testStartOfYearFromNow()
    {
        $dt = Carbon::now()->startOfYear();
        $this->assertCarbon($dt, $dt->year, 1, 1, 0, 0, 0);
    }

    public function testStartOfYearFromFirstDay()
    {
        $dt = Carbon::create(2000, 1, 1, 1, 1, 1)->startOfYear();
        $this->assertCarbon($dt, 2000, 1, 1, 0, 0, 0);
    }

    public function testStartOfYearFromLastDay()
    {
        $dt = Carbon::create(2000, 12, 31, 23, 59, 59)->startOfYear();
        $this->assertCarbon($dt, 2000, 1, 1, 0, 0, 0);
    }

    public function testEndOfMonthIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfMonth());
    }

    public function testEndOfMonth()
    {
        $dt = Carbon::create(2000, 1, 1, 2, 3, 4)->endOfMonth();
        $this->assertCarbon($dt, 2000, 1, 31, 23, 59, 59);
    }

    public function testEndOfMonthFromLastDay()
    {
        $dt = Carbon::create(2000, 1, 31, 2, 3, 4)->endOfMonth();
        $this->assertCarbon($dt, 2000, 1, 31, 23, 59, 59);
    }

    public function testEndOfYearIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfYear());
    }

    public function testEndOfYearFromNow()
    {
        $dt = Carbon::now()->endOfYear();
        $this->assertCarbon($dt, $dt->year, 12, 31, 23, 59, 59);
    }

    public function testEndOfYearFromFirstDay()
    {
        $dt = Carbon::create(2000, 1, 1, 1, 1, 1)->endOfYear();
        $this->assertCarbon($dt, 2000, 12, 31, 23, 59, 59);
    }

    public function testEndOfYearFromLastDay()
    {
        $dt = Carbon::create(2000, 12, 31, 23, 59, 59)->endOfYear();
        $this->assertCarbon($dt, 2000, 12, 31, 23, 59, 59);
    }

    public function testStartOfDecadeIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfDecade());
    }

    public function testStartOfDecadeFromNow()
    {
        $dt = Carbon::now()->startOfDecade();
        $this->assertCarbon($dt, $dt->year - $dt->year % 10, 1, 1, 0, 0, 0);
    }

    public function testStartOfDecadeFromFirstDay()
    {
        $dt = Carbon::create(2000, 1, 1, 1, 1, 1)->startOfDecade();
        $this->assertCarbon($dt, 2000, 1, 1, 0, 0, 0);
    }

    public function testStartOfDecadeFromLastDay()
    {
        $dt = Carbon::create(2009, 12, 31, 23, 59, 59)->startOfDecade();
        $this->assertCarbon($dt, 2000, 1, 1, 0, 0, 0);
    }

    public function testEndOfDecadeIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfDecade());
    }

    public function testEndOfDecadeFromNow()
    {
        $dt = Carbon::now()->endOfDecade();
        $this->assertCarbon($dt, $dt->year - $dt->year % 10 + 9, 12, 31, 23, 59, 59);
    }

    public function testEndOfDecadeFromFirstDay()
    {
        $dt = Carbon::create(2000, 1, 1, 1, 1, 1)->endOfDecade();
        $this->assertCarbon($dt, 2009, 12, 31, 23, 59, 59);
    }

    public function testEndOfDecadeFromLastDay()
    {
        $dt = Carbon::create(2009, 12, 31, 23, 59, 59)->endOfDecade();
        $this->assertCarbon($dt, 2009, 12, 31, 23, 59, 59);
    }

    public function testStartOfCenturyIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfCentury());
    }

    public function testStartOfCenturyFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->startOfCentury();
        $this->assertCarbon($dt, $now->year - $now->year % 100 + 1, 1, 1, 0, 0, 0);
    }

    public function testStartOfCenturyFromFirstDay()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, 1)->startOfCentury();
        $this->assertCarbon($dt, 2001, 1, 1, 0, 0, 0);
    }

    public function testStartOfCenturyFromLastDay()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, 59)->startOfCentury();
        $this->assertCarbon($dt, 2001, 1, 1, 0, 0, 0);
    }

    public function testStartOfHourIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfHour());
    }

    public function testStartOfHourFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->startOfHour();
        $this->assertCarbon($dt, $now->year, $now->month, $now->day, $now->hour, 0, 0);
    }

    public function testStartOfHourFromFirstMinute()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, 1)->startOfHour();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, 0, 0);
    }

    public function testStartOfHourFromLastMinute()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, 59)->startOfHour();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, 0, 0);
    }

    public function testEndOfHourIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfHour());
    }

    public function testEndOfHourFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->endOfHour();
        $this->assertCarbon($dt, $now->year, $now->month, $now->day, $now->hour, 59, 59);
    }

    public function testEndOfHourFromFirstMinute()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, rand(0, 59))->endOfHour();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, 59, 59);
    }

    public function testEndOfHourFromLastMinute()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, rand(0, 59))->endOfHour();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, 59, 59);
    }

    public function testStartOfMinuteIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->startOfMinute());
    }

    public function testStartOfMinuteFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->startOfMinute();
        $this->assertCarbon($dt, $now->year, $now->month, $now->day, $now->hour, $now->minute, 0);
    }

    public function testStartOfMinuteFromFirstSecond()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, 1)->startOfMinute();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, $dt->minute, 0);
    }

    public function testStartOfMinuteFromLastSecond()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, 59)->startOfMinute();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, $dt->minute, 0);
    }

    public function testEndOfMinuteIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfMinute());
    }

    public function testEndOfMinuteFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->endOfMinute();
        $this->assertCarbon($dt, $now->year, $now->month, $now->day, $now->hour, $now->minute, 59);
    }

    public function testEndOfMinuteFromFirstSecond()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, 1)->endOfMinute();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, $dt->minute, 59);
    }

    public function testEndOfMinuteFromLastSecond()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, 59)->endOfHour();
        $this->assertCarbon($dt, $dt->year, $dt->month, $dt->day, $dt->hour, $dt->minute, 59);
    }

    public function testMidDayIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->midDay());
    }

    public function testMidDayFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->midDay();
        $this->assertCarbon($dt, $now->year, $now->month, $now->day, 12, 0, 0);
    }

    public function testEndOfCenturyIsFluid()
    {
        $dt = Carbon::now();
        $this->assertInstanceOfCarbon($dt->endOfCentury());
    }

    public function testEndOfCenturyFromNow()
    {
        $now = Carbon::now();
        $dt = Carbon::now()->endOfCentury();
        $this->assertCarbon($dt, $now->year - $now->year % 100 + 100, 12, 31, 23, 59, 59);
    }

    public function testEndOfCenturyFromFirstDay()
    {
        $dt = Carbon::create(2001, 1, 1, 1, 1, 1)->endOfCentury();
        $this->assertCarbon($dt, 2100, 12, 31, 23, 59, 59);
    }

    public function testEndOfCenturyFromLastDay()
    {
        $dt = Carbon::create(2100, 12, 31, 23, 59, 59)->endOfCentury();
        $this->assertCarbon($dt, 2100, 12, 31, 23, 59, 59);
    }

    public function testAverageIsFluid()
    {
        $dt = Carbon::now()->average();
        $this->assertInstanceOfCarbon($dt);
    }

    public function testAverageFromSame()
    {
        $dt1 = Carbon::create(2000, 1, 31, 2, 3, 4);
        $dt2 = Carbon::create(2000, 1, 31, 2, 3, 4)->average($dt1);
        $this->assertCarbon($dt2, 2000, 1, 31, 2, 3, 4);
    }

    public function testAverageFromGreater()
    {
        $dt1 = Carbon::create(2000, 1, 1, 1, 1, 1);
        $dt2 = Carbon::create(2009, 12, 31, 23, 59, 59)->average($dt1);
        $this->assertCarbon($dt2, 2004, 12, 31, 12, 30, 30);
    }

    public function testAverageFromLower()
    {
        $dt1 = Carbon::create(2009, 12, 31, 23, 59, 59);
        $dt2 = Carbon::create(2000, 1, 1, 1, 1, 1)->average($dt1);
        $this->assertCarbon($dt2, 2004, 12, 31, 12, 30, 30);
    }
}
