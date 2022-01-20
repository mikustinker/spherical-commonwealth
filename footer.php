  <section class="instagram-feed">
    <?php echo do_shortcode('[instagram-feed]'); ?>
  </section>
  <!-- Speical Offers -->
  <section class="special-offer">
    <div class="container">
      <h2 class="special-offer__heading">
        Sign up for promotions & special offers
      </h2>
      <div class="special-offer__form">
        <form action="#" class="contact-form" id="special-offer__form">
          <input name="formId" type="hidden" value="30086" />
          <div class="form-row">
            <div class="form-col">
              <input type="text" name="firstName" class="form-control" placeholder="First Name*">
            </div>
            <div class="form-col">
              <input type="text" name="lastName" class="form-control" placeholder="Last Name*">
            </div>
            <div class="form-col">
              <input type="email" name="emailAddress" class="form-control" placeholder="Email*">
            </div>
            <div class="form-col">
              <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number *">
            </div>
            <div class="form-col">
              <input type="text" name="address1" class="form-control" placeholder="Address 1">
            </div>
            <div class="form-col">
              <input type="text" name="address2" class="form-control" placeholder="Address 2">
            </div>
            <div class="form-col">
              <input type="text" name="city" class="form-control" placeholder="City">
            </div>
            <div class="form-col">
              <select name="state" class="form-control form-select" id="" jcf-select>
                <option value="" selected disabled>State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
            </div>
            <div class="form-col">
              <input type="text" name="zip" class="form-control" placeholder="Zip">
            </div>
            <div class="form-col form-radio__wrapper">
              <label for="">Gender</label>
              <span class="wpcf7-form-control-wrap gender">
                <span class="wpcf7-form-control wpcf7-radio form-radio" id="gender">
                  <span class="wpcf7-list-item first">
                    <label>
                      <input type="radio" name="gender" value="M" checked="checked">
                      <span class="wpcf7-list-item-label">Male</span>
                    </label>
                  </span>
                  <span class="wpcf7-list-item last">
                    <label>
                      <input type="radio" name="gender" value="F">
                      <span class="wpcf7-list-item-label">Female</span>
                    </label>
                  </span>
                </span>
              </span>
            </div>
          </div>
          <div class="form-submit">
            <input type="submit" class="btn btn--accent" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<footer class="footer">
  <div class="footer-top">
    <div class="container footer-logo__wrapper">
      <?php if ($logo = get_field('logo', 'option')) : ?>
        <a href="<?php echo esc_url(home_url()); ?>" class="footer-logo  a-up">
          <img src="<?php echo $logo; ?>" alt="">
        </a>
      <?php endif; ?>
    </div>
    <div class="container">
      <div class="footer-main">
        <div class="footer-menu a-up">
          <?php 
            wp_nav_menu( array(
              'menu' => 'Footer Menu',
              'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
              'container'       => 'div',
              'menu_class'      => 'menu-items',
              'fallback_cb'     => false,
              'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
          ?>
        </div>
        <?php if ($contact = get_field('contact', 'option')) : ?>
          <div class="footer-contact footer-item a-up a-delay-1">
            <h6 class="footer-item__title">Contact</h6>
            <div class="footer-item__content">
              <?php echo $contact; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($address = get_field('address', 'option')) : ?>
          <div class="footer-address footer-item a-up a-delay-2">
            <h6 class="footer-item__title">Address</h6>
            <div class="footer-item__content">
              <?php echo $address; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if (have_rows('social', 'option')) : ?>
          <div class="footer-social footer-item a-up a-delay-3">
            <h6 class="footer-item__title">Social</h6>
            <div class="social-links">
              <?php while (have_rows('social', 'option')) : the_row(); 
              $icon = get_sub_field('icon'); 
              $url = get_sub_field('url'); ?>
                <a href="<?php echo $url; ?>" class="social-link" target="_blank">
                  <img class="lazyload" data-src="<?php echo $icon; ?>" alt="">
                </a>
              <?php endwhile; ?>
            </div>
            <div class="footer-item__content">
              <?php echo $social; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php 
      $count = count(get_field('partners', 'option'));
      if (have_rows('partners', 'option')) : ?>
        <div class="footer-partners a-up">
          <?php while (have_rows('partners', 'option')) : the_row(); 
          $link = get_sub_field('link'); 
          $logo = get_sub_field('logo'); ?>
            <?php if (get_row_index() == $count) : ?>
              <span class="divider"></span>
            <?php endif; ?>
            <a href="<?php echo $link; ?>" class="footer-partners__link" target="blank">
              <img class="lazyload" data-src="<?php echo $logo; ?>" alt="">
            </a>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-bottom">
      <?php if (have_rows('links', 'option')) : ?>
        <div class="footer-bottom__links">
          <?php while (have_rows('links', 'option')) : the_row(); 
          if ($link = get_sub_field('link')) : ?>
            <a href="<?php echo $link['url']; ?>" 
                class="footer-bottom__link" 
                target="<?php echo $link['target']; ?>">
              <?php echo $link['title']; ?>
            </a>
          <?php endif;
          endwhile; ?>
        </div>
      <?php endif; ?>

      <div class="footer-bottom__copyright">
        <a href="#" class="footer-bottom__link">Website Credit</a> 
        <span class="divider">|</span>
        <p class="copyright">Copyright &copy; <?php echo date('Y'); ?></p>
      </div>
  </div>
</footer>

<!-- Global Popup -->
<div class="popup">
  <button class="popup-close">
    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      <line x1="29.5772" y1="30.9914" x2="1.29292" y2="2.70714" stroke="white" stroke-width="2"/>
      <line x1="1.29302" y1="29.5772" x2="29.5773" y2="1.29292" stroke="white" stroke-width="2"/>
    </svg>
  </button>
  <div class="popup-inner">
    <div class="popup-header"></div>
    <div class="popup-body"></div>
  </div>
</div>
<?php wp_footer(); ?>

