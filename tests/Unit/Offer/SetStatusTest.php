<?php
namespace Tests\Unit\Offer;

use App\Enums\OfferStatus;
use App\Models\Offer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Tests\TestCase;

class SetStatusTest extends TestCase
{
    use DatabaseTransactions;

    protected $offer;

    public function setUp(): void
    {
        parent::setUp();
        $this->offer = Offer::factory()->create();
    }

    /** @test */
    public function setOfferAsWon()
    {
        $this->assertNotEquals("won", $this->offer->status);
        $this->offer->setAsWon();

        $this->assertEquals("won", $this->offer->status);
    }

    /** @test */
    public function setOfferAsList()
    {
        $this->assertNotEquals("lost", $this->offer->status);
        $this->offer->setAsLost();

        $this->assertEquals("lost", $this->offer->status);
    }
}
