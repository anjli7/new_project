<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TdsController extends Controller
{
    // GET: TDS page
    public function index()
    {
        $faqs = [
            [
                'question' => 'What is the difference between TDS and TCS?',
                'answer' => '<p>TDS (Tax Deducted at Source) is tax deducted by the payer when making specified payments like salary, interest, professional fees, etc. TCS (Tax Collected at Source) is tax collected by the seller at the time of sale of specified goods like timber, scrap, minerals, etc. The main difference is who collects the tax and at what stage.</p>'
            ],
            [
                'question' => 'How can I check my TDS credit?',
                'answer' => '<ol><li>Form 26AS available on the Income Tax e-filing portal</li><li>Annual TDS certificate (Form 16/16A) issued by the deductor</li><li>AIS (Annual Information Statement) on the e-filing portal</li></ol>'
            ],
            [
                'question' => 'What is the penalty for late TDS payment?',
                'answer' => '<ul><li>1% per month or part of the month from the due date to the date of deduction</li><li>1.5% per month or part of the month from the date of deduction to the date of payment</li></ul>'
            ],
            [
                'question' => 'Can I get a refund if excess TDS is deducted?',
                'answer' => '<p>Yes, if the total TDS deducted is more than your total tax liability for the year, you can claim a refund by filing your income tax return (ITR). The excess amount will be refunded to your bank account after processing your return. The refund process typically takes 2-6 months from the date of filing.</p>'
            ]
        ];

        return view('pages.tds', compact('faqs'));
    }

    // POST: TDS calculation
    public function calculate(Request $request)
    {
        $paymentType = $request->input('paymentType');
        $amount = $request->input('amount');

        // TDS rates
        $rates = [
            '194' => 10,
            '194A' => 10,
            '194C' => 1.5, // average for simplicity
            '194H' => 5,
            '194I' => 2,
            '194J' => 10
        ];

        $rate = $rates[$paymentType] ?? 0;

        $tdsAmount = ($amount * $rate) / 100;
        $netPayment = $amount - $tdsAmount;

        // redirect back with result
        return redirect()->route('TDS')->with('tds_result', [
            'tdsAmount' => number_format($tdsAmount, 2),
            'netPayment' => number_format($netPayment, 2)
        ]);
    }
}
