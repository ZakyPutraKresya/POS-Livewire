<!-- ===============================================-->
<!--    Favicons-->
<!-- ===============================================-->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('template')}}/assets/img/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('template')}}/assets/img/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template')}}/assets/img/favicons/favicon-16x16.png">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('template')}}/assets/img/favicons/favicon.ico">
<link rel="manifest" href="{{ asset('template')}}/assets/img/favicons/manifest.json">
<meta name="msapplication-TileImage" content="{{ asset('template')}}/assets/img/favicons/mstile-150x150.png">
<meta name="theme-color" content="#ffffff">
<script src="{{ asset('template')}}/assets/js/config.js"></script>
<script src="{{ asset('template')}}/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
<link href="{{ asset('template')}}/vendors/choices/choices.min.css" rel="stylesheet" />
<script src="{{ asset('template')}}/vendors/choices/choices.min.js"></script>
<link href="{{ asset('template')}}/vendors/prism/prism-okaidia.css" rel="stylesheet">


<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">
<link href="{{ asset('template')}}/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
<link href="{{ asset('template')}}/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
<link href="{{ asset('template')}}/assets/css/theme.min.css" rel="stylesheet" id="style-default">
<link href="{{ asset('template')}}/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
<link href="{{ asset('template')}}/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
<script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
    }
</script>
<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('template')}}/vendors/popper/popper.min.js"></script>
<script src="{{ asset('template')}}/vendors/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('template')}}/vendors/anchorjs/anchor.min.js"></script>
<script src="{{ asset('template')}}/vendors/is/is.min.js"></script>
<script src="{{ asset('template')}}/vendors/prism/prism.js"></script>
<script src="{{ asset('template')}}/vendors/echarts/echarts.min.js"></script>
<script src="{{ asset('template')}}/vendors/fontawesome/all.min.js"></script>
<script src="{{ asset('template')}}/vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('template')}}/vendors/list.js/list.min.js"></script>
<script src="{{ asset('template')}}/assets/js/theme.js"></script>

