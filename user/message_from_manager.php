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
    mysqli_query($link, "update messages set read_by_user = 'YES' where dst_user_name = '$_SESSION[email]' ");
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>The Boss is always right !!</h3>
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
                                <h2>Messages from the Manager</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class = "table table-bordered">
                                    <tr>
                                        <th>Manager ID</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                    </tr>
                                    <?php
                                        $res = mysqli_query($link, "select * from messages where dst_user_name = '$_SESSION[email]' order by id desc");
                                        while($row = mysqli_fetch_array($res))
                                        {
                                            echo "<tr>";
                                            echo "<td>"; echo $row["src_user_name"]; echo "</td>";
                                            echo "<td>"; echo $row["title"]; echo "</td>";
                                            echo "<td>"; echo $row["message"]; echo "</td>";
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