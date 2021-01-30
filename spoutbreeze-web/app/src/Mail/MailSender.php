<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace Mail;

use Base;
use Exception;
use Log\LogWriterTrait;
use Mailer;
use Nette\Utils\Strings;
use Prefab;
use Template;
use Utils\Environment;

/**
 * MailSender Class.
 */
class MailSender extends Prefab
{
    use LogWriterTrait;

    /**
     * f3 instance.
     *
     * @var Base f3
     */
    protected $f3;

    /**
     * @var Mailer
     */
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer('UTF-8');
        $this->f3     = Base::instance();
        $this->initLogger();
        Mailer::initTracking();
    }

    /**
     * @param Exception $exception
     *
     */
    public function sendExceptionEmail($exception): void
    {
        $hash         = mb_substr(md5(preg_replace('~(Resource id #)\d+~', '$1', $exception)), 0, 10);
        $mailSentPath = $this->f3->get('ROOT') .'/'. $this->f3->get('LOGS') . 'email-sent-' . $hash;
        $snooze       = strtotime('1 day') - time();
        $messageId    = $this->generateId();
        if (@filemtime($mailSentPath) + $snooze < time() && @file_put_contents($mailSentPath, 'sent')) {
            $this->f3->set('mailer.from_name', 'SpoutBreeze Debugger');
            $subject = "PHP: An error occurred on server {$this->f3->get('HOST')} ERROR ID '{$hash}'";
            $message = 'An error occurred on <b>' . $this->f3->get('HOST') . '</b><br />' . nl2br($exception->getTraceAsString());
            $this->smtpSend(null, $this->f3->get('debug.email'), 'SpoutBreeze DevOps', $subject, $message, $messageId);
        }
    }

    /**
     * @param $template
     * @param $vars
     * @param $to
     * @param $title
     * @param $subject
     * @return bool
     */
    public function send($template, $vars, $to, $title, $subject): bool
    {
        $messageId         = $this->generateId();
        $vars['date']      = strftime('%A %d %B %A à %T');
        $vars['messageId'] = $shortId = Strings::before(mb_substr($messageId, 1, -1), '@');
        $vars['SCHEME']    = $this->f3->get('SCHEME');
        $vars['HOST']      = $this->f3->get('HOST');
        $vars['PORT']      = $this->f3->get('PORT');
        $vars['BASE']      = $this->f3->get('BASE');
        $message           = Template::instance()->render('mail/' . $template . '.phtml', null, $vars);
        /*
        //replace the db template variables with provided $vars
        if (array_key_exists('first_name', $vars)) {
            $message = str_replace('[F-NAME]', $vars['first_name'], $message);
        }
        @todo: put email variable names in an Enum class to make their use easy */
        /*
        if (array_key_exists('reset_link', $vars)) {
            $message = str_replace('[ACTIVE-LINK]', $vars['reset_link'], $message);
        }

        if (array_key_exists('course_name', $vars)) {
            $message = str_replace('[COURSE-NAME]', $vars['course_name'], $message);
        }

        if (array_key_exists('start_date', $vars)) {
            $message = str_replace('[START-DATE]', $vars['start_date'], $message);
        }

        if (array_key_exists('session_link', $vars)) {
            $message = str_replace('[C-URL]', $vars['session_link'], $message);
        }

        $message = str_replace('[C-NAME]', \Cache::instance()->get(CacheKey::ORGANISATION), $message);
        */
        return $this->smtpSend(null, $to, $title, $subject, $message, $messageId);
    }

    /**
     * @param $from
     * @param $to
     * @param $title
     * @param $subject
     * @param $message
     * @param $messageId
     * @return bool
     */
    private function smtpSend($from, $to, $title, $subject, $message, $messageId): bool
    {
        if (is_array($to)) {
            foreach ($to as $email) {
                $this->mailer->addTo($email);
            }
        } else {
            $this->mailer->addTo($to, $title);
        }

        if ($from !== null) {
            $this->mailer->setFrom($from);
        }
        $this->mailer->setHTML($message);
        $this->mailer->set('Message-Id', $messageId);
        $sent = $this->mailer->send($subject, Environment::isNotProduction());

        if ($sent !== false && Environment::isNotProduction()) {
            @file_put_contents($this->f3->get('MAIL_STORAGE') . mb_substr($messageId, 1, -1) . '.eml',
                explode("354 Go ahead\n", explode("250 OK\nQUIT", $this->mailer->log())[0])[1]
            );
        }

        $this->logger->info('Sending email | Status: ' . ($sent ? 'true' : 'false') . " | Log:\n" . $this->mailer->log());

        return ($sent === true) ? $messageId : $sent;
    }

    /**
     * Generate a unique message id
     * @return string
     */
    private function generateId(): string
    {
        return sprintf(
            '<%s.%s@%s>',
            base_convert(microtime(), 10, 36),
            base_convert(bin2hex(openssl_random_pseudo_bytes(8)), 16, 36),
            $this->f3->get('HOST')
        );
    }
}
