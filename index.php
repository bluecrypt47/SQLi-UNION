<?php
require("config.php");
// $params = [];
$sql = "SELECT * 
    FROM `admin_func` 
    WHERE TRUE";

// search
if (isset($_GET['ok'])) {
    $params['title'] = htmlspecialchars($_GET['title'], ENT_QUOTES);
    $title = $_GET['title'];
    // $params['cve_id'] = htmlspecialchars($_GET['cveid'], ENT_QUOTES);
    // $params['type'] = htmlspecialchars($_GET['type1'], ENT_QUOTES);
    // $params['platform'] = htmlspecialchars($_GET['pf'], ENT_QUOTES);
    $sql .= " AND `title` LIKE '%$title%'";
    // if (!empty($params['title'])) {
    //     $sql .= " AND `title` LIKE '%{$params['title']}%'";
    // }
    // if (!empty($params['cve_id'])) {
    //     $sql .= " AND `cve_id` LIKE '%{$params['cve_id']}%'";
    // }
    // if (!empty($params['type'])) {
    //     $sql .= " AND `type` LIKE '%{$params['type']}%'";
    // }
    // if (!empty($params['platform'])) {
    //     $sql .= " AND `platform` LIKE '%{$params['platform']}%'";
    // }

}

// $result = $conn->query($sql);

// get total rows
$result2 = $conn->query("SELECT count(id) as total from admin_func");
$row = $result2->fetch_assoc();
$total_records = $row['total'];

// pagination
$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 100;
$total_pages = ceil($total_records / $limit);
if ($c_page > $total_pages) {
    $c_page = $total_pages;
} elseif ($c_page < 1) {
    $c_page = 1;
}
$start = ($c_page - 1) * $limit;

// get result
// $sql .= " LIMIT $start, $limit";
// $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="js/jquery.js" />
<!------ Include the above in your HEAD tag ---------->

<div class="page-wrapper chiller-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div id="toggle-sidebar">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="sidebar-brand">
                <a href="index.php">Exploit Knowledge-Based</a>
            </div>
            <div class="sidebar-header">
                <br>
                <br>
                <div class="user-info">
                    <span class="user-name">
                        <a href="create.php">Payload</a>
                        <br>
                        <br>
                        <span class="Payload">
                            <a href="#">Database</a></span>
                    </span>
                    </span>
                </div>
            </div>
            <!-- sidebar-content  -->
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="form-group col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a>Dashboard</a>

                        </div>
                    </div>

                </div>
            </div> -->
            <!-- <br> -->

            <!-- <hr> -->
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Exploit Database Advanced Search</b>
                            <br>

                        </div>

                    </div>
                    <div id="search-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <form action="index.php" method="get">
                                        <input type="text" name="title" class="form-control" placeholder="Title" style="width: 900px;" />
                                </div>
                            </div>
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="cveid" class="form-control" placeholder="CVE" />
                                </div>
                            </div> -->
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="type1">
                                        <option value="">Type</option>
                                        <option value="dos">Dos</option>
                                        <option value="local">Local</option>
                                        <option value="remote">Remote</option>
                                        <option value="webapp">WebApps</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="pf">
                                        <option value="">Platform</option>
                                        <option value="asp">ASP</option>
                                        <option value="aspx">ASPX</option>
                                        <option value="php">PHP</option>
                                        <option value="xml">XML</option>
                                        <option value="androi">Androi</option>
                                        <option value="window">Window</option>
                                        <option value="macos">MacOS</option>
                                        <option value="linux">Linux</option>
                                        <option value="multi">Multiple</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Port</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Exploit Content" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Vendor" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Tag</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-block" type="submit" name="ok" value="Search">Search</button></form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Verified</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Metasploit</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-block">Reset all</button>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="card">
                        <div class="card-header">

                            <a>CVEs List</a>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>CVE-ID</th>
                                            <th>Vendor</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Platform</th>
                                            <th>Impact</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr>
                                                <th scope="row"><?php echo $row["id"]; ?></th>
                                                <td><?= $row["vendor"]; ?></td>
                                                <td><?= $row["title"]; ?></td>
                                                <td><?= $row["type"]; ?></td>
                                                <td><?= $row["platform"]; ?></td>
                                                <td>NULL</td>
                                                <td>
                                                    <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn"><i class="fa fa-pencil"></i></button></a>
                                                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return  confirm('Do You Want To Delete?')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                    <a href="export.php?id=<?= $row['id'] ?>"><button class="btn btn-success"><i class="fa fa-file-text-o"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="pagination">
                                <?php
                                if ($c_page > 1 && $total_pages > 1) {
                                    echo '<a href="index.php?page=' . ($c_page - 1) . '">Prev</a>&emsp;';
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $c_page) {
                                        echo '<span>' . $i . ' </span>&emsp;';
                                    } else {
                                        echo '<a href="index.php?page=' . $i . '">' . $i . '</a>&emsp;';
                                    }
                                }

                                if ($c_page < $total_pages && $total_pages > 1) {
                                    echo '<a href="index.php?page=' . ($c_page + 1) . '">Next</a>&emsp;';
                                }
                                ?>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- page-content" -->
</div>