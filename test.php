<html>
    <body>
    <form role="form" method="GET" action="controllers/schedul.php">
									<div class="form-group">
										<label>Schedule User</label>
										<select class="form-control" name="schedule_user_id">
											<?php
												$sql = "select * from users where user_position = 'Actress'";
												$result = mysqli_query($mysqli, $sql);
												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo "<option value=\"".$row["iduser"]."\">".$row["user_name"]."</option>";
													}
												}
											?>
											
										</select>
									</div>
									
									<div class="form-group">
										<label>Schedule Start</label>
										<input type="datetime-local" class="form-control" name="schedule_start" placeholder="">
									</div>
									<div class="form-group">
										<label>Schedule End</label>
										<input type="datetime-local" class="form-control" name="schedule_end" placeholder="">
									</div>
									<div class="form-group">
										<label>Schedule Location</label>
										<input type="text" class="form-control" name="schedule_location" placeholder="">
									</div>
									<div class="form-group">
										<label>Schedule Description</label>
										<input type="text" class="form-control" name="schedule_desc" placeholder="">
									</div>
									
									<button type="submit" class="btn btn-primary" name="create_schedule">Create Schedule</button>
							</form>
    </body>
</html>