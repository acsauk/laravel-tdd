<?php

namespace Tests\Feature;

use App\Concert;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewConcertListingTest extends TestCase
{
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
    $this->visit('/concerts/'.$concert->id);

    // Assert
      // See concert details
      $this->see('The Red Chord');
      $this->see('with Animosity and Lethargy');
      $this->see('December 13, 2016 8:00pm');
      $this->see('8:00pm');
      $this->see('$32.50');
      $this->see('The Mosh Pit');
      $this->see('123 Test Avenue');
      $this->see('Birmingham');
      $this->see('West Midlands');
      $this->see('B1 3DB');
      $this->see('For tickets, call (0121) 688 1477');
  }
}
