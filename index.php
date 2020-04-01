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
          'introPanelTitle' => 'Giá bạn thấy bằng giá bạn trả',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-user-shield"></i>',
          'introPanelTitle' => 'Yên tâm mua sắm, giải tỏa rủi ro',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-box-check"></i>',
          'introPanelTitle' => 'Sản phẩm chất lượng, rõ nguồn gốc',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-map-marked-alt"></i>',
          'introPanelTitle' => 'Liên tục cập nhật hành trình',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-shield-check"></i>',
          'introPanelTitle' => 'Sản phẩm nhập khẩu chính ngạch',
        ],
        [
          'introPanelIcon'  => '<i class="intro-panel-icon fal fa-globe-stand"></i>',
          'introPanelTitle' => 'Miễn phí vận chuyển toàn cầu',
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
                  <img src="<?php echo $staticImgUrl; ?>/logo-dark-mobile.png" alt="" class="head-segment-header-logo-img">
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
            <a href="/us/amazon-store" class="foot-segment-country-item">
              <i class="icon-country-us --size-20"></i>
              <span class="foot-segment-country-text">Từ Mỹ</span>
            </a>

            <a href="/jp/amazon-store" class="foot-segment-country-item">
              <i class="icon-country-jp --size-20"></i>
              <span class="foot-segment-country-text">Từ Nhật</span>
            </a>

            <a href="/de/amazon-store" class="foot-segment-country-item">
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
          <a href="#fado-landing-footer-block" class="scroll-pagination-dot-item"></a>
        </div> <!-- .scroll-pagination-dot-list -->
      </div>
    </header> <!-- .fado-landing-header-block -->

    <?php
      $arrBenefitList = [
        [
          'title'          => 'Mua sắm hơn 4 tỷ sản phẩm chất lượng',
          'content'        => 'Thoải mái mua sắm xuyên biên giới hơn 4 tỷ sản phẩm chất lượng từ Amazon Mỹ, Đức, Nhật Bản ở mọi lĩnh vực công nghệ, gia dụng, thời trang, sức khoẻ đến đồ của bé… mọi lúc, mọi nơi.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-online-shopping.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Liên tục cập nhật khuyến mãi trên thế giới',
          'content'        => 'Các sự kiện khuyến mãi lớn nhất thế giới như Black Friday, Cyber Monday... được cập nhật song song ngay trên Fado. Ngoài ra, hàng ngày, Fado cũng có hàng nghìn deal giảm giá sâu ở mọi ngành hàng.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-saleoff-world.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Giá trọn gói, không phát sinh',
          'content'        => 'Giá bạn thấy trên sản phẩm ở Fado là giá cuối cùng về bạn. Bạn không cần lo lắng phải trả thêm bất kỳ khoản phí nào.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-shopping-bag.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Biểu đồ theo dõi giá thông minh, so sánh giá toàn cầu',
          'content'        => 'Biểu đồ lịch sử giá hiển thị ngay trên từng sản phẩm giúp bạn đánh giá độ hot của khuyến mãi. Còn có chức năng thay bạn canh sale, báo cho bạn mua đúng thời điểm giá giảm như kỳ vọng.<br/>Hệ thống so sánh giá ưu việt giữa các nước, giúp người dùng lựa chọn được thị trường cung cấp sản phẩm có mức giá tốt nhất . ',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-price-chart.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Tính năng đánh giá, phản hồi sản phẩm',
          'content'        => 'Hệ thống phân tích dữ liệu đánh giá của người mua trước về sản phẩm, sau đó đưa ra khuyến nghị mua sắm cho khách hàng .',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-smart-feedback.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Hiển thị thời gian giao hàng trước khi mua - Cập nhật hành trình, giao hàng đúng thời gian',
          'content'        => 'Hệ thống dự đoán tự động thông minh thông báo thời gian dự kiến giao hàng chính xác nhất đến từng sản phẩm trước khi đặt hàng. Sau khi đặt hàng bạn sẽ được cập nhật liên tục hành trình đơn hàng.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-estimate.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Cung cấp Invoice từ người bán, hóa đơn VAT cho doanh nghiệp',
          'content'        => ' Hỗ trợ cá nhân/doanh nghiệp Việt giao dịch nhập khẩu trực tiếp với người bán nước ngoài, có hóa đơn VAT cho doanh nghiệp.<br/>Sản phẩm được mua qua Fado đều được người bán cung cấp đầy đủ hóa đơn chứng từ, đảm bảo giao dịch minh bạch, tạo sự an tâm cho người mua sắm.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-bill.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đảm bảo giao dịch. Hỗ trợ đổi trả dễ dàng.',
          'content'        => 'Sàn Fado đảm bảo giao dịch, hỗ trợ khiếu nại với người bán, đổi trả xuyên biên giới dễ dàng, bảo vệ người mua.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-safe-trading.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Các ưu đãi đặc biệt theo cấp thành viên',
          'content'        => 'Fado có chính sách chiết khấu đặc biệt riêng cho từng cấp thành viên, ngoài ra có nhiều ưu đãi đặc biệt theo từng cấp: silver, gold, platinum khi trở thành thành viên thân thiết của Fado.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-member-level.svg',
          'is-none-border' => false,
        ],
        [
          'title'          => 'Đội ngũ tư vấn am hiểu giao dịch xuyên biên giới, tận tâm',
          'content'        => 'Đội ngũ Fado sẽ cung cấp những thông tin chính xác, những tư vấn tối ưu giúp quý khách có được sự lựa chọn mua sắm thông minh.',
          'imageUrl'       => $staticImgUrl . '/svg/intro-block/icon-customer-support.svg',
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
              10 ĐIỀU CHỈ CÓ Ở SÀN<br class="is-break"/> THƯƠNG MẠI<br class="is-break"/> XUYÊN BIÊN GIỚI FADO
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
              <div class="video-segment xl-screen-video wow fadeInUp" style="visibility: visible;">
                <a href="https://www.youtube.com/watch?v=Kn6lso-4vRs" class="video-segment-inner" data-fancybox>
                  <img src="<?php echo $staticImgUrl ?>/video-bg.png" alt="" class="video-img">
                  <div class="video-play-btn-outer">
                    <button class="video-play-btn"></button>
                  </div>
                </a>
              </div>
            </div>
            <!-- .head-segment-top-benefit-wrap -->
            <div id="video-box" class="video-box"></div>
            <div class="head-segment-top-btn">
              <a href="" class="btn-start-buy">
                <span class="btn-start-character"></span>
                Bắt đầu mua sắm
              </a>
            </div>
            <!-- .head-segment-top-btn -->
          </div>
          <!-- .head-segment-top -->
        </div>
        <!-- .head-segment-top-box -->
        <div class="head-segment-bot-box">
          <div class="video-segment xs-screen-video">
            <a href="https://www.youtube.com/watch?v=Kn6lso-4vRs" class="video-segment-inner" data-fancybox>
              <img src="<?php echo $staticImgUrl ?>/video-bg.png" alt="" class="video-img">
              <div class="video-play-btn-outer">
                <button class="video-play-btn"></button>
              </div>
            </a>
          </div>
        </div>
        <!-- .head-segment-bot-box -->
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
