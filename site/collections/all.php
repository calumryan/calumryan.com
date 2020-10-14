    <?php

return function ($site) {
    return $site->find(['notes', 'rsvps', 'bookmarks', 'replies', 'events', 'checkins', 'reposts', 'likes'])->children()->listed()->flip();
};