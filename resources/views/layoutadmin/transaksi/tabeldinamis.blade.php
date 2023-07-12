<!DOCTYPE html>
<html>

<head>
    <title>Tabel Dinamis</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>Tabel Dinamis</h2>

    <form id="inputForm">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <button type="submit">Tambah Data</button>
    </form>

    <table id="dataTable">
        <tr>
            <th>Nama</th>
            <th>Umur</th>
        </tr>
    </table>

    <script>
        document.getElementById("inputForm").addEventListener("submit", function(e) {
            e.preventDefault();

            var name = document.getElementById("name").value;
            var age = document.getElementById("age").value;

            var table = document.getElementById("dataTable");
            var row = table.insertRow(-1);
            var nameCell = row.insertCell(0);
            var ageCell = row.insertCell(1);
            nameCell.innerHTML = name;
            ageCell.innerHTML = age;

            document.getElementById("name").value = "";
            document.getElementById("age").value = "";

            var nameInput = document.createElement("input");
            nameInput.type = "hidden";
            nameInput.name = "name[]";
            nameInput.value = name;
            document.getElementById("inputForm").appendChild(nameInput);

            var ageInput = document.createElement("input");
            ageInput.type = "hidden";
            ageInput.name = "name[]";
            ageInput.value = name;
            document.getElementById("inputForm").appendChild(ageInput);
        });
    </script>
</body>

</html>
