 <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>JAGUI TOUR</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href=""><strong>JAGUI TOUR</strong></a>
        </div>
        <a href="index.php" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!--Mis importaciones-->
  <script src="../template/js/popper.min.js"></script>
  <script src="../template/js/bootstrap.min.js"></script>
  <script src="../template/js/bootstrap-confirmation.js"></script>
  <script src="../template/js/jquery.blockUI.js"></script>
  <script src="../template/js/jquery.js"></script>
  <script src="../template/js/scripts.js"></script>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../template/lib/jquery/jquery.min.js"></script>

  <script src="../template/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../template/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../template/lib/jquery.scrollTo.min.js"></script>
  <script src="../template/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../template/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../template/lib/common-scripts.js"></script>
  <script type="text/javascript" src="../template/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../template/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../template/lib/sparkline-chart.js"></script>
  <script src="../template/lib/zabuto_calendar.js"></script>
  <!--Script for edit and img-->
  <script src="../template/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../template/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../template/lib/advanced-form-components.js"></script>
  <script type="../application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
    <script>
    $('[data-toggle=confirmation]').confirmation({ rootSelector:'[data-toggle=confirmation]', container:'body'});
    </script>
</body>

</html>