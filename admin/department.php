<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add/Modify Department</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Department</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="adddepartmentform.php">
                                    <div class="row">
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <div class="col-md-15">
                                                    <div class="form-group">
                                                        <label>Stream Type</label>
                                                        <select class="form-control" name="StreamType" required>
                                                            <option selected="" disabled="">Select Stream</option>
                                                            <option value="SCIENCE">Science</option>
                                                            <option value="ARTS">Arts</option>
                                                            <option value="COMMERCE">Commerce</option>
                                                            <option value="VOCATIONAL">Vocational</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-15">
                                                    <div class="form-group">
                                                        <label>Course Type</label>
                                                        <select class="form-control" name="CourseType" required>
                                                            <option selected="" disabled="">Select Course Type</option>
                                                            <option value="UG">UG</option>
                                                            <option value="PG">PG</option>
                                                        </select>
                                                    </div>
                                                </div>-->

                                                <!---// TODO CODE MODIFICATIONS : CHECK AFTER EVERYTHING DONE-->
                                                <!-- <?php
                                                /*
                                                include 'connection.php';

                                                $sql = "Select * from department" ;
                                                $ret = pg_query($db, $sql);
                                                if (!$ret) {
                                                    echo pg_last_error($db);
                                                    exit;
                                                }
                                                $count = pg_num_rows($ret);
                                                $count++;
                                                    echo "<label>Department Number</label>
                                                <input type=\"number\" class=\"form-control\" name=\"DeptNo\" value=\"$count\" placeholder=\"\" min=\"1\" required>";*/ ?>
                                               -->
                                                <label>Department Number</label>
                                                <input type="number" class="form-control" name="DeptNo" value=" " placeholder="" min="1" required>

                                                <label>Department Title</label>
                                                <input type="text" class="form-control" name="DeptName" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_dept">Add Department</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            

            
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive text-center nowrap">
                                <thead>
                                    <tr>
                                        <th>Department No.</th>
                                         <th>Department Name</th>
                                        <th>Stream</th>
                                         <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                    include 'connection.php';

                                                    $sql = "Select * from department" ;
                                                        $ret = pg_query($db, $sql);
                                                    if (!$ret) {
                                                        echo pg_last_error($db);
                                                            exit;
                                                            }

                                                    while ($row = pg_fetch_row($ret)) {
                                                        echo "<tr><th scope=\"row\">{$row[0]}</th>
                                                        <td>{$row[1]}</td><td>{$row[2]}</td>"; ?>

                                                       
                                                        <td><a href="deletedepartment.php?dept_id=<?php echo $row[0]?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>

                                                  <?php  } ?>
                                    
                              
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <?php
    include "includes/footer.php";
    ?>