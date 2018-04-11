<?php
    session_start();
    if(!isset($_SESSION["manager"]))
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
                        <h3>Resolve Bugs</h3>
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
                                <h2>Time to scatter away the resolved bugs...</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="bug_id" class="form-control">
                                                    <?php
                                                        $res=mysqli_query($link,"select user_id from issue_bugs");
                                                        while($row=mysqli_fetch_array($res))
                                                        {
                                                            echo "<option>";
                                                            echo $row["user_id"];
                                                            echo "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" value="search" class="form-control" style="background-color: black; color: white">
                                                </input>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                    if(isset($_POST["submit1"]))
                                    {
                                        $res=mysqli_query($link,"select * from issue_bugs where bug_id='$_POST[bug_id]'");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>"; echo "Bug ID"; echo "</th>";
                                        echo "<th>"; echo "Project ID"; echo "</th>";
                                        echo "<th>"; echo "User ID"; echo "</th>";
                                        echo "<th>"; echo "Email"; echo "</th>";
                                        echo "<th>"; echo "Bug Reporting Date"; echo "</th>";
                                        echo "<th>"; echo "Resolve the Bug"; echo "</th>";
                                        echo "</tr>";
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row["bug_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["project_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["user_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["email"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row["bug_reporting_date"];
                                                echo "</td>";
                                                echo "<td>";
                                                    ?> <a href="resolve.php?id=<?php echo $row['id']?>">Resolve the Bug</a> <?php
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
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