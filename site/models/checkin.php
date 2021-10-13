<?php

// For a content file called `project.txt`
// In general the class name is {{ProjectFileName}}Page

class checkinPage extends Page {
  // all methods of the Page class are inherited and can be overridden here now.
  /**
   * Creates and stores a new page
   *
   * @param array $props
   * @return self
   */
  public static function create(array $props)
  {
    $collection = pages('checkins')->children()->sortBy('uid', 'desc')->limit(1);

    foreach ($collection as $post):
      $id = $post->uid();
      $last = $id+1;
    endforeach;

    $props['slug'] = '_' . $last;
    $props['content']['title'] = date('F jS, Y');
    $props['content']['uid'] = $last;

    return parent::create($props);
  }
}
