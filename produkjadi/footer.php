<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	//tabel
	$(document).ready(function(){
		$("#me").DataTable();
	});
</script>

<script type="text/javascript">
	 $(function(){
	  $(".datepicker").datepicker({
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	      todayHighlight: true,
	  });
	 });
</script>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#tgl').datepicker().datepicker('setDate', 'today');
	});​
</script>

<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
 </script>

<script type="text/javascript">
	<?php  
	echo $a;   
	echo $b; 
	echo $c;   
	echo $e; ?>  
	function changeValue(id){
	document.getElementById('nm_produk').value = nm_produk[id].nm_produk;  
	document.getElementById('jenis').value = jenis[id].jenis;    
	document.getElementById('nm_produk2').value = nm_produk2[id].nm_produk2;  
	document.getElementById('jenis2').value = jenis2[id].jenis2;  
	}; 
</script>

</body>
</html>