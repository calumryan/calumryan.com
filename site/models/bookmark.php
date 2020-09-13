<?php
class bookmarkPage extends Page {
  /**
   * Creates and stores a new page using date as title and incrementing a numeric ID
   *
   * @param array $props
   * @return Page
   */
  public static function create(array $props)
  {
    $collection = pages('bookmarks')->children()->sortBy('uid', 'desc')->limit(1);

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
