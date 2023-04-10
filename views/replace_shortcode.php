<div class="testimonials_slider">
<?php 

foreach ( array_reverse(self::$model->get_list()) as $item ): ?>
           
                        <div itemscope itemtype="https://schema.org/Review" class="testimonials_slider-item">
                          <meta itemprop="datePublished" content="<?= $item->schema_date ?>"/>
                          <meta itemprop="name" content="<?= $item->name ?> <?= $item->last_name ?> о Городской Службе Измерений"/>
                          <link itemprop="url" href="https://поверка-воды.рф">
                          <div itemprop="reviewBody" class="testimonial_text"><?= $item->text ?></div>
                          <div itemprop="author" itemscope itemtype="https://schema.org/Person" class="testimonial_name"><span itemprop="name"><?= $item->name ?></span> <span itemprop="familyName"><?= $item->last_name ?></span></div>
                          <div class="testimonial_date subtitle"><?= $item->date?></div>

                          <div class="d-none" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Organization">
                              <meta itemprop="name" content="Отзыв о компании ГИС">
                              <meta itemprop="telephone" content="+79001280404">
                              <link itemprop="url" href="https://поверка-воды.рф/"/>
                              <meta itemprop="email" content="info@поверка-воды.рф">
                              <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                  <meta itemprop="addressLocality" content="Ростов">
                                  <meta itemprop="streetAddress" content="проспект 40-летия Победы, 328/1">
                              </p>
                          </div>
                          <div class="d-none" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                              <meta itemprop="worstRating" content="1">
                              <meta itemprop="ratingValue" content="5">
                              <meta itemprop="bestRating" content="5"/>
                          </div>
                        </div>
<?php endforeach ?>
</div>