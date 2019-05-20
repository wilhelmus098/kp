<!DOCTYPE html>  
<?php  
  include 'checksession.php';
  include 'conn.php';
 ?>  
<html>  
<head>  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Lumino - Dashboard</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">

      <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>  
<body>  
    <?php
      require_once('sidemenu.php');      
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
          <ol class="breadcrumb">
            <li><a href="#">
              <em class="fa fa-home"></em>
            </a></li>
            <li class="active">List Gereja</li>
          </ol>
        </div><!--/.row-->

        <div class="row">
          <div class="col-lg-12">
          <div class="text-center" style="margin: 8px;">
            <button onclick='myFunction()'  class='btn btn-default' style="width:200px">Print</button> <button align="right" type="button" name="age" id="age" data-toggle="modal" data-target="#add_jemaat_Modal" class="btn btn-primary m-2">Add</button>
          </div>

            <div class="panel panel-default"  id="section-to-print">
                <div class="panel-body">
                <div class="col-md-12">
                  <table class="table table-hover" id="jemaat_table">
                    <thead>
                      <tr>
                      <th>Nama Jemaat</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Nomor Telepon<th>
                      <th>Jemaat Gereja: </th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT * FROM Jemaat";
                      $result = mysqli_query($mysqli, $sql);
                    ?>  
                    <?php while($row = $result->fetch_assoc()) { ?>
                      <tr>
                        <td><a href="edit_jemaat.php?idjemaat=<?=$row["idJemaat"]?>"><?=$row["NamaJemaat"]?></td>
                        <td><?=$row["TempatLahir"]?></td>
                        <td><?=$row["TglLahir"]?></td>
                        <td><?=$row["Alamat"]?></td>
                        <td><?=$row["NoTelp"]?></td>
                        <td><?=$row["idGereja"]?></td>
                        <td>
                          <input type="button" name="view" value="VIEW" id="<?=$row["idJemaat"]; ?>" class="btn btn-success btn-xs view_jemaat" />
                          <input type="button" name="delete" value="DELETE" id="<?=$row["idJemaat"]; ?>" class="btn btn-warning btn-xs delete_jemaat"/>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div id="add_jemaat_Modal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title">CREATE NEW JEMAAT</h1>
                  </div>

                  <div class="modal-body">
                      <form role="form" method="POST" id="jemaat_form" action="controllers/jemaat.php">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_jemaat" id="nama_jemaat">
                          </div>

                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                          </div>

                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_jemaat" id="alamat_jemaat">
                          </div>

                          <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" name="nomor_jemaat" id="nomor_jemaat">
                          </div>

                          <div class="form-group">
                            <label>Berjemaat di Gereja: </label>
                            <select class="form-control" name="gereja_jemaat_id" id="gereja_jemaat_id">
                              <?php
                                $sql = "select * from Gereja";
                                $result = mysqli_query($mysqli, $sql);
                                if($result->num_rows > 0)
                                {
                                  while($row = $result->fetch_assoc())
                                  { 
                                    echo "<option value=\"". $row['idGereja'] ."\">".$row["JenisGereja"]." - ".$row["AlamatGereja"]."</option>";
                                  }
                                }
                              ?>
                            </select>
                          </div>

                          <input type="submit" name="create_jemaat_modal" id="create_jemaat_modal" value="CREATE" class="btn btn-success" />
                      </form>
                  </div>

                  <div id="detailModal" class="modal fade">
                   <div class="modal-dialog">
                    <div class="modal-content">
                     
                     <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Jemaat Details</h4>
                     </div>
                     
                     <div class="modal-body" id="detail_jemaat">
                     </div>
                     <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>

                  
                </div>
              </div>
            </div><!-- /.panel-->
          </div><!-- /.col-->
        </div><!-- /.row -->
      </div>  <!--/.main-->

  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/custom.js"></script>
  <script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }

        $(document).ready(function()
        {
          $('#jemaat_form').on("submit", function(event)
          {  
            event.preventDefault();  
            if($('#nama_jemaat').val() == "")  
            {  
              alert("Nama Jemaat is required");  
            }  
            else if($('#tempat_lahir').val() == '')  
            {  
              alert("Tempat lahir is required");  
            }  
            else if($('#tgl_lahir').val() == '')
            {  
              alert("Tanggal lahir is required");  
            }     
            else if($('#alamat_jemaat').val() == '')
            {
              alert("Alamat is required");
            }      
            else if($('#nomor_jemaat').val() == '')
            {
              alert("Nomor is required");
            }      
            else  
            {  
             $.ajax
             (
              {  
                url:"controllers/jemaat.php",  
                method:"POST",  
                data:$('#jemaat_form').serialize(),  
                beforeSend:function()
                {  
                    $('#create_jemaat_modal').val("Inserting");  
                },  
                success:function(data)
                {  
                    $('#jemaat_form')[0].reset();  
                    $('#add_jemaat_Modal').modal('hide');  
                    $('#jemaat_table').html(data);  
                }  
              }
             );  
            }   
         });

        $(document).on('click', '.view_jemaat', function()
        {
          var view_jemaat_modal = $(this).attr("idJemaat");
          $.ajax
          (
            {
              url:"controllers/jemaat.php",
              method:"POST",
              data:{view_jemaat_modal:view_jemaat_modal},
              success:function(data)
              {
                $('#detail_jemaat').html(data);
                $('#detailModal').modal('show');
              }
            }
          );
        });
      }); 
    </script>
</body>
</html>