<?php


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include_once "../../class/DataInterface.php";
    include_once "../../class/Database.php";
    include_once "../../class/Student.php";
    include_once "../../class/StudentManager.php";
    $keyword = $_GET['keyword'];

    $pathFile = "../../data.json";
    $studentManger = new \Controller\StudentManager($pathFile);
    $students = $studentManger->search($keyword);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-12 page-title mb-2">
            <h1>Users</h1>
            <div class="row">
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-outline-primary"><a href="../add.php">Create</a></button>
                </div>
                <div class="col-12 col-md-8">
                    <form class="form-inline my-2 my-lg-0" method="get" action="../students/search.php">
                        <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-12">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Group</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($students) > 0): ?>
                    <?php foreach ($students as $key => $student):?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $student->name ?></td>
                            <td><?php echo $student->age ?></td>
                            <td><?php echo $student->address ?></td>
                            <td><a href="../groups/list-student.php?group-name=<?php echo $student->group ?>"><?php echo $student->group ?></a></td>
                            <td><a href="../delete.php?index=<?php echo $key ?>" onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a></td>
                            <td><a href="../edit.php?index=<?php echo $key ?>" class="btn btn-primary">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                        <tr>
                            <td colspan="7">
                                <p class="text-center">Khong co du lieu</p>
                            </td>
                        </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
