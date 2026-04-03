<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PaymentHistory;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Snappy\Facades\SnappyPdf;

class GenerateInvoicePdfs extends Command
{
    protected $signature = 'invoices:generate-pdfs';
    protected $description = 'Generate PDF for all invoices';

    public function handle()
    {
        $this->info('Starting PDF generation for all invoices...');

        $paymentHistory = PaymentHistory::with(['payment_method', 'user.companies'])
        ->where('status', 'paid')
        ->latest()
        ->first();
        $this->info($paymentHistory);

        $user = $paymentHistory->user;
        $company = $user->companies->last();

        // Render the view as HTML
        $pdf = SnappyPdf::loadView('template.publisher.payments.invoice', compact('paymentHistory', 'company'));

        // Define a nice organized path: invoices/2025/04/invoice_123456.pdf
        $year = now()->format('Y');
        $month = now()->format('m');
        $path = "invoices/{$paymentHistory->paid_date}/invoice_{$paymentHistory->invoice_id}.pdf";
        return $pdf->download("invoice-{$paymentHistory->invoice_id}.pdf");
        // Ensure directory exists
        Storage::makeDirectory("invoices/{$year}/{$month}");

        // Generate and save PDF
        $this->info("Generating PDF for invoice #{$paymentHistory->invoice_id}...");
        Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->noSandbox()
            ->save(storage_path("app/{$path}"));
        // foreach ($invoices as $invoice) {
        //     try {
        //         $url = route('publisher.payments.invoice', ['payment_history' => $invoice->id]);
        //         $fileName = 'invoice_' . $invoice->invoice_id . '.pdf';
        //         $path = storage_path('app/invoices/' . $fileName);

        //         $this->info("Generating PDF for Invoice ID: {$invoice->invoice_id}");

        //         Browsershot::url($url)
        //             ->setNodeBinary('/usr/bin/node')
        //             ->setNpmBinary('/usr/bin/npm')
        //             ->waitUntilNetworkIdle()
        //             ->format('A4')
        //             ->showBackground()
        //             ->savePdf($path);
        //     } catch (\Exception $e) {
        //         $this->error("Failed for Invoice ID {$invoice->invoice_id}: " . $e->getMessage());
        //     }
        // }

        $this->info('PDF generation complete!');
    }
}
