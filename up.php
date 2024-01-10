<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload CSV File</title>
<style>
    body { font-family: Arial, sans-serif; }
    form { margin: 50px auto; width: 300px; }
</style>

<script>
function validateFile() {
     var fileInput = document.getElementById('fileToUpload');
     var filePath = fileInput.value;
     var allowedExtensions = /(\.csv)$/i;

     if (!allowedExtensions.exec(filePath)) {
         alert('Please upload a valid CSV file.');
         fileInput.value = '';
         return false;
     } else {
         return true;
     }
 }
</script>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select CSV file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
    <input type="submit" value="Upload CSV" name="submit">
</form>

</body>
</html>
