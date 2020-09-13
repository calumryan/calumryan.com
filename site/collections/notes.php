<?php

return function ($site) {
    return $site->find('notes')->children()->listed()->flip();
};