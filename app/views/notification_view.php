<table id="table" class="display table table-condensed table-striped table-hover table-bordered clients pull-left dataTable no-footer">
<thead>
  <tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Notification</th>
    <th>Setting</th>
  </tr>
</thead>
<? foreach ($data['notif'] as $key=>$val): ?>

<tbody>
 
    <td> <?php echo $val['id']; ?> </td>
    <td> <?php echo $val['subject']; ?> </td>
    <td> <?php echo $val['notification']; ?> </td>
    <td> 
        <a class="btn btn-success delete_not" data-id="<?php echo $val['id']; ?>"> Delete </a>        
        <a class="btn btn-success edit_not" data-toggle="modal" data-target="#editNot" data-id="<?php echo $val['id']; ?>"> Edit </a>        
     </td>
<? endforeach; ?>
</tbody>  
</table>
<h1>Add notification</h1>
  <form action="#" id="addNotification" class="signin-wrapper" method="post">
            <div class="widget-body">
          <div class="form-group">
              <input class="form-control" placeholder="Subject" type="text" name="subject" required>
            </div>
            <div class="form-group">
              <textarea rows="10" cols="45" class="form-control" placeholder="Notification" type="text" name="notification" required></textarea>
            </div>
            <hr>
          </div>
          <div class="actions">
            <input class="btn btn-info pull-left" type="submit" value="Save">
            <div class="clearfix"></div>
          </div>
        </form>
        <div class="addsuccess bg-success"></div>

<div class="modal fade" id="editNot"  tabindex="-1" role="dialog" aria-labelledby="editNoty">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Notification: </h4>
      </div>
      <form id="editNotyfication" action="#" method="post">
        <div class="modal-body">

          <div class="clientsfields"><div class="text-center"><img src="/25.gif" id="img" alt=""></div></div>

          <div class="bg-success success"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary update_not ">Update info</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">

	var addntf = $('#addNotification');
    addntf.submit(function (ev) {
        $.ajax({
            type: addntf.attr('method'),
            url: '<?php echo $host . "/admin/"; ?>addNotification',
            data:  addntf.serialize(),
            success: function (data) {
             document.querySelector('.addsuccess').innerHTML = '<p>' + data + '</p>';
             $('#addNotification')[0].reset();
	          setTimeout(function(){
	             $('.addsuccess').fadeOut(1000);
	            }, 3500);
              window.location.reload();

            }
        });
        ev.preventDefault();
    });

// var table = $('#id').dataTable();
    $('.delete_not').click(function(){
    var id = $(this).attr('data-id');
           $.ajax({
            type: 'post',
            url: '<?php echo $host . "/admin/"; ?>deleteNotif',
            data: {id:id},
            success: function (data) {
             document.querySelector('.addsuccess').innerHTML = '<p>' + data + '</p>';
             // $('#addNotification')[0].reset();
         
            setTimeout(function(){
               $('.addsuccess').fadeOut(1000);
              }, 3500);
              window.location.reload();
            }
        });
    });

    $('.edit_not').click(function(){
    var id = $(this).attr('data-id');
       $.ajax({
            type: 'post',
            url: '<?php echo $host . "/admin/"; ?>getNotif',
            data: {id:id},
            success: function (data) {
              document.querySelector('.clientsfields').innerHTML = data;
             // document.querySelector('.addsuccess').innerHTML = '<p>' + data + '</p>';
             // $('#addNotification')[0].reset();
         
            // setTimeout(function(){
            //    $('.addsuccess').fadeOut(1000);
            //   }, 3500);
            //   window.location.reload();
            }
        });


    });

      var frm = $('#editNotyfication');
      frm.submit(function (ev) {
        // console.log('77');
        $.ajax({
            type: frm.attr('method'),
            url: '<?php echo $host . "/admin/"; ?>UpdateNotif',
            data:  frm.serialize(),
            success: function (data) {
             // console.log(data);
              document.querySelector('.success').innerHTML = '<p>' + data + '</p>';
               setTimeout(function(){
                 $('.bg-success').fadeOut(1000);
                }, 3500);
            $('#editNot').on('hidden.bs.modal', function () {
              window.location.reload();
            });
            }
        });
        ev.preventDefault();
    });




</script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
