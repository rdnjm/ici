<?php session_start(); ?>
<div class="modal fade" id="leaveModal" tabindex="-1"  data-keyboard='false' data-backdrop='static' role="dialog" aria-labelledby="myLargeModalLabell" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="panel panel-success" style="margin-bottom:0;">
				<div class="panel-heading">
					<label>Approve Leave</label>
				</div>
				<div class="panel-body" style="margin-bottom:0;">
					<label>Leave Request Number:</label>
					<?php echo $_SESSION['LeaveReqNum']; ?>
					<label>Description:</label>
					<input type="text" class="form-control" name = "des" id = "des">
				</div>
			</div>
			<div class="modal-footer" style="margin:0;">
				<button type="button" class="btn btn-primary" onclick="save(event)">Save changes</button>
              	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close(event)">Close</button> 
            </div>
		</div>	
	</div>
</div>

