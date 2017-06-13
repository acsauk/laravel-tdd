<?php

use App\Concert;
use Carbon\Carbon;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcertTest extends BrowserKitTestCase

{

    use DatabaseMigrations;

    /** @test */

    function can_get_formatted_date()

    {
        // Arrange - create a concert with a known date
        $concert = Concert::create([
          'date' => Carbon::parse('2017-06-29 8:00pm')
        ]);

        // Act - retrieve formatted date
        $date = $concert->formatted_date;

        // Assert - verify date is formatted as expected
        $this->assertEquals('June 29, 2017', $date);
    }

}
