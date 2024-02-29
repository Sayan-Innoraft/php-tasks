<?php

// Loads Composer's autoloader.
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Mailer class takes recipient mail address, and sends email to the recipient.
 */
class Mailer extends PHPMailer {
  /**
   * @param bool $exception
   *   Exception turned on or off
   * @param string $host
   *   Name of the host.
   * @param string $username
   *   Username of sender.
   * @param string $password
   *   Password of sender.
   * @param string $encryption
   *   Encryption type.
   * @param string $port
   *   Port number.
   */
  public function __construct(bool $exception, string $host, string $username, string $password, string $encryption,
                              string $port) {
    parent::__construct($exception);
    $this->exceptions = $exception;

    // Sends using SMTP.
    $this->isSMTP();

    // Sets the SMTP server to send through.
    $this->Host = $host;

    // Enables SMTP authentication.
    $this->SMTPAuth = true;

    // SMTP username.
    $this->Username = $username;

    // SMTP password.
    $this->Password = $password;

    // Enables implicit TLS encryption.
    $this->SMTPSecure = $encryption;

    // TCP port to connect to.
    $this->Port = $port;

  }

  /**
   * Sends mail to the recipient.
   *
   * @param string $addressFrom
   *   Mailing address from which sender sends mail.
   * @param string $recipient
   *   Mail address of recipient.
   * @param bool $html
   *   Sets email format to HTML.
   * @param string $subject
   *   Subject of the mail content.
   * @param string $body
   *   Body of the mail content.
   *
   * @return bool
   *   Returns true if mail is sent successfully else returns false.
   *
   */
  function sendMail(string $addressFrom, string $recipient, bool $html, string $subject, string $body): bool {
    try {
      // Sets senders mail address
      $this->setFrom($addressFrom);

      // Adds recipient.
      $this->addAddress($recipient);
    } catch (Exception $e) {
      return false;
    }

    // Content.
    // Sets email format to HTML.
    $this->isHTML($html);

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
