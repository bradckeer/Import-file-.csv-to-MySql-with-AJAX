<div  role="form" onkeypress="importFile(event)">
  <div class="form-group">
    <input type="file" id="uploadeFile" multiple="" name="uploadeFile">
    <div class="input-group">
      <input type="text" readonly="" class="form-control" placeholder="Importar tabla a MySql / Has Clic...">
		  <span class="input-group-btn input-group-sm">
		  <button type="button" class="btn btn-fab btn-fab-mini">
        <i class="zmdi zmdi-attachment-alt"></i>
		  </button>
		  </span>
    </div>
	<div class="_AJAX_FILE_"></div>
  </div>
	<p class="text-center">
  	<button type="button" class="btn btn-info btn-raised btn-sm" onclick="goSubirArvhivo()" title="Importar tabla a MySql"><i class="zmdi zmdi-upload zmdi-hc-5x"></i></button>
	</p>
<script src="script.js"></script>
</div>
