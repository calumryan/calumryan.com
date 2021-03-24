<?php

return function ($site) {
    return $site->find('bookshelf')->children()->listed()->flip();
};