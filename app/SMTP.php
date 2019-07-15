<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Swift_SmtpTransport;
use Swift_TransportException;
use League\Flysystem\Exception;

class SMTP extends Model
{
    protected $table = 'smtp';
    protected $fillable = [
        'host', 'port', 'encryption', 'username', 'password'
    ];

    public function checkConnection()
    {
        try {
            $transport = Swift_SmtpTransport::newInstance($this->host, $this->port, $this->encryption);
            $transport->setUsername($this->username);
            $transport->setPassword($this->password);
            $mailer = \Swift_Mailer::newInstance($transport);
            $mailer->getTransport()->start();
            return 'OK';
        } catch (Swift_TransportException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
