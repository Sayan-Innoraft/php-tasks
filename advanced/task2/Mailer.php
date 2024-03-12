<?php

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Mailer class takes recipient email address, and sends email to the recipient.
 */
class Mailer extends PHPMailer {

  /**
   * Sets exception value to the parent class while creating object of Mailer
   * class.
   *
   * @param bool $exception
   *   If we need to turn exception on or off.
   */
  public function __construct(bool $exception) {
    parent::__construct($exception);
  }

  /**
   * Sends mail to the recipient.
   *
   * @param string $addressFrom
   *   Mailing address from which sender sends mail.
   * @param string $recipient
   *   Mail address of recipient.
   * @param bool $isHtml
   * @param string $subject
   *   Subject of the mail content.
   * @param string $body
   *   Body of the mail content.
   *
   * @return bool
   *   Returns true if mail is sent successfully else returns false.
   */
  function sendMail(string $addressFrom, string $recipient, bool $isHtml,
                    string $subject, string $body): bool {
    try {

      // Sets senders mail address.
      $this->setFrom($addressFrom);

      // Adds recipient.
      $this->addAddress($recipient);
    } catch (Exception $e) {
      return false;
    }

    // Content.
    // Sets email format to HTML.
    $this->isHTML($isHtml);

    // Subject of the mail.
    $this->Subject = $subject;

    // Body of the mail.
    $this->Body = $body;

    // Tries to send the mail.
    try {
      $this->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

}
