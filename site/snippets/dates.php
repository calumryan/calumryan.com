<?php if ( $page->date_end()->isNotEmpty()  ): ?>
<div class="date-container">
    <?php $day1 = $page->date_start()->toDate('Ymd') ?>
    <?php $day2 = $page->date_end()->toDate('Ymd') ?>
    <div class="date-block">
        <div class="month"><?=$page->date_start()->toDate('F')?></div>
        <div class="day"><?=$page->date_start()->toDate('j')?></div>
    </div>
    <?php if ( $day1 != $day2 ) : ?>
    <div class="date-block date-block__end">
        <div class="month"><?=$page->date_end()->toDate('F')?></div>
        <div class="day"><?=$page->date_end()->toDate('j')?></div>
    </div>
    <?php endif ?>
</div>
<?php endif ?>