<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class absenMail extends Mailable
{
    use Queueable, SerializesModels;
    public $id_siswa;
    public $ket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_siswa,$ket)
    {
        $this->id_siswa = $id_siswa;
        $this->ket = $ket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.absenMail');
    }
}
