<?php

return function ($site) {
    return $site->find('bookmarks')->children()->listed()->flip();
};