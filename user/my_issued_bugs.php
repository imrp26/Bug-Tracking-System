<?php
    session_start();
    if(!isset($_SESSION["email"]))
    {
        ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
        <?php
    }
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>User Profile</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Issued Bugs</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <th>
                                        User ID
                                    </th>
                                    <th>
                                        Project ID
                                    </th>
                                    <th>
                                        Bug Issue Date
                                    </th>
                                    <?php
                                        $res=mysqli_query($link,"select * from issue_bugs where email='$_SESSION[email]'");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            //echo "Hello, World !!";
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row["user_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["project_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["bug_reporting_date"];
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
    include "footer.php";
?>