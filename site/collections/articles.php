<?php

return function ($site) {
    return $site->find('articles')->children()->listed()->flip();
};