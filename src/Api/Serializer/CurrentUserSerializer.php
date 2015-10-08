<?php
/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarum\Api\Serializer;

class CurrentUserSerializer extends UserSerializer
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultAttributes($user)
    {
        $attributes = parent::getDefaultAttributes($user);

        $attributes += [
            'readTime'                 => $this->formatDate($user->read_time),
            'unreadNotificationsCount' => (int) $user->getUnreadNotificationsCount(),
            'newNotificationsCount'    => (int) $user->getNewNotificationsCount(),
            'preferences'              => (array) $user->preferences
        ];

        return $attributes;
    }
}