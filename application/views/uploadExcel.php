<!DOCTYPE html>
<html>
<head>
	<title>Upload Excel</title>
</head>
<body>

<form name="myForm" id="myForm" onSubmit="return validateForm()" action="<?=base_url()?>JajalUpload/uploadExcel" method="POST" enctype="multipart/form-data">
	<div class="flex flex-vcenter">
		<input type="file" id="dataAlumni" name="dataAlumni" required />
		<input type="submit" name="submit" value="Import" class="btn btn-tambah" /><br/>
	</div>
	<label><input type="checkbox" name="drop" value="1" style="margin-top: 15px;" /> <u>Kosongkan tabel sql terlebih dahulu.</u></label>
</form>

</body>
<script type="text/javascript">
	//validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
</html>