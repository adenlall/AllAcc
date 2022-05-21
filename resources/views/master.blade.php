<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    @routes

    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body class="g-sidenav-show bg-main">
    @inertia
    <!--   Core JS Files   -->
    <script src="/js/core/popper.min.js"></script>
    {{-- <script src="/js/core/bootstrap.min.js"></script> --}}
    <script src="/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/js/plugins/smooth-scrollbar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/argon-dashboard.min.js?v=2.0.0"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
  </body>
</html>
