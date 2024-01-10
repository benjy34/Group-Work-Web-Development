
<?php

$moduleName = "Web Development and Hosting";
$moduleCode = "ITT 06112";


$students = [
    ["Name", "Registration Number", "Class", "Marks"],
    ["Henry Kisila", "12345", "A", "85"],
      ["Allen Alfred", "67890", "B", "78"],
    ["Bright Michael", "11223", "A", "92"],
    ["Mishael Alpha", "44556", "C", "65"]
];

$file = fopen('module_details.csv', 'w');


fputcsv($file, [$moduleName]);
fputcsv($file, [$moduleCode]);


foreach ($students as $student) {
    fputcsv($file, $student);
}


fclose($file);

echo "CSV file has been created successfully!";
?>

)
 ?>
