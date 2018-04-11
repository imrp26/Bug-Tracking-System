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
                        <h3></h3>
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
                                <h2>Add Bug Information</h2>

                                <div class="clearfix"></div> 
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Project ID" name="project_id" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Bug Reporting Time" name="bug_reporting_time" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Bug Severity" name="bug_severity" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Bug Status" name="bug_status" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" class="btn btn-default submit" value="Insert the bug's details." style="background-color: black; color: white">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
    if(isset($_POST["submit1"]))
    {
        //$tm=md5(time());
        //$fnm=$_FILES["f1"]["name"];
        //$dst="./images/".$tm.$fnm;
        //$dst1="images/".$tm.$fnm;
        //move_uploaded_file($_FILES["f1"]["tmp_names"], dst);
        mysqli_query($link,"insert into add_bugs values('','$_POST[project_id]','$_POST[bug_reporting_time]','$_POST[bug_severity]','$_POST[bug_status]')");
        ?>
        <script type="text/javascript">
            alert("Bug inserted successfully!!!");
        </script>
        <?php
    }
?>

<?php
    include "footer.php";
?>