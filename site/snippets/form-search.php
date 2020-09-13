<div class="note-structure">
    <form action="<?= page('search')->url() ?>" autocomplete="off" method="get">
        <label class="form-label" for="search">Search calumryan.com</label>
        <div class="form-search-wrapper">
            <input class="form-field" type="search" id="search" name="q" value="<?= html($query) ?>">
            <button class="form-button" type="submit" class="button">Search</button>
        </div>
    </form>
</div>