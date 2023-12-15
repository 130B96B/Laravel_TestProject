<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactsSendmail extends Mailable
{
use Queueable, SerializesModels;

// プロパティを定義
private $email;
private $company;
private $contact_body;
private $birth_date;
private $name;
private $tel;
private $gender;
private $occupation;
  /**
  * Create a new message instance.
  *
  * @return void
  */
  public function __construct($inputs)
  {

    $this->email = $inputs['email'];
    $this->company = $inputs['company'];
    $this->contact_body = $inputs['contact_body'];
    $this->birth_date = $inputs['birth_date'];
    $this->name = $inputs['name'];
    $this->tel = $inputs['tel'];
    $this->gender = $inputs['gender'];
    $this->occupation = $inputs['occupation'];

  }

  /**
  * Build the message.
  *
  * @return $this
  */
  public function build()
  {
    // メールの設定
    return $this
            ->from('example@gmail.com')
            ->subject('自動送信メール')
            ->view('contact.mail')
            ->with([
            'email' => $this->email,
            'company' => $this->company,
            'contact_body' => $this->contact_body,
            'birth_date' => $this->birth_date,
            'name' =>   $this->name,
            'tel' =>  $this->tel,
            'gender' =>   $this->gender,
            'occupation' =>  $this->occupation,
            ]);
  }
}
