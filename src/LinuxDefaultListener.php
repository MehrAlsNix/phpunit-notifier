<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 30.05.2015
 * Time: 15:29
 */

namespace MehrAlsNix\PhpUnit\Notifier;

class LinuxDefaultListener extends NotificationListenerBase
{
    /**
     * @param string $title
     * @param string $message
     * @return null
     */
    public function notify($title, $message)
    {
        $this->execute("notify-send -t 2000 '{$title}' '$message'");
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->execute('which notify-send');
    }
}
