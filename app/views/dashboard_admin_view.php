

<h1>Dashboard</h1>
<hr>


<select id="sel_client" name="client" >
  <option value"0">Select client</option>
<?foreach($data['all_client'] as $user):?>
  <option value=<? echo $user['id'];?>><?php echo $user['full_name']; ?></option>
<? endforeach; ?>
</select><!-- # -->

&nbsp;
<div  id="campaigns" name="campign">
  

</div> 
<!-- <select id="campaigns" name="campign">

</select> -->
<hr>
<br>


<table id='clients' class="display table table-condensed table-striped table-hover table-bordered clients pull-left">
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Guest post URL</th>
      <th>Approving</th>
      <th>TF</th>
      <th>DA</th>
      <th>TTF</th>
      <th>Keywords</th>
      <th>Client URL</th>
      <th>Content</th>
      <th>Content approving</th>
      <th>Status</th>
      <th>Live URL</th>
    </tr>
  </thead>
  <tfoot>
  <tr>
    <th>ID</th>
    <th>Date</th>
    <th>Guest post URL</th>
    <th>Approving</th>
    <th>TF</th>
    <th>DA</th>
    <th>TTF</th>
    <th>Keywords</th>
    <th>Client URL</th>
    <th>Content</th>
    <th>Content approving</th>
    <th>Status</th>
    <th>Live URL</th>
  </tr>
  </tfoot>
</table>

<div class="add"></div>

&nbsp; &nbsp; &nbsp; <button class="btn-primary notificationinst" data-toggle="modal" data-target="#notif">Send notification</button>

