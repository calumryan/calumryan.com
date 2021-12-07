<?php
class bookmarkPage extends Page {
    /**
     * Creates and stores a new page
     *
     * @param array $props
     * @return self
     */
    public static function create(array $props)
    {
      $collection = page('bookmarks')->children()->sortBy('uid', 'desc')->limit(1);

      foreach ($collection as $post):
        $id = $post->uid();
        $last = $id+1;
      endforeach;
  
      $props['slug'] = '_' . $last;
      $props['content']['uid'] = $last;
  
      return parent::create($props);
    }
}
