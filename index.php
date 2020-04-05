<?php
  // NOTE định nghĩa những giá trị cơ bản
  $strPageHeadTitle = 'giao nhận landing page';
  $strBodyClass     = 'amazon-landing-page';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <?php ### Start ### Những thẻ tag quan trọng, buộc phải có để SEO ?>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="robots" content="INDEX, FOLLOW"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="revisit-after" content="1 days"/>
    <meta http-equiv="REFRESH" content="1500"/>
    <meta property="og:type" content="website"/>
    <?php ### End ### Những thẻ tag quan trọng, buộc phải có để SEO ?>

    <title><?php echo $strPageHeadTitle ?></title>
    <link rel="icon" href="" type="image/x-icon"/>

    <?php
      // NOTE định nghĩa biến tạm (file css, js và đường dẫn cần thiết)
      // NOTE Application version
      $applicationVersion = '1.0.0';

      // NOTE đường dẫn tuyệt đối đến index.php hiện tại
      $staticUrl    = './';
      $staticCssUrl = $staticUrl . '/tmp/css';
      $staticJsUrl  = $staticUrl . '/tmp/js';
      $staticImgUrl = $staticUrl . '/tmp/images';

      // NOTE cấu hình danh sách file css liên quan
      $arrHeaderCSS = [
        $staticCssUrl . '/vendor-style.css',
        $staticCssUrl . '/home-page-style.css',
      ];

      $arrHeaderJS = [
        $staticJsUrl . '/home-page.js',
      ];

      // NOTE in danh sách css đã được định nghĩa ở trên
      if ($arrHeaderCSS):
        foreach ($arrHeaderCSS as $css):
          ?>
          <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>?v=<?php echo $applicationVersion; ?>"/>
        <?php
        endforeach;
      endif;
    ?>

    <script>
      // định nghĩa
      window.page = {};

      window.onloadCallbackStack = [];
      window.addOnloadEvent = function (event) {
        window.onloadCallbackStack.push(event);
        window.onload = function () {
          var i = 0;
          for (i = 0; i < window.onloadCallbackStack.length; i++) {
            window.onloadCallbackStack[ i ]();
          }
        }
      };

      window.onbeforeunloadCallbackStack = [];
      window.addBeforeUnloadEvent = function (event) {
        window.onbeforeunloadCallbackStack.push(event);
        window.onbeforeunload = function () {
          var i = 0;
          for (i = 0; i < window.onbeforeunloadCallbackStack.length; i++) {
            window.onbeforeunloadCallbackStack[ i ]();
          }
        }
      };
    </script>

    <?php
      // NOTE in danh sách js đã được định nghĩa ở trên
      if ($arrHeaderJS):
        foreach ($arrHeaderJS as $js):
          ?>
          <script src="<?php echo $js; ?>?v=<?php echo $applicationVersion; ?>" defer></script>
        <?php
        endforeach;
      endif;
    ?>
  </head>
  <body class="<?php echo $strBodyClass; ?>">
    <?php
      $arrIntroPanelList = [
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-usd-circle"></i>',
          'introPanelMainTitle' => 'Báo giá tự động',
          'introPanelTitle' => 'Không phát sinh chi phí',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-user-shield"></i>',
          'introPanelMainTitle' => 'Bảo vệ người mua',
          'introPanelTitle' => 'Bảo hiểm 100%',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-box-check"></i>',
          'introPanelMainTitle' => 'Miễn thuế bang Mỹ',
          'introPanelTitle' => 'Tax 0%',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-map-marked-alt"></i>',
          'introPanelMainTitle' => 'Hỗ trợ đổi trả',
          'introPanelTitle' => 'Chính sách',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-shield-check"></i>',
          'introPanelMainTitle' => 'Thanh toán linh hoạt',
          'introPanelTitle' => 'Chỉ từ 50%',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-globe-stand"></i>',
          'introPanelMainTitle' => 'Nhập khẩu chính ngạch',
          'introPanelTitle' => 'Cung cấp hóa đơn cho DN',
        ],
      ];
    ?>

    <header class="fado-landing-header-block" id="fado-landing-header-block">
      <div class="mz-container">
        <div class="block-head">
          <div class="block-head-top">
            <div class="block-head-top-inner">
              <div class="head-segment-header-logo">
                <a href="" class="header-logo-link">
                  <img src="<?php echo $staticImgUrl; ?>/logo-gn247.svg" alt="" class="head-segment-header-logo-img">
                </a>
              </div>
            </div>
          </div> <!-- .block-head-top -->

          <div class="block-head-mid">
            <h1 class="head-mid-segment-title">
          <span class="title-inner">
            Mua hàng Amazon nhanh chóng, an toàn với nhiều tiện ích
          </span>
            </h1>

            <div class="head-mid-segment-content">
              Giaonhan247- Giải pháp toàn diện giúp mua hộ hàng từ Amazon Mỹ, Đức, Nhật, Anh, Úc… Chi phí cạnh tranh, đa tiện ích, hỗ trợ mua hàng amazon nhanh chóng và đơn giản nhất.
            </div>

            <div class="head-mid-segment-slogan">
              Nhập tên hoặc link sản phẩm muốn tìm mua từ Amazon
            </div>

            <div class="head-mid-segment-form-outer">
              <form action="" class="head-mid-segment-form amazon-search-form">
                <div class="head-mid-segment-search-form">
                  <i class="head-mid-segment-cart-icon fal fa-shopping-cart"></i>
                  <input type="text" class="head-mid-segment-search-input amazon-search-input" placeholder="Tìm kiếm">
                  <button type="submit" class="head-mid-segment-search-btn">
                    <i class="amazon-search-icon fal fa-search"></i>
                  </button>
                </div>
              </form>
            </div>

            <div class="head-mid-segment-tag-group">
              <div class="head-mid-segment-tag-inner">
            <span class="head-mid-segment-tag-title">
              VD:
            </span>
                <div class="head-mid-segment-tag-list">
                  <a href="javascript:;" class="head-mid-segment-tag-item">
                    "điện thoại"
                  </a>,
                  <a href="javascript:;" class="head-mid-segment-tag-item">
                    "đồng hồ"
                  </a>,
                  <a href="javascript:;" class="head-mid-segment-tag-item">
                    watch
                  </a>,
                  <a href="javascript:;" class="head-mid-segment-tag-item">
                    iphone
                  </a>,
                  <a href="javascript:;" class="head-mid-segment-tag-item">
                    ssd
                  </a>
                </div>
              </div>
            </div>
          </div> <!-- .block-head-mid -->

          <div class="block-head-bot">
            <div class="head-bot-slogan">
              Hỗ trợ vượt trội so với thị trường
            </div> <!-- .head-mid-segment-slogan -->

            <div class="head-bot-segment-intro-group">
              <div class="head-bot-segment-intro-list">
                <?php
                  foreach ($arrIntroPanelList as $arrIntroPanelItem):
                    ?>
                    <div class="head-bot-segment-intro-panel">
                      <div class="segment-intro-panel-inner">
                        <div class="intro-panel-icon-outer">
                          <?php
                            echo $arrIntroPanelItem['introPanelIcon'];
                          ?>
                        </div>

                        <div class="intro-panel-main-title">
                          <?php
                            echo $arrIntroPanelItem['introPanelMainTitle'];
                          ?>
                        </div>

                        <div class="intro-panel-title">
                          <?php
                            echo $arrIntroPanelItem['introPanelTitle'];
                          ?>
                        </div>
                      </div>
                    </div>
                  <?php
                  endforeach;
                ?>
              </div> <!-- .head-bot-segment-intro-list -->
            </div> <!-- .head-bot-segment-intro-group -->
          </div> <!-- .block-head-bot -->
        </div> <!-- .block-head -->

        <div class="block-foot">
          <div class="foot-segment-globe-bg">
            <div class="main-globe-bg wow fadeIn">
              <div class="globe-circle-item  wow fadeIn" data-wow-delay='0.5s'>
                <span class="globe-circle-title">CHỌN<br class="is-break"/> SẢN PHẨM</span>
                <i class="globe-circle-icon fal fa-tasks"></i>
              </div>
              <div class="globe-circle-item wow fadeIn" data-wow-delay='1.5s'>
                <span class="globe-circle-title">BỎ VÀO GIỎ HÀNG</span>
                <i class="globe-circle-arrow"></i>
                <i class="globe-circle-icon fal fa-cart-arrow-down"></i>
              </div>
              <div class="globe-circle-item wow fadeIn" data-wow-delay='2.5s'>
                <span class="globe-circle-title">KIỂM TRA & THANH TOÁN</span>
                <i class="globe-circle-arrow"></i>
                <i class="globe-circle-icon fal fa-hand-holding-usd"></i>
              </div>
              <div class="globe-circle-item wow fadeIn" data-wow-delay='3.5s'>
                <span class="globe-circle-title">CHUYỂN HÀNG</span>
                <i class="globe-circle-arrow"></i>
                <i class="globe-circle-icon fal fa-shipping-fast"></i>
              </div>
              <div class="globe-circle-item wow fadeIn" data-wow-delay='4.5s'>
                <span class="globe-circle-title">NHẬN HÀNG</span>
                <i class="globe-circle-arrow"></i>
                <i class="globe-circle-icon fal fa-box-check"></i>
              </div>
            </div> <!-- .main-globe-bg -->
          </div> <!-- .foot-segment-globe-bg -->

          <div class="foot-segment-bg">
            <img src="<?php echo $staticImgUrl ?>/main-graphic-small.png" alt="" class="foot-segment-img">
          </div> <!-- .foot-segment-bg -->

          <div class="foot-segment-list-country">
            <a href="" class="foot-segment-country-item">
              <i class="icon-country-us --size-20"></i>
              <span class="foot-segment-country-text">Từ Mỹ</span>
            </a>

            <a href="" class="foot-segment-country-item">
              <i class="icon-country-jp --size-20"></i>
              <span class="foot-segment-country-text">Từ Nhật</span>
            </a>

            <a href="" class="foot-segment-country-item">
              <i class="icon-country-de --size-20"></i>
              <span class="foot-segment-country-text">Từ Đức</span>
            </a>
          </div> <!-- .foot-segment-list-country -->
        </div> <!-- .block-foot -->

        <div class="block-move-btn">
          <a href="#intro-block" class="move-btn-item" id="jsMoveBtnItem">
            <i class="far fa-chevron-down down-arrow-item"></i>
          </a>
        </div> <!-- .block-move-btn -->

        <div class="scroll-pagination-dot-list">
          <a href="#fado-landing-header-block" class="scroll-pagination-dot-item is-active"></a>
          <a href="#intro-block" class="scroll-pagination-dot-item"></a>
          <a href="#trend-block" class="scroll-pagination-dot-item"></a>
          <a href="#home-feedback-section" class="scroll-pagination-dot-item"></a>
          <a href="#footer-section" class="scroll-pagination-dot-item"></a>
        </div> <!-- .scroll-pagination-dot-list -->
      </div>
    </header> <!-- .fado-landing-header-block -->

    <?php
      $arrBenefitList = [
        [
          'title'          => 'Mua sắm không giới hạn',
          'content'        => 'Mua hộ tất cả các sản phẩm từ Amazon Mỹ và các nước khác ở nhiều lĩnh vực công nghệ, sức khỏe, gia dụng, thời trang… mọi lúc, mọi nơi.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-unlimited-shopping.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Vận chuyển nhanh chóng- Liên tục cập nhật hành trình',
          'content'        => 'Hàng sẽ được đặt mua ngay sau khi thanh toán. Thông báo nhanh dự kiến thời gian nhận hàng giúp khách hàng chủ động mua sắm. Hệ thống theo dõi tiến trình vận chuyển rõ ràng của Giaonhan247 giúp khách hàng dễ dàng theo dõi hành trình đơn hàng xuyên suốt từ lúc thanh toán đến khi nhận hàng.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-faster-transfer.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Dùng hàng ngoại chi phí thấp',
          'content'        => 'Vận chuyển bằng máy bay vận tải chuyên dụng <b>(Freighter)</b> giúp cho Giaonhan247 cung cấp dịch vụ vận chuyển nhanh với giá cước cạnh tranh.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-lower-cost.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đảm bảo giao dịch, bảo hiểm 100%, hỗ trợ khiếu kiện',
          'content'        => 'Bảo hiểm 100% số tiền đặt mua. Đảm bảo giao dịch, bảo vệ người mua, hỗ trợ khiếu kiện với người bán, các rủi ro phát sinh sẽ được Giaonhan247 giải quyết với mục tiêu bảo vệ quyền lợi khách hàng.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-transaction-guarantee.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đổi trả xuyên biên giới dễ dàng',
          'content'        => 'Hãy để Giaonhan247 giúp bạn trả lại người bán nếu sản phẩm thực tế không đúng như thông tin mô tả.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-exchange-easy.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Dự kiến giao hàng, cập nhật hành trình liên tục',
          'content'        => 'Sau khi thanh toán 24-48h Giaonhan247 sẽ cập nhật ngày nhận hàng dự kiến. Trong suốt quá trình quý khách sẽ được cập nhật thông tin liên tục.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-update-step-continuity.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Nhập khẩu chính ngạch, minh bạch nguồn gốc - Cung cấp hóa đơn VAT cho doanh nghiệp',
          'content'        => ' Hỗ trợ cá nhân/ Doanh nghiệp giao dịch nhập khẩu trực tiếp với người bán nước ngoài, cung cấp hóa đơn VAT cho doanh nghiệp.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-official-import.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đảm bảo giao dịch. Hỗ trợ đổi trả dễ dàng.',
          'content'        => 'Sàn Fado đảm bảo giao dịch, hỗ trợ khiếu nại với người bán, đổi trả xuyên biên giới dễ dàng, bảo vệ người mua.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-exchange-easy.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Ưu đãi theo cấp thành viên',
          'content'        => 'Giaonhan247 có chính sách chiết khấu đặt biệt cho từng cấp thành viên, ngoài ra có có nhiều ưu đãi hấp dẫn theo từng cấp: silver, gold, platinum khi trở thành thành viên thân thiết.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-member-benefit.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đội ngũ tư vấn tận tâm',
          'content'        => 'Đội ngũ tư vấn sẽ cung cấp, giải đáp thông tin chính xác khi mua hàng. Hỗ trợ khách hàng liên hệ với seller để kiểm tra thông tin sản phẩm trước khi khách hàng quyết định tiến hành thanh toán.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-professional-advice.svg',
          'is-none-border' => false,
          'is-last'        => true,
        ],
        [
          'title'          => 'Đàm phán thương lượng giá tốt',
          'content'        => 'Giaonhan247 hỗ trợ đàm phán với người bán quốc tế khi đặt mua số lượng lớn.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-price-negotiation.svg',
          'is-none-border' => false,
          'is-last'        => true,
        ],
      ];
    ?>

    <div class="intro-block">
      <div class="block-head-segment" id="intro-block">
        <div class="mz-container head-segment-top-box">
          <div class="head-segment-top">
            <div class="head-segment-top-title">
              LỢI ÍCH KHI MUA HÀNG AMAZON QUA GIAONHAN247
            </div>
            <!-- .head-segment-top-title -->
            <div id="head-segment-top-benefit-wrap" class="head-segment-top-benefit-wrap">
              <?php
                foreach ($arrBenefitList as $arrBenefitItem):
                  ?>
                  <div class="head-segment-top-benefit-panel wow fadeInUp
                <?php
                    if (!empty($arrBenefitItem['is-last'])) {
                      echo ' is-border-bottom';
                    }
                  ?>">
                    <div class="head-segment-top-benefit-panel-fake">
                      <div class="benefit-panel-head">
                        <div class="benefit-panel-segment-fake">
                          <div class="panel-icon-img-outer">
                            <div class="panel-circle-bg"></div>
                            <img src="<?php echo $arrBenefitItem['imageUrl']; ?>" alt="" class="panel-icon-img">
                          </div>
                        </div>
                        <div class="benefit-panel-segment-last">
                          <div class="panel-title-fake">
                            <?php
                              echo $arrBenefitItem['title'];
                            ?>
                          </div>
                          <div class="panel-control-btn-outer">
                            <i class="panel-control-icon-btn"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- .head-segment-top-benefit-panel-fake -->
                    <div class="head-segment-top-benefit-panel-inner">
                      <div class="benefit-panel-circle-bg"></div>
                      <div class="benefit-panel-head">
                        <div class="benefit-panel-segment-first">
                          <div class="panel-icon-img-outer">
                            <div class="panel-circle-bg"></div>
                            <img src="<?php echo $arrBenefitItem['imageUrl']; ?>" alt="" class="panel-icon-img">
                          </div>
                        </div>
                        <!-- .benefit-panel-segment-first -->
                        <div class="benefit-panel-segment-last">
                          <div class="panel-title-field">
                            <?php
                              echo $arrBenefitItem['title'];
                            ?>
                          </div>
                          <div class="panel-control-btn-outer">
                            <i class="panel-control-icon-btn"></i>
                          </div>
                        </div>
                        <!-- .benefit-panel-segment-last -->
                      </div>
                      <!-- .benefit-panel-head -->
                      <div class="benefit-panel-bot">
                        <div class="panel-content">
                          <?php
                            echo $arrBenefitItem['content'];
                          ?>
                        </div>
                      </div>
                      <!-- .benefit-panel-bot -->
                    </div>
                    <!-- .head-segment-top-benefit-panel-inner -->
                  </div>
                  <!-- .head-segment-top-benefit-panel -->
                <?php
                endforeach;
              ?>
            </div>
          </div>
          <!-- .head-segment-top -->
        </div>
      </div>
      <!-- .block-head-segment -->
      <div class="block-foot-segment" id="trend-block">
        <div class="mz-container foot-segment-box">
          <div class="foot-segment-title">
            Amazon
          </div>
          <div class="foot-segment-content">
          <span class="segment-content-item">
          BẠN CHỌN ĐỒ TRÊN AMAZON, <br class="is-break"/>CHÚNG TÔI MUA HỘ BẠN!
          </span>
            <span class="segment-content-item">
          CHỦ ĐỘNG SĂN DEAL, PHIÊU CÙNG GIÁ CHẤT
          </span>
          </div>
          <!-- .foot-segment-content -->
          <div class="foot-segment-form-outer">
            <form action="" class="foot-segment-form amazon-search-form">
              <div class="foot-segment-search-form">
                <i class="foot-segment-cart-icon fal fa-shopping-cart"></i>
                <input type="text" class="foot-segment-search-input amazon-search-input" placeholder="Tìm kiếm">
                <button type="submit" class="foot-segment-search-btn">
                  <i class="amazon-search-icon fal fa-search"></i>
                </button>
              </div>
            </form>
            <!-- .foot-segment-form amazon-search-form -->
          </div>
          <!-- .foot-segment-form-outer -->
          <div class="foot-segment-slogan">
          <span class="segment-slogan-item">
          Mua hàng nhanh chóng <span class="slogan-dot">•</span> Giá bạn mua bằng giá bạn thấy<br class="is-break"/>Giao hàng sau 10-15 ngày <span class="slogan-dot">•</span> Bảo vệ người mua
          </span>
            <span class="segment-slogan-item">
          Lựa chọn không giới hạn <span class="slogan-dot">•</span> Không lo thủ tục <span class="slogan-dot">•</span> Yên tâm mua sắm <span class="slogan-dot">•</span> Tiết kiệm chi phí
          </span>
          </div>
          <!-- .foot-segment-slogan -->
        </div>
        <!-- .foot-segment-box -->
      </div>
      <!-- .block-foot-segment -->
    </div>
    <!-- .intro-block -->

    <section id="home-deal-section" class="home-deal-section">
      <div class="short-split-line-space">
        <div class="short-split-line"></div>
      </div> <!-- .short-split-line-space -->

      <div class="home-deal-tab-group-outer">
        <div class="home-deal-tab-group">
          <button class="mz-btn mz-btn-md mz-btn-info mz-brd-round mz-btn-product-tab is-active">
            <span class="mz-button-label">Bất kỳ</span></button>
          <button class="mz-btn mz-btn-md mz-btn-info mz-brd-round mz-btn-product-tab">
            <span class="mz-button-label">Mỹ</span></button>
          <button class="mz-btn mz-btn-md mz-btn-info mz-brd-round mz-btn-product-tab">
            <span class="mz-button-label">Nhật</span></button>
          <button class="mz-btn mz-btn-md mz-btn-info mz-brd-round mz-btn-product-tab">
            <span class="mz-button-label">Đức</span></button>
          <button class="mz-btn mz-btn-md mz-btn-info mz-brd-round mz-btn-product-tab">
            <span class="mz-button-label">Anh</span></button>
        </div> <!-- .home-deal-tab-group -->
      </div> <!-- .home-deal-tab-group-outer -->

      <?php
        $arrProductDealList = [
          [
            'name' => 'Save 30% on PreSonus Studio Recording Software',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/A1YHYCpUKDL.png" data-src="https://images-na.ssl-images-amazon.com/images/I/A1YHYCpUKDL.png',
            'url' => '',
            'discount-percent' => '30',
            'review' => '12',
            'rating' => '4.5',
            'current-price' => '$69.96',
            'old-price' => '$91.00',
            'country' => 'Mỹ',
          ],
          [
            'name' => '新居に欲しい収納・家具がお買い得 4/3限定',
            'image' => 'https://m.media-amazon.com/images/G/09/goldbox/custom-image/DOTDimage2020403._CB1198675309_.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '1071',
            'rating' => '4.5',
            'current-price' => '¥7,002.00',
            'old-price' => '',
            'country' => 'Nhật',
          ],
          [
            'name' => 'Nur heute: "Celeste - Zwischen Himmel und Erde" und mehr über 70% reduziert',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/51DNAcGxv0L.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '74',
            'rating' => '4.5',
            'current-price' => '',
            'old-price' => '',
            'country' => 'Đức',
          ],
          [
            'name' => '20% off Yakoe Garden Furniture',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/5110JT-3VQL.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '119',
            'rating' => '4.5',
            'current-price' => '₤433.99',
            'old-price' => '',
            'country' => 'Anh',
          ],
          [
            'name' => 'Save up to 88% on select Sims 4 PC digital titles',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/51EubNuA7OL.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '1276',
            'rating' => '4.5',
            'current-price' => '$4.99',
            'old-price' => '',
            'country' => 'Mỹ',
          ],

          [
            'name' => 'Save 30% on PreSonus Studio Recording Software',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/A1YHYCpUKDL.png" data-src="https://images-na.ssl-images-amazon.com/images/I/A1YHYCpUKDL.png',
            'url' => '',
            'discount-percent' => '30',
            'review' => '12',
            'rating' => '4.5',
            'current-price' => '$69.96',
            'old-price' => '$91.00',
            'country' => 'Mỹ',
          ],
          [
            'name' => '新居に欲しい収納・家具がお買い得 4/3限定',
            'image' => 'https://m.media-amazon.com/images/G/09/goldbox/custom-image/DOTDimage2020403._CB1198675309_.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '1071',
            'rating' => '4.5',
            'current-price' => '¥7,002.00',
            'old-price' => '',
            'country' => 'Nhật',
          ],
          [
            'name' => 'Nur heute: "Celeste - Zwischen Himmel und Erde" und mehr über 70% reduziert',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/51DNAcGxv0L.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '74',
            'rating' => '4.5',
            'current-price' => '',
            'old-price' => '',
            'country' => 'Đức',
          ],
          [
            'name' => '20% off Yakoe Garden Furniture',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/5110JT-3VQL.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '119',
            'rating' => '4.5',
            'current-price' => '₤433.99',
            'old-price' => '',
            'country' => 'Anh',
          ],
          [
            'name' => 'Save up to 88% on select Sims 4 PC digital titles',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/51EubNuA7OL.jpg',
            'url' => '',
            'discount-percent' => '',
            'review' => '1276',
            'rating' => '4.5',
            'current-price' => '$4.99',
            'old-price' => '',
            'country' => 'Mỹ',
          ],
        ];
      ?>

      <div class="mz-container home-deal-body is-active">
        <div class="mz-product-wrap">
          <?php
            foreach ($arrProductDealList as $arrProductDealItem) :
          ?>
            <div data-asin="" data-merchant="" class="mz-product-item">
              <div class="mz-product-top">
                <a href="" rel="nofollow">
                  <img alt="<?php echo $arrProductDealItem['name']; ?>" src="<?php echo $arrProductDealItem['image']; ?>" class="mz-product-image">
                  <?php
                    if($arrProductDealItem['discount-percent']) :
                  ?>
                    <span class="mz-product-sale-tag">-<?php echo $arrProductDealItem['discount-percent']; ?>%</span>
                  <?php
                    endif;
                  ?>
                </a>
              </div> <!-- .mz-product-top -->

              <div class="mz-product-body">
                <div class="mz-product-title">
                  <a href="<?php echo $arrProductDealItem['url']; ?>" class="mz-product-title-link">
                    <?php
                      echo $arrProductDealItem['name'];
                    ?>
                  </a>
                </div> <!-- .mz-product-title -->

                <div class="mz-row mz-product-info-row">
                  <div class="mz-product-rating">
                    <!-- chỗ này chạy function in star -->
                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half-alt text-warning"></i>

                    <?php
                      if(
                        !empty($arrProductDealItem['review']) &&
                        is_numeric($arrProductDealItem['review']) &&
                        $arrProductDealItem['review'] > 0
                      ) :
                    ?>
                      <div class="mz-product-review-total">(<?php echo $arrProductDealItem['review']; ?>)</div>
                    <?php
                      endif;
                    ?>
                  </div>
                  <div class="mz-product-country">
                    <div class="mz-product-country-name">Mỹ</div>
                    <div class="mz-product-country-flag">
                      <img src="http://wp.giaonhan247.com/wp-content/themes/giaonhan/static/tmp/image/flag/flag-circle-us.svg" class="mz-product-country-flag-img">
                    </div>
                  </div>
                </div> <!-- .mz-product-info-row -->

                <div class="mz-product-price">
                  <div class="mz-product-price-final">
                    <?php
                      if(!empty($arrProductDealItem['current-price'])) :
                    ?>
                        <?php echo $arrProductDealItem['current-price']; ?>
                    <?php
                      else :
                    ?>
                        <small>Yêu cầu để được báo giá</small>
                    <?php
                      endif;
                    ?>
                  </div> <!-- .mz-product-price-final -->

                  <?php
                    if(!empty($arrProductDealItem['old-price'])) :
                  ?>
                    <div class="mz-product-price-before">
                      <?php echo $arrProductDealItem['old-price']; ?>
                    </div> <!-- .mz-product-price-before -->
                  <?php
                    endif;
                  ?>
                </div> <!-- .mz-product-price -->

                <div class="mz-row mz-product-info-row">
                  <button class="mz-product-button mz-brd-round mz-btn-add-to-cart">
                    <span class="mz-product-button-icon">
                      <i class="fal fa-cart-plus"></i>
                    </span>
                    <span class="mz-product-button-label">
                      Giỏ hàng
                    </span>
                  </button>
                </div> <!-- .mz-product-info-row -->
              </div>
            </div> <!-- .mz-product-item -->
          <?php
            endforeach;
          ?>
        </div> <!-- .mz-product-wrap -->
      </div> <!-- .home-deal-body -->
    </section> <!-- .home-deal-section -->

    <section id="home-feedback-section" class="home-feedback-section">
      <div class="mz-container">
        <div class="home-feedback-section-title"><h2 class="home-h2-title">Nhận xét của Khách Hàng</h2></div>
        <div class="home-feedback-section-des">
          Sự hài lòng của quý khách là mục tiêu, là động lực phấn đấu của giaonhan247. Chân thành cảm ơn những ý kiến đóng góp của quý khách.
        </div>
        <div class="home-feedback-main-group">
          <div class="home-feedback-slider-xs">
            <div class="home-feedback-slider-xs-inner">
              <div class="feedback-slide-item-xs-outer">
                <div class="feedback-slide-item-xs">
                  <div class="home-feedback-info-user">
                    <div class="home-feedback-info-left-col">
                      <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                    </div>
                    <div class="home-feedback-info-right-col">
                      <div class="home-feedback-info-user-name">Nguyễn Chí Toại</div>
                      <div class="home-feedback-info-user-rating">
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-off"></i>
                        <i class="fas fa-star is-star-off"></i>
                      </div>
                    </div>
                  </div>
                  <div class="home-feedback-user-feedback">
                    Trước tiên nếu xếp hạng bậc sao (*) từ 1 tới 5 thì mình đánh giá 5 sao (*****).Các bạn báo giá dịch vụ rất nhanh, nhiều lúc mình nhờ báo giá xong vì vài lý do gì đó mà mình đổi ý nhờ báo giá món khác làm nhu vậy từ 2 đến 3 lần mà phía các bạn báo giá vẫn báo giá cho mình, Thanh toán tiền dư các bạn vẫn nhắc mình để trừ vào lần mua hàng sao. Tư vấn dịch vụ mua hàng hộ rất nhanh và nhiệt tình. Hy vọng giaonhan247 có thể mở rộng thêm địa bàn hoạt động ở các nước khác nữa
                  </div>
                  <div class="home-feedback-reply-group">
                    <div class="home-feedback-reply-feedback">
                      Gửi anh Toại,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                    </div>
                    <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11609" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                  </div>
                </div>
              </div>

              <div class="feedback-slide-item-xs-outer">
                <div class="feedback-slide-item-xs">
                  <div class="home-feedback-info-user">
                    <div class="home-feedback-info-left-col">
                      <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                    </div>
                    <div class="home-feedback-info-right-col">
                      <div class="home-feedback-info-user-name">Hồ Tấn Thành</div>
                      <div class="home-feedback-info-user-rating">
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-off"></i>
                        <i class="fas fa-star is-star-off"></i>
                      </div>
                    </div>
                  </div>
                  <div class="home-feedback-user-feedback">
                    Dịch vụ của các bạn rất tốt, tôi rất hài lòng.
                  </div>
                  <div class="home-feedback-reply-group">
                    <div class="home-feedback-reply-feedback">
                      Chào anh,&nbsp;Giaonhan247 cảm ơn anh đã đóng góp ý kiến ạ&nbsp;Giaonhan247 sẽ càng cố gắng cải thiện hơn để đem đến cho khách hàng dịch vụ tốt nhất cho tương lai nữa ạ&nbsp;Mong được hỗ trợ anh cho những lần sau và lâu dài hơnCảm ơn anh.&nbsp;
                    </div>
                    <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11607" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                  </div>
                </div>
              </div>

              <div class="feedback-slide-item-xs-outer">
                <div class="feedback-slide-item-xs">
                  <div class="home-feedback-info-user">
                    <div class="home-feedback-info-left-col">
                      <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                    </div>
                    <div class="home-feedback-info-right-col">
                      <div class="home-feedback-info-user-name">Trần Quốc Trung</div>
                      <div class="home-feedback-info-user-rating">
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-off"></i>
                        <i class="fas fa-star is-star-off"></i>
                      </div>
                    </div>
                  </div>
                  <div class="home-feedback-user-feedback">
                    Các bạn rất chuyên nghiệp , lịch sự và uy tínCảm ơn nhiều !
                  </div>
                  <div class="home-feedback-reply-group">
                    <div class="home-feedback-reply-feedback">
                      Chào anh,&nbsp;&nbsp;Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ. Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh
                    </div>
                    <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11605" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                  </div>
                </div>
              </div>

              <div class="feedback-slide-item-xs-outer">
                <div class="feedback-slide-item-xs">
                  <div class="home-feedback-info-user">
                    <div class="home-feedback-info-left-col">
                      <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                    </div>
                    <div class="home-feedback-info-right-col">
                      <div class="home-feedback-info-user-name">Phạm Thái Sơn</div>
                      <div class="home-feedback-info-user-rating">
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-on"></i>
                        <i class="fas fa-star is-star-off"></i>
                        <i class="fas fa-star is-star-off"></i>
                      </div>
                    </div>
                  </div>
                  <div class="home-feedback-user-feedback">
                    Đây là lần đầu tiên sử dụng dịch vụ mua hộ quần áo từ Mỹ của Giaonhan247 nhưng cảm thấy rất hài lòng. Chăm sóc và phản hồi khách hàng rát nhanh, nhân viên giao hàng cũng rất vui vẻ, niềm nở. Món hàng mình nhận được vẫn giữ nguyên quy cách bao bì đóng gói từ Mỹ, không bị hư hỏng. Do mình order hàng rơi vào thời gian cuối năm nên có bị trễ hơn dự kiến ban đầu là 2 ngày (cái này là việc rất là bình thường). Mình sẽ tiếp tục sử dụng dịch vụ mua hộ của Giaonhan247 cho những lần sau. Cảm ơn Giaonhan247 rất nhiều!
                  </div>
                  <div class="home-feedback-reply-group">
                    <div class="home-feedback-reply-feedback">
                      Chào anh Sơn,Giaonhan247 cảm ơn anh đã tin tưởng sử dụng dịch vụ ạ . Giaonhan247 sẽ cố gắng phát huy để đem đến cho khách hàng dịch vụ tốt nhất ạ .&nbsp;Mong được hỗ trợ anh cho những đơn hàng sắp tới và trong tương lai&nbsp;Cảm ơn anh.
                    </div>
                    <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11603" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .home-feedback-slider-xs -->

          <div class="home-feedback-slider-wrapper">
            <div class="swiper-container home-feedback-slider swiper-container-initialized swiper-container-horizontal">
              <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-600px, 0px, 0px);">
                <div class="swiper-slide feedback-slide-wrap swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Phạm Nguyên Thảo</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Cảm ơn giaonhan247 đã cung cấp dịch vụ tốt trong thời gian qua.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi chị Thảo,Giaonhan247 cảm ơn chị đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì chị hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ chị ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn chị.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11585" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Bá Huy</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Xin chào, Đối với riêng tôi, là đối tác nhỏ với 247 đã hơn 4 năm nay. ***GN247*** là rất Tốt. Mong 247 trong tương lai, mà giảm được giá vận chuyển 1 phần nào nữa thì sẽ vui sướng hơn nữa, và 247 sẽ có nhiều KH hơn nữa... chắc chắn là như vậy. Chúc 247 và mọi người luôn được như ýTrân trọng
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Huy,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11583" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Mr. Long</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Trước đây tôi không bao giờ tin tưởng và nghĩ mình sẽ mua hàng trên các web và nhất là không bao giờ nghĩ sẽ mua hàng ở những trang web nước ngoài (amazon, ebay...). Nhưng giaonhan247 đã làm tôi thay đổi cách nghĩ trên, tôi đã có 3 đơn hàng thành công với giaonhan247 với phong cách "chuyên nghiệp, rõ ràng, nhiệt tình, nhanh chóng, và đặc biệt là chất lượng". Hy vọng những bạn còn băn khoăn hãy thử một lần với Giaonhan247.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Long,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11581" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Phú Quý</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Dịch vụ tốt nhưng còn hơi chậm khó săn đc deal theo giờ ở. Hỗ trợ khách hàng qua mail tốt + nhiệt tình
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Quý,Cảm ơn anh đã góp ý về&nbsp;dịch vụ Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.&nbsp;Về việc săn deal khi mua hàng, Giaonhan247 sẽ tiếp thu và cố gắng sửa đổi cải thiện hơn ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ.&nbsp;Cảm ơn anh.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11579" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide feedback-slide-wrap swiper-slide-active" data-swiper-slide-index="0" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Chí Toại</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Trước tiên nếu xếp hạng bậc sao (*) từ 1 tới 5 thì mình đánh giá 5 sao (*****).Các bạn báo giá dịch vụ rất nhanh, nhiều lúc mình nhờ báo giá xong vì vài lý do gì đó mà mình đổi ý nhờ báo giá món khác làm nhu vậy từ 2 đến 3 lần mà phía các bạn báo giá vẫn báo giá cho mình, Thanh toán tiền dư các bạn vẫn nhắc mình để trừ vào lần mua hàng sao. Tư vấn dịch vụ mua hàng hộ rất nhanh và nhiệt tình. Hy vọng giaonhan247 có thể mở rộng thêm địa bàn hoạt động ở các nước khác nữa
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Toại,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11609" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Hồ Tấn Thành</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Dịch vụ của các bạn rất tốt, tôi rất hài lòng.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh,&nbsp;Giaonhan247 cảm ơn anh đã đóng góp ý kiến ạ&nbsp;Giaonhan247 sẽ càng cố gắng cải thiện hơn để đem đến cho khách hàng dịch vụ tốt nhất cho tương lai nữa ạ&nbsp;Mong được hỗ trợ anh cho những lần sau và lâu dài hơnCảm ơn anh.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11607" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Trần Quốc Trung</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Các bạn rất chuyên nghiệp , lịch sự và uy tínCảm ơn nhiều !
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh,&nbsp;&nbsp;Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ. Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11605" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Phạm Thái Sơn</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Đây là lần đầu tiên sử dụng dịch vụ mua hộ quần áo từ Mỹ của Giaonhan247 nhưng cảm thấy rất hài lòng. Chăm sóc và phản hồi khách hàng rát nhanh, nhân viên giao hàng cũng rất vui vẻ, niềm nở. Món hàng mình nhận được vẫn giữ nguyên quy cách bao bì đóng gói từ Mỹ, không bị hư hỏng. Do mình order hàng rơi vào thời gian cuối năm nên có bị trễ hơn dự kiến ban đầu là 2 ngày (cái này là việc rất là bình thường). Mình sẽ tiếp tục sử dụng dịch vụ mua hộ của Giaonhan247 cho những lần sau. Cảm ơn Giaonhan247 rất nhiều!
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh Sơn,Giaonhan247 cảm ơn anh đã tin tưởng sử dụng dịch vụ ạ . Giaonhan247 sẽ cố gắng phát huy để đem đến cho khách hàng dịch vụ tốt nhất ạ .&nbsp;Mong được hỗ trợ anh cho những đơn hàng sắp tới và trong tương lai&nbsp;Cảm ơn anh.
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11603" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide feedback-slide-wrap swiper-slide-next" data-swiper-slide-index="1" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Thành Phú</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Dịch vụ nhanh gọn lẹ, sẽ ủng hộ tiếp... thank
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Phú,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11601" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Trần Thị Hạnh</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Rất hài lòng vơi dịch vụ của công ty: báo giá nhanh, mua hàng lẹ và rất cập nhật rất chi tiết trạng thái đơn hàng. Tuy nhiên, khi hàng về VN rồi thì công ty nên thông báo chi tiết hơn tới người mua hàng, có lần mình mua hàng về giao chậm so với dự kiến mà không thấy báo đến khách và mình phải hỏi lại.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi chị Hạnh,Giaonhan247 cảm ơn chị đã gửi phản hồi về dịch vụ của Giaonhan247.&nbsp;Giaonhan247 rất vui vì chị hài lòng với khâu báo giá đặt hàng của Giaonhan247 ạ.Về việc cập nhật thông tin đơn hàng, hiện tại vì cuối năm các đơn hàng đặt mua nhiều, vì vậy không tránh khỏi việc một số đơn hàng Giaonhan247 sơ sót chưa kịp cập nhật thông tin đến chị ạ. Giaonhan247 rất xin lỗi và mong chị thông cảm ạ.Ngoài ra vì hàng hóa được thông quan theo các kiện lớn, hàng về đến kho VN, bộ phận kho hàng kiểm tra hàng mới xác định chắc chắn hàng của chị đã về để thông báo đến chị thông tin chính xác nhất ạ.Giaonhan247 sẽ cố gắng cải thiện việc cập nhật thông tin&nbsp;này&nbsp;để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ chị&nbsp;&nbsp;ạ.Cảm ơn chị .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11599" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Nhật Trung</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Chất lượng dịch vụ rất tốt
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh Nhật Trung ,&nbsp;Giaonhan247 cảm ơn anh đã tin tưởng và sử dụng dịch vụ của Giaonhan247&nbsp;Mong được hỗ trợ anh cho những lần sau và trong tương lai ạ .Cảm ơn anh.
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11597" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Đỗ Kim Ngân</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Lúc đầu mình cũng tham khảo web này nọ rồi thử đặt một cái đồng hồ xem như thế nào. Wow, các bạn nhân viên phải nói làm rất tốt, phản hồi mail nhanh mỗi khi có thắc mắc và hàng hoá thì ship nhanh lại còn chi tiết đơn hàng đang nằm ở vị trí nào. Gói hàng cũng cẩn thận. Nói chung là ưng cái bụng. 100/100 À quan trọng là tỉ lệ % cũng khá ok so với mặt bằng chung trên thị trường. Khi có nhu cầu mua sản phẩm Mỹ chắc chắn mịn sẽ chọn Giaonhan247 ^^
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi chị Ngân,Giaonhan247 cảm ơn chị đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì chị hài lòng với dịch vụ của Giaonhan247 ạ.Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ chị ạ.Cảm ơn chị.
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11595" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide feedback-slide-wrap" data-swiper-slide-index="2" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Vu Hoai Nam</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Mình đã mua tầm 10 đơn hàng từ US, UK, Germany, Australia qua giaonhan247, dịch vụ tốt, chuyên nghiệp. Cám ơn giaonhan247.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Nam,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11593" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Minh Quân</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Tư vấn và giao hàng thì tôi hài lòng, nhưng thông tin trạng thái đơn hàng thì không cập nhật cho khách hàng, tôi phải email thắc mắc thì mới cập nhật, hàng đã về tới VN cũng không cập nhật cho tôi biết, tôi thấy lâu nên hỏi mới biết là đã về. Nói chung quan trọng nhất là tôi đã nhận được hàng như ý muốn, nhưng giaonhan247 nên cải thiện cập nhật tình trạng của gói hàng thườnh xuyên cho khách hàng nắm thông tin để khỏi lo lắng.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Quân,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với khâu tư vấn và giao hàng&nbsp;của Giaonhan247 ạ.Riêng về việc cập nhật thông tin đơn hàng, hiện tại vì cuối năm các đơn hàng đặt mua nhiều, vì vậy không tránh khỏi việc một số đơn hàng Giaonhan247 sơ sót chưa kịp cập nhật thông tin đến anh ạ.Ngoài ra vì hàng hóa được thông quan theo các kiện lớn, hàng về đến kho VN, bộ phận kho hàng kiểm tra hàng mới xác định chắc chắn hàng của anh đã về để thông báo đến anh thông tin chính xác nhất ạ.Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11591" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Ngô Văn Dậu</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Đã nhận hàng, dịch vụ khá nhanh và chu đáo
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Ngô Văn Dậu,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11589" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Thị Minh Thư</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Phản hồi thắc mắc của khách hàng nhanh, giao hàng đúng hẹn, thái độ của nhân viên giao hàng rất tốt.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi chị Thư,Giaonhan247 cảm ơn chị đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì chị hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ chị ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn chị.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11587" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide feedback-slide-wrap swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Phạm Nguyên Thảo</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Cảm ơn giaonhan247 đã cung cấp dịch vụ tốt trong thời gian qua.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi chị Thảo,Giaonhan247 cảm ơn chị đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì chị hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ chị ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn chị.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11585" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Bá Huy</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Xin chào, Đối với riêng tôi, là đối tác nhỏ với 247 đã hơn 4 năm nay. ***GN247*** là rất Tốt. Mong 247 trong tương lai, mà giảm được giá vận chuyển 1 phần nào nữa thì sẽ vui sướng hơn nữa, và 247 sẽ có nhiều KH hơn nữa... chắc chắn là như vậy. Chúc 247 và mọi người luôn được như ýTrân trọng
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Huy,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11583" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Mr. Long</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Trước đây tôi không bao giờ tin tưởng và nghĩ mình sẽ mua hàng trên các web và nhất là không bao giờ nghĩ sẽ mua hàng ở những trang web nước ngoài (amazon, ebay...). Nhưng giaonhan247 đã làm tôi thay đổi cách nghĩ trên, tôi đã có 3 đơn hàng thành công với giaonhan247 với phong cách "chuyên nghiệp, rõ ràng, nhiệt tình, nhanh chóng, và đặc biệt là chất lượng". Hy vọng những bạn còn băn khoăn hãy thử một lần với Giaonhan247.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Long,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11581" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Phú Quý</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Dịch vụ tốt nhưng còn hơi chậm khó săn đc deal theo giờ ở. Hỗ trợ khách hàng qua mail tốt + nhiệt tình
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Quý,Cảm ơn anh đã góp ý về&nbsp;dịch vụ Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.&nbsp;Về việc săn deal khi mua hàng, Giaonhan247 sẽ tiếp thu và cố gắng sửa đổi cải thiện hơn ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ.&nbsp;Cảm ơn anh.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang/comment-page-2/#comment-11579" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide feedback-slide-wrap swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 584px; margin-right: 16px;">
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Nguyễn Chí Toại</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Trước tiên nếu xếp hạng bậc sao (*) từ 1 tới 5 thì mình đánh giá 5 sao (*****).Các bạn báo giá dịch vụ rất nhanh, nhiều lúc mình nhờ báo giá xong vì vài lý do gì đó mà mình đổi ý nhờ báo giá món khác làm nhu vậy từ 2 đến 3 lần mà phía các bạn báo giá vẫn báo giá cho mình, Thanh toán tiền dư các bạn vẫn nhắc mình để trừ vào lần mua hàng sao. Tư vấn dịch vụ mua hàng hộ rất nhanh và nhiệt tình. Hy vọng giaonhan247 có thể mở rộng thêm địa bàn hoạt động ở các nước khác nữa
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Gửi anh Toại,Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ.Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh .
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11609" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Hồ Tấn Thành</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Dịch vụ của các bạn rất tốt, tôi rất hài lòng.
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh,&nbsp;Giaonhan247 cảm ơn anh đã đóng góp ý kiến ạ&nbsp;Giaonhan247 sẽ càng cố gắng cải thiện hơn để đem đến cho khách hàng dịch vụ tốt nhất cho tương lai nữa ạ&nbsp;Mong được hỗ trợ anh cho những lần sau và lâu dài hơnCảm ơn anh.&nbsp;
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11607" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Trần Quốc Trung</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-off"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Các bạn rất chuyên nghiệp , lịch sự và uy tínCảm ơn nhiều !
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh,&nbsp;&nbsp;Giaonhan247 cảm ơn anh đã gửi phản hồi về dịch vụ của Giaonhan247.Giaonhan247 rất vui vì anh hài lòng với dịch vụ của Giaonhan247 ạ. Hy vọng các đơn hàng sắp tới vẫn có thể được hỗ trợ anh ạ. Giaonhan247 sẽ cố gắng cải thiện dịch vụ nhiều hơn nữa để đem đến trải nghiệm mua sắm tốt nhất cho khách hàng ạ.Cảm ơn anh
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11605" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                  <div class="feedback-slide-item">
                    <div class="home-feedback-info-user">
                      <div class="home-feedback-info-left-col">
                        <img class="home-feedback-info-user-image" src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/general/Rachel-R.-Person-760x760.jpg">
                      </div>
                      <div class="home-feedback-info-right-col">
                        <div class="home-feedback-info-user-name">Phạm Thái Sơn</div>
                        <div class="home-feedback-info-user-rating">
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                          <i class="fas fa-star is-star-on"></i>
                        </div>
                      </div>
                    </div>
                    <div class="home-feedback-user-feedback">
                      Đây là lần đầu tiên sử dụng dịch vụ mua hộ quần áo từ Mỹ của Giaonhan247 nhưng cảm thấy rất hài lòng. Chăm sóc và phản hồi khách hàng rát nhanh, nhân viên giao hàng cũng rất vui vẻ, niềm nở. Món hàng mình nhận được vẫn giữ nguyên quy cách bao bì đóng gói từ Mỹ, không bị hư hỏng. Do mình order hàng rơi vào thời gian cuối năm nên có bị trễ hơn dự kiến ban đầu là 2 ngày (cái này là việc rất là bình thường). Mình sẽ tiếp tục sử dụng dịch vụ mua hộ của Giaonhan247 cho những lần sau. Cảm ơn Giaonhan247 rất nhiều!
                    </div>
                    <div class="home-feedback-reply-group">
                      <div class="home-feedback-reply-feedback">
                        Chào anh Sơn,Giaonhan247 cảm ơn anh đã tin tưởng sử dụng dịch vụ ạ . Giaonhan247 sẽ cố gắng phát huy để đem đến cho khách hàng dịch vụ tốt nhất ạ .&nbsp;Mong được hỗ trợ anh cho những đơn hàng sắp tới và trong tương lai&nbsp;Cảm ơn anh.
                      </div>
                      <a href="https://www.giaonhan247.com/phan-hoi-khach-hang#comment-11603" class="home-feedback-reply-read-more" rel="nofollow">Đọc thêm</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
              </div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            <div class="swiper-button-prev home-feedback-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
            <div class="swiper-button-next home-feedback-next" tabindex="0" role="button" aria-label="Next slide"></div>
          </div> <!-- .home-feedback-slider-wrapper -->

          <div class="home-feedback-send-feedback-group">
            <div class="home-feedback-background-image">
              <img src="https://www.giaonhan247.com/wp-content/themes/giaonhan/static/dist/image/background/testimonial-illus.svg">
            </div>
            <div class="home-feedback-button-group">
              <button class="mz-btn mz-btn-md mz-btn-primary mz-brd-round home-feedback-send-feedback-button" data-toggle="modal" data-target="#post-review-box">
                Gửi nhận xét của quý khách
              </button>
              <a href="https://www.giaonhan247.com/phan-hoi-khach-hang" class="mz-btn mz-btn-md mz-btn-outline-primary mz-brd-round home-feedback-readmore-button" rel="nofollow">Xem thêm</a>
            </div>
          </div> <!-- .home-feedback-slider-wrapper -->
        </div>
      </div>

      <div id="post-review-box" class="modal fade post-review-box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mz-modal-dialog" role="document">
          <div class="mz-modal-content mz-modal-form">
            <div class="mz-modal-close-button-row">
              <button type="button" class="close mz-modal-close-top js-close-review-modal" data-dismiss="modal" aria-label="Close">
                <i class="fal fa-times-circle" aria-hidden="true"></i>
              </button>
            </div> <!-- .mz-modal-close-button-row -->

            <div class="mz-modal-head">
              <div class="mz-modal-title">Viết đánh giá</div>
              <div class="post-review-box-rating-star js-star-rating-wrapper">
              </div>
            </div> <!-- .mz-modal-close-button-row -->

            <div class="mz-modal-body">
              <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">
                  <small><a rel="nofollow" id="cancel-comment-reply-link" href="/#respond" style="display:none;">Hủy</a>
                  </small>
                </h3>
                <form action="https://www.giaonhan247.com/wp-comments-post.php" method="post" id="commentform" class="" novalidate="novalidate">
                  <div class="mz-form-control-group">
                    <div class="mz-form-item">
                      <div class="mz-form-control-label">Họ và tên</div>
                      <div class="mz-form-single-col">
                        <div class="mz-form-control mz-form-control-md ">
                          <input id="author" name="author" type="text" class="mz-form-control__input mz-form-control-line mz-form-text-lighter" placeholder="Họ và tên của bạn" value="" "="">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="mz-form-control-group mz-form-phone-email">
                    <div class="mz-form-item">
                      <div class="mz-form-control-label">Email</div>
                      <div class="mz-form-single-col">
                        <div class="mz-form-control mz-form-control-md ">
                          <input id="email" name="email" type="text" class="mz-form-control__input mz-form-control-line mz-form-text-lighter" placeholder="Email của bạn" value="">
                        </div>
                      </div>
                    </div>


                    <div class="mz-form-item">
                      <div class="mz-form-control-label">Số điện thoại</div>
                      <div class="mz-form-single-col">
                        <div class="mz-form-control mz-form-control-md ">
                          <input id="url" name="url" type="text" class="mz-form-control__input mz-form-control-line mz-form-text-lighter" placeholder="Số điện thoại của bạn" value="">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="mz-form-control-group">
                    <div class="mz-form-item">
                      <div class="mz-form-control-label">Nội dung</div>
                      <div class="mz-form-single-col">
                        <div class="mz-form-control">
                          <textarea name="comment" class="mz-form-control-textarea mz-form-control-line mz-form-text-lighter" placeholder="Nội dung của bạn" aria-required="true"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="redirect_to" value="https://www.giaonhan247.com/phan-hoi-khach-hang"><input type="hidden" name="wp_review_comment_rating" class="js-review-comment-rating" value="0">
                  <div class="post-detail-page-form-confirm">
                    <button name="submit" type="submit" id="submit" class="mz-btn mz-btn-md mz-btn-primary mz-brd-round">
                      <span class="mz-btn-label">Gửi phản hồi</span></button>
                    <input type="hidden" name="comment_post_ID" value="6266" id="comment_post_ID">
                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                  </div>
                </form>
              </div><!-- #respond -->
            </div> <!-- .mz-modal-close-button-row -->
          </div>
        </div>
      </div>

    </section> <!-- .home-feedback-section -->

    <footer id="footer-section" class="footer-section">
      <div class="mz-container">
        <div class="footer-top-block">
          <div class="footer-info-segment">
            <div class="footer-info-group">
              <div class="footer-info-group-inner">
                <div class="footer-info-title">Mua hộ</div>
                <div class="footer-info-phone">
                  <p>Hotline: <a href="tel:1900545584">1900 545 584</a></p>
                </div>
                <div class="footer-info-mail">
                  <p>Email:<a href="mailto: order@giaonhan247.com"> order@giaonhan247.com </a></p>
                </div>
              </div> <!-- .footer-info-group-inner -->

              <div class="footer-info-group-inner">
                <div class="footer-info-title">Ship hộ</div>
                <div class="footer-info-phone">
                  <p>Hotline: <a href="tel:+84909966247"> 0909 966 247</a> -
                    <a href="tel:+84909766247"> 0909 766 247</a>
                  </p>
                </div>
                <div class="footer-info-mail">
                  <p>Email:<a href="mailto: shipping@giaonhan247.com"> shipping@giaonhan247.com</a></p>
                </div>
              </div> <!-- .footer-info-group-inner -->

              <div class="footer-info-extend-info">
                <p>Gửi hàng quốc tế: <a href="tel:+84909931247"> 0909 931 247</a></p>
                <p>Kho hàng: <a href="tel:+84902400050"> 0902 400 050</a></p>
                <span class="footer-phone-cover">
                    <p class="footer-phone-cover-trigger">Góp ý than phiền <i class="far fa-angle-right"></i></p>
                    <a class="footer-phone-cover-target" href="tel:+84909551949"> 0909 551 949</a>
                </span>
              </div> <!-- .footer-info-extend-info -->
            </div> <!-- .footer-info-group -->
          </div> <!-- .footer-info-segment -->

          <div class="footer-menu-segment-outer">
            <div id="menu-footer-1" class="footer-menu-segment">
              <div class="footer-menu-col">
                <div class="footer-title" href="#">Giaonhan247.com</div>
                <div class="footer-menu-wrapper">
                  <a class="footer-menu-item" href="/lien-he/">Liên hệ</a><a class="footer-menu-item" href="/bai-viet/giaonhan247-com-tuyen-dung/">Tuyển dụng</a><a class="footer-menu-item" href="/bai-viet/giai-quyet-khieu-nai/">Giải quyết khiếu nại</a><a class="footer-menu-item" href="/bai-viet/chinh-sach-bao-mat-thong-tin/">Chính sách bảo mật</a><a class="footer-menu-item" href="/dai-ly/">Đại lý</a>
                </div>
              </div>
              <div class="footer-menu-col">
                <div class="footer-title" href="#">Mua hộ</div>
                <div class="footer-menu-wrapper">
                  <a class="footer-menu-item" href="/lien-he-dat-hang/">Cách thức đặt hàng</a><a class="footer-menu-item" href="/huong-dan-mua-hang">Hướng dẫn mua hàng</a><a class="footer-menu-item" href="/bai-viet/chinh-sach-mua-hang-my/">Chính sách mua hàng</a><a class="footer-menu-item" href="/bai-viet/quy-dinh-doi-tra-hang-hoa/">Quy định đổi trả hàng hoá</a><a class="footer-menu-item" href="/bai-viet/thoi-gian-van-chuyen-hang-tu-my-ve-viet-nam/">Thời gian được nhận hàng</a>
                </div>
              </div>
              <div class="footer-menu-col">
                <div class="footer-title" href="#">Ship hộ</div>
                <div class="footer-menu-wrapper">
                  <a class="footer-menu-item" href="/bai-viet/chinh-sach-ship-hang/">Chính sách ship hàng</a><a class="footer-menu-item" href="/bai-viet/thoi-gian-van-chuyen-hang-tu-my-ve-viet-nam/">Thời gian vận chuyển</a><a class="footer-menu-item" href="/cau-hoi-thuong-gap/">Mã khách hàng</a><a class="footer-menu-item" href="/dich-vu/dich-vu-thong-quan-hang-hoa-thu-tuc-hai-quan/">Thủ tục hải quan</a>
                </div>
              </div>
              <div class="footer-menu-col">
                <div class="footer-title" href="#">FAQs</div>
                <div class="footer-menu-wrapper">
                  <a class="footer-menu-item" href="/bai-viet/cach-dau-gia-tren-ebay/">Đấu giá Ebay</a><a class="footer-menu-item" href="/bai-viet/tracking-number-la-gi/">Tracking number là gì?</a><a class="footer-menu-item" href="/cau-hoi-thuong-gap/">Tài khoản Paypal</a><a class="footer-menu-item" href="/bai-viet/tin-tuc-mua-hang-my-ship-hang-my-chuyen-hang-my/chinh-sach-bao-hiem-2016.html">Bảo hiểm và bảo hành</a>
                </div>
              </div>
            </div>
          </div> <!-- .footer-menu-segment-outer -->
        </div> <!-- .footer-top-block -->
      </div>
    </footer> <!-- .footer-section -->
  </body>
</html>