<div class="modal fade" id="notif"  tabindex="-1" role="dialog" aria-labelledby="editCampaign">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Send notification: </h4>
      </div>
      <!-- <div class="notification"></div> -->
      <form id="addCampaignForm" action="<?php echo $host . "/clients/"; ?>addCampaign" method="post">
        <div class="modal-body">
          <div class='form-group'>
            <input id="us_id_camp" type="hidden" name="id">
            <div id="paste" >
              
            <textarea id = "total" rows="20" cols="85" name="message" placeholder="Message"></textarea>
            </div>
            <input class="form-control" type="text" name="campaign" >
          </div>

          <div class="bg-success ssuccess"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    
    $(".notificationinst").click(function(){
      var app_ids ='';
      $('#clients_wrapper input:checkbox:checked').each(function(){
       if(this.value !== undefined)  var val = this.value ;
       app_ids += val+ ',';
      });
      s = app_ids;
      s = s.substring(0, s.length - 1)
      // console.log(app_ids);
        $.ajax({
              type: "POST",
              url: '<?php echo $host . "/admin/"; ?>getNotification',
              data:  {id: app_ids},
              success: function (data) {

              // console.log(data);
              document.querySelector('#paste').innerHTML = '<p>' + data + '</p>';
                // table.ajax.reload();

                $('#subject').change(function() {
                  var id = $(this).val();
                  $.ajax({
                      type: 'POST',
                      url:'<?php echo $host . "/admin/"; ?>getTemplate',
                      data: {id:id},
                     success: function (data) {
                          console.log(data);
                       // document.querySelector('#total').innerHTML = '<p>' + data + '</p>';
                     }
                  })
                  });

              }
            });
    });


    $("select").change(function(){
    if($(this).val() == 0) return false;
    var id = $(this).val();

    $.ajax({
              type: "POST",
              url: '<?php echo $host . "/admin/"; ?>getCampaign',
              data:  {id: id},
              success: function (data) {

              // console.log(data);
              document.querySelector('#campaigns').innerHTML = '<p>' + data + '</p>';
                // table.ajax.reload();
              }
            });
    
});
      
    var table =  $('#clients').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?php echo $host . "/admin/"; ?>query",
      aaSorting:[],
      "order": [[ 0, "asc" ]],
      "aLengthMenu": [
        [100, 200, -1],
        [100, 200, "All"]
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
//        nRow.querySelector('.order_id').addEventListener('mouseover', function(event) {
//          this.querySelector('input').style.display = "block";
//        });
        if(nRow.querySelector('.edittf')){
          nRow.querySelector('.edittf').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            // console.log(id);

            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("editnew");
            input.name="tf";
            input.value=val_tf;
            var a = button.parentNode.replaceChild(input, button);
            $(input).blur(function(e) {
              console.log(e.currentTarget);
              var val_new =	$(this).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_tf',
                data:  { id: id, val:val_new},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            });

            $(input).keydown(function(e) {
              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_tf',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();
                  }
                });
              }

            });
          });
        }

        if(nRow.querySelector('.datepicker')){
          var picker = nRow.querySelector('.datepicker');
            $( picker ).datepicker({
              dateFormat: 'yy-mm-dd'
            });
        }

        if(nRow.querySelector('.change_approved')){
          nRow.querySelector('.change_approved').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');

            $(button).on('change', function() {
              var change = this.value;

              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>approving',
                data:  { id: id, val:change},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            })
          });
        }
        if(nRow.querySelector('.status_change')){
          nRow.querySelector('.status_change').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            $(button).on('change', function(){
              var stat = this.value;
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>status',
                data:  { id: id, val:stat},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            })
          });
        }

        if(nRow.querySelector('.editda')){
          nRow.querySelector('.editda').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("editnew");
            input.name="da";
            input.value=val_tf;
            var a = button.parentNode.replaceChild(input, button);
            var val_new;
            $(input).blur(function(e) {
              var val_new =	$(e.currentTarget).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_da',
                data:  { id: id, val:val_new},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            });

            $(input).keydown(function(e) {
              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_tf',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();
                  }
                });
              }
            });
          });
        }

        if(nRow.querySelector('.editttf')){
          nRow.querySelector('.editttf').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("editttf");
            input.name= "tf";
            input.value= val_tf;
            var a = button.parentNode.replaceChild(input, button);
            $(input).blur(function(e) {
              var val_new =	$(e.currentTarget).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_ttf',
                data:  { id: id, val:val_new},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            });
            $(input).keydown(function(e) {

              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_ttf',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();
                  }
                });
              }

            });

          });
        }

        if(nRow.querySelector('.editcont')){
          nRow.querySelector('.editcont').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("editcont");
            input.name="tf";
            input.value=val_tf;
            var a = button.parentNode.replaceChild(input, button);
            var val_new;
            $(input).blur(function(e) {
              var val_new =	$(e.currentTarget).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_cont',
                data:  { id: id, val:val_new},
                success: function (data) {
                  table.ajax.reload();
                }
              });
            });
            $(input).keydown(function(e) {
              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_tf',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();

                  }
                });
              }
            });
          });
        }

        if(nRow.querySelector('.editurl')){
          nRow.querySelector('.editurl').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');

            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("editurl");

            input.name="url";
            input.value=val_tf;
            var a = button.parentNode.replaceChild(input, button);
            var val_new;
            $(input).blur(function(e) {
              var val_new =	$(e.currentTarget).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_url',
                data:  { id: id, val:val_new },
                success: function (data) {
                  table.ajax.reload();
                }
              });

            });
            $(input).keydown(function(e) {
              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_url',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();
                  }
                });
              }
            });
          });
        }

        if(nRow.querySelector('.edit_guest')){
          nRow.querySelector('.edit_guest').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');

            var val_tf = $(button).text();
            var input = document.createElement("INPUT");
            input.classList.add("edit_guest");

            input.name="url";
            input.value=val_tf;
            var a = button.parentNode.replaceChild(input, button);
            var val_new;
            $(input).blur(function(e) {
              var val_new = $(e.currentTarget).val();
              $.ajax({
                type: "POST",
                url: '<?php echo $host . "/admin/"; ?>update_guest',
                data:  { id: id, val:val_new },
                success: function (data) {
                  table.ajax.reload();
                }
              });

            });
            $(input).keydown(function(e) {
              if (e.which == 13) {
                var val_new = $(e.currentTarget).val();
                $.ajax({
                  type: "POST",
                  url: '<?php echo $host . "/admin/"; ?>update_guest',
                  data:  { id: id, val:val_new},
                  success: function (data) {
                    table.ajax.reload();
                  }
                });
              }
            });
          });
        }

        if(nRow.querySelector('.check')){
          nRow.querySelector('.check').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');
            // console.log(id);
            $.ajax({
              type: "POST",
              url: '<?php echo $host . "/admin/"; ?>approving',
              data:  { id: id },
              success: function (data) {
                document.querySelector('.addsuccess').innerHTML = '<p>' + data + '</p>';
                // $('#addNewClient')[0].reset();
                table.ajax.reload();
                setTimeout(function(){
                  $('.addsuccess').fadeOut(1000);
                }, 3500);
              }
            });
          });
        }
    // отклонить
        if(nRow.querySelector('.not_appr')){
          nRow.querySelector('.not_appr').addEventListener('click', function(event) {
            var button = event.currentTarget;
            var id = button.getAttribute('attr-id');

            $.ajax({
              type: "POST",
              url: '<?php echo $host . "/admin/"; ?>not_approving',
              data:  { id: id },
              success: function (data) {
                document.querySelector('.addsuccess').innerHTML = '<p>' + data + '</p>';
                table.ajax.reload();
                setTimeout(function(){
                  $('.addsuccess').fadeOut(1000);
                }, 3500);
              }
            });
          });
        }
      },
      "initComplete": function(){
        var r = $('#clients tfoot tr');
        r.find('th').each(function(){
          $(this).css('padding', 8);
        });
        $('#clients thead').append(r);
        $('input').css('text-align', 'center');
      }
    });

    $('#clients tfoot th').each( function () {
      // console.log(this);
      var title = $('#clients thead tr:eq(0) th').eq( $(this).index() ).text();
      var html_string = '';
      var input_style = ' style="width:100%; padding:1px !important; margin-left:-2px; margin-bottom: 0px;"';
      var select_style = ' style="width:100%; padding:1px; margin-left:-2px; margin-bottom: 0px; height: 24px;"';
      if ($(this).index() == 1){
        html_string = '<input type="text" ' + input_style + ' class="datepicker" placeholder="Select date">';
      }
      else if ( $(this).index() == 3 ) {
        html_string = '<select ' + select_style + '>' +
          '<option value="">Select Status...</option>' +
          '<option value="1">Request Approved</option>' +
          '<option value="0">Request Disapproved</option>' +
          '</select>';
      }
      else {
        // placeholder="' + $.trim(title) + '"
        html_string = '<input type="text" ' + input_style + ' />';
      }

      $(this).html(html_string);
      // $(this).html( '<input class="searchbox" type="text" placeholder="Search '+title+'" />' );
    } );
    // Apply the search
    $( ".datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
    
    table.columns().eq( 0 ).each( function ( colIdx ) {
      $( 'input, select', table.column( colIdx ).footer() ).on( 'keyup change', function () {
        table
          .column( colIdx )
          .search( this.value )
          .draw();
      } );
    } );


// $('input[type=checkbox]').click(function(){

//       console.log('777');
//       alert('777');

// });
       $(function() {
  $('.id_check').click(function() {
    $(this).closest('li').toggleClass('checked');
  });
})
            // var button = event.currentTarget;
            // var id = button.getAttribute('value');
            // console.log(id);

            // var val_tf = $(button).text();
            // var input = document.createElement("INPUT");
            // input.classList.add("editcont");
            // input.name="tf";
            // input.value=val_tf;
            // var a = button.parentNode.replaceChild(input, button);
            // var val_new;
           
            //   var val_new = $(e.currentTarget).val();
              // $.ajax({
              //   type: "POST",
              //   url: '<?php echo $host . "/admin/"; ?>update_cont',
              //   data:  { id: id, val:val_new},
              //   success: function (data) {
              //     table.ajax.reload();
              //   }
              // });
         
         
        

  });

</script>
