<?php
namespace Tests\Unit\Invoice;

use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Payment;
use App\Services\Invoice\GenerateInvoiceStatus;
use App\Services\Invoice\InvoiceCalculator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class InvoiceCalculatorTest extends TestCase
{
    use DatabaseTransactions;

    private $invoice;
    private $payment;
    private $invoiceLine;
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $invoiceCalculator;

    public function setUp(): void
    {
        parent::setUp();
        $this->invoice = Invoice::factory()->create([
            'sent_at' => today()
        ]);
        $this->payment = Payment::factory()->create([
            'invoice_id' => $this->invoice->id,
            'amount' => 1000,
            'payment_date' => today(),
            'payment_source' => 'test'
        ]);
        $this->invoiceLine = InvoiceLine::factory()->create([
            'invoice_id' => $this->invoice->id,
            'price' => 5000,
            'quantity' => 1,
            'type' => 'hours',
        ]);
        $this->invoiceCalculator = app(InvoiceCalculator::class, ['invoice' => $this->invoice]);
    }

    /** @test */
    public function getAmountDue()
    {
        $this->assertEquals(4000, $this->invoiceCalculator->getAmountDue()->getAmount());
    }
}
