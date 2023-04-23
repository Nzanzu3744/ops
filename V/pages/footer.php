</div>
  </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Vesion</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Oui Pour la Santé</a>.</strong> Tout droit reservés:
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/print.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
  })
</script>
<!-- Controle ya Note ile textearea yetu -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>

</body>
</html>



<?php
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>