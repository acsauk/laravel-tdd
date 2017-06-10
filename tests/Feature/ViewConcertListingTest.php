<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewConcertListingTest extends DuskTestCase
{
  use DatabaseMigrations;
  /** @test */
  function user_can_view_a_concert_listing()
  {
    // Arrange
      // Create concert
    $concert = Concert::create([
      'title' => 'The Red Chord',
      'subtitle' => 'with Animosity and Lethargy',
      'date' => Carbon::parse('December 13, 2016 8:00pm'),
      'ticket_price' => 3250,
      'venue' => 'The Mosh Pit',
      'address' => '123 Test Avenue',
      'city' => 'Birmingham',
      'county' => 'West Midlands',
      'post_code' => 'B1 3DB',
      'additional_information' => 'For tickets, call (0121) 688 1477'
    ]);

    // Act
      // View concert Listing
    $this->browse(function ($browser) use ($concert) {
            $browser->visit('/concerts/'.$concert->id)
            -> assertSee('The Red Chord')
            -> assertSee('with Animosity and Lethargy')
            -> assertSee('December 13, 2016 8:00pm')
            -> assertSee('8:00pm')
            -> assertSee('$32.50')
            -> assertSee('The Mosh Pit')
            -> assertSee('123 Test Avenue')
            -> assertSee('Birmingham')
            -> assertSee('West Midlands')
            -> assertSee('B1 3DB')
            -> assertSee('For tickets, call (0121) 688 1477');
        });


  }
}
