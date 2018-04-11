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
                        <h3>Display Bugs</h3>
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
                                <h2>All the information related to the bugs !!</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            	<form name="form1" action="" method="post">
                            		<input type="text" name="t1" class="form-control" placeholder="Enter Bug ID.">
                            		<input type="submit" name="submit1" value="Search for a Bug" class="btn btn-default">
                            	</form>
                                <?php
                                	if(isset($_POST["submit1"]))
                                	{
                                		$res=mysqli_query($link,"select * from add_bugs where bug_id like('%$_POST[t1]%')");
                                		echo "<table class='table table-bordered'>";
                                		echo "<tr>";
                                		echo "<th>"; echo "Bug ID"; echo "</th>";                             		
                                		echo "<th>"; echo "Project ID"; echo "</th>";
                                		echo "<th>"; echo "Bug Reporting Time"; echo "</th>";
                                		echo "<th>"; echo "Bug Severity"; echo "</th>";
                                		echo "<th>"; echo "Bug Status"; echo "</th>";
                                		echo "</tr>";
                                		while($row=mysqli_fetch_array($res))
                                		{
                                			echo "<tr>";
                                			echo "<td>"; echo $row["bug_id"]; echo "</td>";
                                			echo "<td>"; echo $row["project_id"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_reporting_time"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_severity"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_status"]; echo "</td>";
                                            echo "<td>";
                                            ?> <a href="delete_bugs.php?id=<?php echo $row['bug_id'];?>"> Delete Bug</a> <?php
                                            echo "<td>";
                                			echo "</tr>";
                                		}
                                		echo "</table>";
                                	}
                                	else
                                	{
                                		$res=mysqli_query($link,"select * from add_bugs");
                                		echo "<table class='table table-bordered'>";
                                		echo "<tr>";
                                		echo "<th>"; echo "Bug ID"; echo "</th>";
                                		echo "<th>"; echo "Project ID"; echo "</th>";
                                		echo "<th>"; echo "Bug Reporting Time"; echo "</th>";
                                		echo "<th>"; echo "Bug Severity"; echo "</th>";
                                		echo "<th>"; echo "Bug Status"; echo "</th>";
                                        echo "<th>"; echo "Delete the Bug"; echo "</th>";
                                		echo "</tr>";
                                		while($row=mysqli_fetch_array($res))
                                		{
                                			echo "<tr>";
                                			echo "<td>"; echo $row["bug_id"]; echo "</td>";
                                			/*echo "<td>"; ?> <img src="<?php echo $_row["bug_image"]?>" height="100" width="100"> <?php echo "</td>";*/
                                			echo "<td>"; echo $row["project_id"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_reporting_time"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_severity"]; echo "</td>";
                                			echo "<td>"; echo $row["bug_status"]; echo "</td>";
                                            echo "<td>";
                                            ?> <a href="delete_bugs.php?id=<?php echo $row['bug_id'];?>"> Delete Bug</a> <?php
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