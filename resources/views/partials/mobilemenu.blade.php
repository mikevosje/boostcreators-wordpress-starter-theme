<div class="mobilemenuwrapper mobile-menu">
  <div class="mobilemenubackground"></div>
  <div class="mobilenavigation">
    <div>
      <div class="mobilenavigationtop">
        <a class="brand" href="{{ home_url('/') }}">
          <img src="@asset('images/Logo_pacc_UK.svg')"/>
        </a>
        <div class="mobile-close">
          <svg data-v-a68d4e16="" viewBox="0 0 30 30" class="jum-icon jum-icon-m">
            <svg id="jum-close" group="solid" chameleon="true">
              <path
                d="M17.567 15l7.883-7.883c.733-.734.733-1.834 0-2.567-.733-.733-1.833-.733-2.567 0L15 12.433 7.117 4.55c-.734-.733-1.834-.733-2.567 0-.733.733-.733 1.833 0 2.567L12.433 15 4.55 22.883c-.733.734-.733 1.834 0 2.567.367.367.917.55 1.283.55.367 0 .917-.183 1.284-.55L15 17.567l7.883 7.883c.367.367.917.55 1.284.55.366 0 .916-.183 1.283-.55.733-.733.733-1.833 0-2.567L17.567 15z"></path>
            </svg>
          </svg>
        </div>
      </div>
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav d-flex justify-content-between']) !!}
      @endif
      <div class="divider"></div>
      <div class="mobilebottom">
        <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="form-group has-search">
            <input type="text" name="s" id="s" class="form-control w-100" placeholder="Zoeken">
            <span class="fa fa-search form-control-feedback"></span>
          </div>
        </form>
        <div class="headermiddleaddress d-flex mt-3">
          <div class="adresicon fa fa-map-marker-alt"></div>
          <p>{{get_field('pacc_adres','option')}}<br/>{{get_field('pacc_postcode_en_plaats','option')}}</p>
        </div>
        <div class="headermiddlemobile d-flex mt-4">
          <div class="mobileicon m-0 mr-3 fa fa-mobile-alt"></div>
          <p><a href="tel:{{get_field('pacc_telefoonnummer','option')}}"
                class="phonenumber">{{get_field('pacc_telefoonnummer','option')}}</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
