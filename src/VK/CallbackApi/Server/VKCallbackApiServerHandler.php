<?php

namespace VK\CallbackApi\Server;

use VK\CallbackApi\VKCallbackApiHandler;

abstract class VKCallbackApiServerHandler extends VKCallbackApiHandler {
    const EVENT_KEY_TYPE = 'type';
    const EVENT_KEY_OBJECT = 'object';
    const EVENT_KEY_SECRET = 'secret';
    const EVENT_KEY_GROUP_ID = 'group_id';

    const CALLBACK_EVENT_CONFIRMATION = 'confirmation';

    /**
     * @param int $group_id
     * @param null|string $secret
     */
    abstract function confirmation(int $group_id, $secret);

    /**
     * @param $event
     */
    public function parse($event) {
        if ($event->type == static::CALLBACK_EVENT_CONFIRMATION) {
            $this->confirmation($event->group_id, $event->secret);
        } else {
            parent::parseObject($event->group_id, $event->secret, $event->type, (array)$event->object);
        }
    }
}
