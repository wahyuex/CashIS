<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
<script>
    // Data dari JavaScript
const data = ["Nilai 1", "Nilai 2", "Nilai 3"];

// Mengisi value dari JavaScript ke dalam elemen <td> di HTML
const tdElements = document.querySelectorAll("td");

data.forEach((value, index) => {
    tdElements[index].textContent = value;
});

</script>
</body>
</html>