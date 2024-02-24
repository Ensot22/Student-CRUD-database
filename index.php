<?php
include('connection.php');
// include('queries/get_users.php');

include ('fetch_data.php');

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />

  <title>MDC TechVOC Database</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <h2 class="text-center">Welcome to TechVoc DataBase</h2>
    <p class="datatable design text-center">MDC TECHVOC</p>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal"
            class="btn btn-success btn-sm">Add User</a>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <table id="js-users-data-table" class="table">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>BirthDate</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Qualification</th>
                <th>EmploymentStatus</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      // fetch data from database

      const usersDataTable = $('#js-users-data-table');

      usersDataTable.DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [5]
        },

        ]
      });
    });

    // Add User Action
    $(document).on('submit', '#addUser', function (e) {
      e.preventDefault();

      var name = $('#addNameField').val();
      var age = $('#addAgeField').val();
      var gender = $('#addGenderField').val();
      var birthdate = $('#addBirthdateField').val();
      var email = $('#addEmailField').val();
      var mobile = $('#addMobileField').val();
      var Address = $('#addAddressField').val();
      var qualification = $('#addQualificationField').val();
      var employmentstatus = $('#addEmploymentstatusField').val();
      if (Address != '' && name != '' && age != '' && gender != '' && birthdate != '' && email != '' && mobile != '' && address != '' && qualification != '' && employmentstatus != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            id: id,
            name: name,
            age: age,
            email: email,
            gender: gender,
            mobile: mobile,
            birthdate: birthdate,
            address: address,
            qualification: qualification,
            employmentstatus: employmentstatus
          },
          success: function (data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#js-users-data-table').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    // Update User Action
    $(document).on('submit', '#updateUser', function (e) {
      e.preventDefault();
      var name = $('#addNameField').val();
      var age = $('#addAgeField').val();
      var gender = $('#addGenderField').val();
      var birthdate = $('#addBirthdateField').val();
      var email = $('#addEmailField').val();
      var mobile = $('#addMobileField').val();
      var address = $('#addAddressField').val();
      var qualification = $('#addQualificationField').val();
      var employmentstatus = $('#addEmploymentstatusField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (Address != '' && name != '' && age != '' && gender != '' && birthdate != '' && email != '' && mobile != '' && address != '' && qualification != '' && employmentstatus != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            id: id,
            name: name,
            age: age,
            email: email,
            gender: gender,
            mobile: mobile,
            birthdate: birthdate,
            address: address,
            qualification: qualification,
            employmentstatus: employmentstatus
          },
          success: function (data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#js-users-data-table').DataTable();
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, name, birthdate, age, gender, email, mobile, address, qualification, employmentstatus, button]);
              $('#js-user-modal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    // Edit User Action
    $('#js-users-data-table').on('click', '.editbtn ', function (event) {
      var table = $('#js-users-data-table').DataTable();
      var trid = $(this).closest('tr').attr('id');

      var id = $(this).data('id');
      $('#js-user-modal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id,
          name: name,
          age: age,
          email: email,
          gender: gender,
          mobile: mobile,
          birthdate: birthdate,
          address: address,
          qualification: qualification,
          employmentstatus: employmentstatus
        },
        type: 'post',
        success: function (data) {
          var json = JSON.parse(data);
          $('#id').val(id);
          $('#nameField').val(json.name);
          $('#ageField').val(json.age);
          $('#genderField').val(json.gender);
          $('#emailField').val(json.email);
          $('#mobileField').val(json.mobile);
          $('#addressField').val(json.address);
          $('#qualificationField').val(json.qualification);
          $('#employmentstatusField').val(json.employmentstatus);
          $('#trid').val(trid);
        }
      })
    });

    // Delete User Action
    $(document).on('click', '.deleteBtn', function (event) {
      var table = $('#js-users-data-table').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function (data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="js-user-modal" tabindex="-1" aria-labelledby="js-user-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="js-user-modal-label">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nameField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="ageField" class="col-md-3 form-label">Age</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="ageField" name="age">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="genderField" class="col-md-3 form-label">Gender</label>
              <div class="col-md-9">
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mobileField" class="col-md-3 form-label">Mobile</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="mobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addressField" class="col-md-3 form-label">Address</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addressField" name="Address">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="qualificationField" class="col-md-3 form-label">Qualification</label>
              <div class="col-md-9">
                <input list="addqualificationField" name="qualification">
                <form action="update_user.php">
                  <datalist id="addQualificationField">
                    <option value="Book Keeping-NCIII">
                    <option value="Bread & Pastry Production-NCII">
                    <option value="Career Entry Course for Software Dev.JAVA-NCIV">
                    <option value="Computer System Servicing-NCII">
                    <option value="Computer System Servicing-NCII(Mobile Training Prog.)">
                    <option value="Contact Center Servicing-NCII">
                    <option value="Events Management Services-NCIII">
                    <option value="Trainer's Methodology Level1">
                  </datalist>
                </form>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="employmentstatusField" class="col-md-3 form-label">EmploymentStatus</label>
              <div class="col-md-10">
                <br>
                <input type="radio" name="employmentStatus" value="employed">Employed
                <input type="radio" name="employmentStatus" value="unemployed">Unemployed
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Add user modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="js-user-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="js-user-modal-label">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="addnameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addnameField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="ageField" class="col-md-3 form-label">Age</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="ageField" name="age">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="genderField" class="col-md-3 form-label">Gender</label>
              <div class="col-md-9">
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="addEmailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mobileField" class="col-md-3 form-label">Mobile</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addmobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addressField" class="col-md-3 form-label">Address</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addaddressField" name="Address">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="qualificationField" class="col-md-3 form-label">Qualification</label>
              <div class="col-md-9">
                <input list="addqualificationField" name="qualification">
                <form action="add_user.php">
                  <datalist id="addQualificationField">
                    <option value="Book Keeping-NCIII">
                    <option value="Bread & Pastry Production-NCII">
                    <option value="Career Entry Course for Software Dev.JAVA-NCIV">
                    <option value="Computer System Servicing-NCII">
                    <option value="Computer System Servicing-NCII(Mobile Training Prog.)">
                    <option value="Contact Center Servicing-NCII">
                    <option value="Events Management Services-NCIII">
                    <option value="Trainer's Methodology Level1">
                  </datalist>
                </form>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="employmentstatusField" class="col-md-3 form-label">EmploymentStatus</label>
              <br>
              <div class="col-md-10">
                <input type="radio" name="employmentStatus" value="employed">Employed
                <input type="radio" name="employmentStatus" value="unemployed">Unemployed
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<script type="text/javascript">

  //var table = $('#js-users-data-table').DataTable();


</script>