<?php

namespace App\Mail;

use App\Models\Verify;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MergedPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    public $document;
    public $status;
    public $messageText;
    public $pdfPath;
    public $user;

    public function __construct(Verify $document, $status, $messageText,$mergedPdfPath,$user)
    {
        $this->document = $document;
        $this->status = $status;
        $this->messageText = $messageText;
        $this->pdfPath = $mergedPdfPath;
        $this->user = $user;
    }
    public function build()
    {
        return $this->markdown('emails.mergedpdf')
                    ->subject('Your Document Has Been Approved')
                    ->attach($this->pdfPath, [
                        'as' => 'approved_document.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
