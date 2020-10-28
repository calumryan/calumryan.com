<?php snippet('header') ?>

<main id="content">

    <article class="h-entry">

        <section id="summary" class="page-section">
            <div class="text text-article note-structure">
            <?= $page->text()->kt() ?>
            </div>
        </section>

        <section id="experience" class="page-section bg-cv--content">

            <div class="experience-list note-structure">
            <?php foreach ($page->roles()->toStructure() as $role): ?>
                <div class="p-experience h-event vevent experience vevent" itemprop="worksFor" itemtype="https://schema.org/Organization https://schema.org/Role">

                    <header class="h-card vcard">
                    <h3 class="p-experience heading-medium"><span class="p-job-title" itemprop="roleName"><?= $role->role_name() ?></span><br><a
                        class="p-name org u-url url" itemprop="name" rel="noreferrer noopener" target="_blank"
                        href="<?= $role->org_url() ?>"><?= $role->org() ?></a></h3>

                    <?php if ( $role->current()->isEmpty() ) : ?>
                    <time class="dt-start" datetime="<?= $role->start_date()->toDate('y-m-d') ?>" itemprop="startDate"><?=
                    $role->start_date()->toDate('F Y') ?></time> - <time class="dt-end" datetime="<?= $role->end_date()->toDate('y-m-d') ?>" itemprop="endDate"><?= $role->end_date()->toDate('F Y') ?></time>
                    <?php else : ?>
                    <time class="dt-start" datetime="<?= $role->start_date() ?>" itemprop="startDate"><?=
                    $role->start_date()->toDate('F Y') ?></time> - <time class="dt-end" datetime="<?= date('y-m-d') ?>"
                    itemprop="endDate">Present</time>
                    <?php endif; ?>

                    </header>

                    <ul class="cv-list">
                        <li>
                            <?php if ( $role->summary()->isNotEmpty() ) :?>
                            <p class="p-summary"><?= $role->summary() ?></p>
                            <?php endif ?>

                            <ul class="points">
                                <?php foreach ( $role->points()->toStructure() as $item ) : ?>
                                <li><?= $item->point() ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>

                </div>

            <?php endforeach ?>
            </div>

        </section>

        <section id="talks-publication-exhibition" class="page-section">

            <div class="text note-structure">

                <h2>Talks, publication &amp; exhibition</h2>

                <ul class="cv-events">
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2019-04-25">2019</time>
                        <h3><a class="p-name u-url" href="https://noti.st/calumryan/SDJFrp/usability-testing">Usability testing (Presentation)</a></h3>
                        <p>Public speaking engagement at <a href="https://frontendlondon.co.uk/" class="p-organisation" rel="noreferrer noopener" target="_blank">Front-End London</a>
                        <br><strong class="p-location">London</strong></p>
                    </li>
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2018-06-18">2018</time>
                        <h3><a class="p-name u-url" href="<?= $site->url() ?>/talks/redecentralising-the-web.pdf">Re-decentralising
                            the web (PDF)</a></h3>
                            <p>Public speaking engagement at <a href="https://londonwebstandards.org/2018/06/lws-18-june-2018-lwsjun18/" class="p-organisation"
                            rel="noreferrer noopener" target="_blank">London Web Standards</a>
                        <br><strong class="p-location">London</strong></p>
                    </li>
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2017-07-11">2017</time>
                        <h3><a class="p-name u-url" href="<?= $site->url() ?>/talks/ie-pwa">Introducing PWAs (Presentation)</a></h3>
                        <p>Public
                        speaking engagement at
                        <a href="https://www.uxcampbrighton.org/" rel="noreferrer noopener" target="_blank" class="p-organisation">UX
                            Camp
                            Brighton</a> and <a rel="noreferrer noopener" target="_blank" class="p-organisation" href="https://internetexplorers.yoyodesign.com/">Internet
                            Explorers Kent</a>
                        <br>
                        <strong class="p-location">Brighton</strong>/<strong class="p-location">Tunbridge Wells</strong></p>
                    </li>
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2016-01-8">2016</time>
                        <h3><a class="p-name u-url" href="<?= $site->url() ?>/talks/fel-280116">Taking part in the IndieWeb
                            (Presentation)</a></h3>
                        <p>
                        <a href="http://www.frontendlondon.co.uk/archive#fel28" rel="noreferrer noopener" target="_blank"
                            class="p-organisation">Front-End London</a>
                        <br>
                        <strong class="p-location">London</strong></p>
                    </li>
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2017-07-11">2016</time>
                        <h3 class="p-name u-url">Homebrew
                            Website Club</h3>
                        <p>Organiser of <a href="https://hwclondon.co.uk" rel="noreferrer noopener" target="_blank"
                            class="p-organisation">bi-weekly meetup</a> for maintaining your own website and creating
                        open-source tools for the web.<br>
                        <strong class="p-location">London</strong></p>
                    </li>
                    <li class="h-event event-summary">
                        <time class="dt-start" datetime="2011-07-01">2011</time>
                        <h3><a rel="noreferrer noopener" target="_blank" class="p-name u-url" href="https://culturebook.co.uk">Culturebook</a></h3>
                        <p><a class="p-organisation" rel="noreferrer noopener" target="_blank" href="http://portfolio.madeinbrunel.com/2011/calum-ryan/culturebook/">Made
                            in Brunel</a> &amp; New Designers
                        <br>Exhibited a cultural heritage platform for museums, art galleries and exhibitions developed
                        for my university Final Year Project.<br>
                        <strong class="p-location">London</strong></p>
                    </li>
                </ul>

            </div>

        </section>

        <section id="comments" class="page-section bg-cv--content">

            <div class="text note-structure">

                <h2>What people think about me</h2>

                <blockquote>
                    <p>&ldquo;Calum shows real flare and enthusiasm in his work as front end developer. With a passion for expanding his knowledge on all things digital, he very regularly attends conferences on the newest digital trends and tech solutions. Armed with what he has learnt, Calum will share his experiences with his coworkers and transfer what he has learnt into helping provide better functional solutions for clients. He also has a very keen eye for design and instinctively knows what looks good and what doesn't, another one of his many talents.&rdquo;</p>
                    <cite>– Emma Atkins, Wickedweb</cite>
                </blockquote>
                                    
                <blockquote>
                    <p>&ldquo;Calum was a keen problem-solver during his twelve month student placement at Film Education. He made a valuable contribution to a large number of demanding projects during that time and I recommend his work.&rdquo;</p>
                    <cite>– Jane Dickson, Film Education</cite>
                </blockquote>

            </div>

        </section>
                
        <section id="contact-me" class="page-section">

            <div class="text note-structure summary">

                <h2>Look me up/contact me:</h2>

                <ul class="cv-list">
                    <li><strong>Email:</strong> <a href="hello@calumryan.com" class="u-email" rel="me">hello@calumryan.com</a></li>
                    <li><strong>Github:</strong> <a class="u-url" rel="noreferrer noopener" target="_blank" href="https://github.com/calumryan">github.com/calumryan</a></li>
                    <li><strong>CodePen:</strong> <a class="u-url" rel="noreferrer noopener" target="_blank" href="https://codepen.io/calumryan">codepen.io/calumryan</a></li>
                </ul>

            </div>

        </section>

                
    </article>

</main>

<?php snippet('footer') ?>
