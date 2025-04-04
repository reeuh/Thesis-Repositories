<?php

require_once '../class/database.php';
require_once '../class/student.class.php';

session_start();
/*
    if user is not login then redirect to login page,
    this is to prevent users from accessing pages that requires
    authentication such as the dashboard
*/
if (!isset($_SESSION['logged-in'])){
    header('location: ../login/login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- start: Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="icon" href="../img/rlogo.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">
    <!-- end: CSS -->
    <title>Thesis Repository - Blank Page</title>
  </head>

  <body>
    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
      <div class="d-flex align-items-center p-3">
        <a
          href="#"
          class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4"
          >Thesis Repository</a
        >
        <i
          class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"
        ></i>
      </div>
      <ul class="sidebar-menu p-3 m-0 mb-0">
        <li class="sidebar-menu-item">
          <a href="dashboard.php">
            <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
            Dashboard
          </a>
        </li>

        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Thesis</li>

        <li class="sidebar-menu-item">
          <a href="archives.php">
            <i class="ri-archive-drawer-line sidebar-menu-item-icon"></i>
            Archives
          </a>
        </li>
        <li class="sidebar-menu-item ">
          <a href="implementation_titles.php">
            <i class="ri-archive-drawer-line sidebar-menu-item-icon"></i>
            Implementation Titles
          </a>
        </li>
        <li class="sidebar-menu-item has-dropdown">
          <a href="thesis_status.php">
              <i class="ri-bar-chart-box-line sidebar-menu-item-icon"></i>
              Thesis Status
              <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
          </a>
          <ul class="sidebar-dropdown-menu">
              <li class="sidebar-dropdown-menu-item">
                  <a href="accepted.php">
                      Accepted Titles
                  </a>
              </li>
              <li class="sidebar-dropdown-menu-item">
                  <a href="rejected.php">
                      Rejected Titles
                  </a>
              </li>
          </ul>
      </li>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Manage</li>

        <li class="sidebar-menu-item active">
          <a href="manage_students.php">
            <i class="ri-user-line sidebar-menu-item-icon"></i>
            Manage Student
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_groups.php">
            <i class="ri-group-2-line sidebar-menu-item-icon"></i>
            Manage Groups
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_faculty.php">
            <i class="ri-group-line sidebar-menu-item-icon"></i>
            Manage Faculty
          </a>
        </li>
        
        <li class="sidebar-menu-item">
          <a href="manage_schedules.php">
            <i class="ri-calendar-2-line sidebar-menu-item-icon"></i>
            Manage Events
          </a>
        </li>
      </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
      <div class="p-2">
        <!-- start: Navbar -->
        <nav class="px-3 py-2 bg-white rounded shadow-sm">
          <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
          <h5 class="fw-bold mb-0 me-auto">Students</h5>
          <div class="dropdown me-3 d-none d-sm-block">
            <div
              class="cursor-pointer dropdown-toggle navbar-link"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="ri-notification-line"></i>
            </div>
            <div class="dropdown-menu fx-dropdown-menu">
              <h5 class="p-3 bg-indigo text-light">Notification</h5>
              <div class="list-group list-group-flush">
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
              </div>
            </div>
          </div>
          <div class="dropdown">
            <div
              class="d-flex align-items-center cursor-pointer dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="me-2 d-none d-sm-block"><?php echo $_SESSION['fullname'] ?></span>
              <img
                class="navbar-profile-image"
                src="../img/u-icon.png" alt="Image"
              />
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="profile.php"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="settings.php"><i class="ri-settings-3-line me-2"></i>Settings</a></li>
              <hr class="w-100">
              <li><a class="dropdown-item" href="../login/logout.php"><i class="ri-logout-box-line me-2"></i>Logout</a></li>
            </ul>
          </div>
        </nav>
        <!-- end: Navbar -->

        <!-- start: Content -->
        <div class="py-4">
          <!-- start: content -->
          <div class="container padding-bottom">
                  <div class="head-cont d-flex justify-content-end pb-2">
                      <a class="btn btn-primary add-button" href="add_student.php">Add new Student</a>
                  </div>

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th class="action">Action</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year & Section</th>
                            <th>Semester</th>
                            <th>School Year</th>
                            <th>Adviser</th>
                            <th>Group #</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                    require_once '../class/student.class.php';

                                    $student = new Student();
                                    //We will now fetch all the records in the array using loop
                                    //use as a counter, not required but suggested for the table
                                    $i = 1;
                                    //loop for each record found in the array
                                    foreach ($student->show() as $value){ //start of loop
                                ?>
                                    <tr>
                                        <td>
                                            <div class="actions">
                                                <a class="action-edit" href="edit_student.php?id=<?php echo $value['id'] ?>"><i class="ri-edit-line"></i></a>
                                                <a class="action-delete" data-id="<?php echo $value['id']; ?>" href="#"><i class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $value['lastname'] . ', ' . $value['firstname'] . ' ' . $value['middle_name'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['course'] ?></td>
                                        <td><?php echo $value['year_and_section'] ?></td>
                                        <td><?php echo $value['sem'] ?></td>
                                        <td><?php echo $value['school_year'] ?></td>
                                        <td><?php echo $value['your_adviser'] ?></td>
                                        <td><?php foreach($student->show_group_info($value["your_group"]) as $groupNum)
                                                    echo $groupNum["group_number"]
                                        ?></td>
                                        
                                    </tr>
                                <?php
                                    $i++;
                                //end of loop
                                }
                                ?>
                        </tbody>
                    </table>
          </div>
                
        </div>

        <!--Modal 1-->


            <!--Modal 2-->
    </div>

          <!-- end: content -->
          <!-- start: Graph -->

          <!-- end: Graph -->
        </div>
        <!-- end: Content -->
      </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../assets/js/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script>
      $('.action-delete').click(function(e) {
        e.preventDefault();
        
        // Get the ID of the item to delete
        var id = $(this).data('id');
        
        // Show a SweetAlert2 confirmation dialog

        Swal.fire({
        title: 'Are you sure?',
        text: "Once the student record is deleted, it will be permanently lost and cannot be restored.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            // User clicked the "Yes, delete it!" button
            // Send the ID to the server for deletion 
            $.ajax({
              url: 'delete_student.php',
              method: 'POST',
              data: { 'id': id },
              success: function(response) {
                // Handle success
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ).then(function() {
                  // Reload the page after the SweetAlert2 is closed
                  location.reload();
              });
          },

            });
          }
        });
      });
  </script>
    <!-- end: JS -->
  </body>
</html>
