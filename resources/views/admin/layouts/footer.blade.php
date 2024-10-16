 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @php
    $getSettingFooter = App\Models\SystemSettingModel::getSingle();
  @endphp
 
 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}} <a href="#">{{ $getSettingFooter->website_name}}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>E</b>-Com
    </div>
  </footer>