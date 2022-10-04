 <!-- The Modal -->
 <div id="reload" class=""></div>
 <div class="modal" id="myModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Modal Heading</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 <div id="alertmsg" class="bg-success"></div>
                 <div class="form-group">
                     <label for="file">File:</label>
                     <input type="file" class="form-control" id="img" name="img" required />
                 </div>



                 <div class="form-group">
                     <label>NAME</label>
                     <input type="text" id="name" name="name" class="form-control" required>
                 </div>
                 <div class="form-group">
                     <label>EMAIL</label>
                     <input type="email" id="email" name="email" class="form-control" required>
                 </div>
                 <div class="form-group">
                     <label>CONTACT</label>
                     <input type="contact" id="contact" name="contact" class="form-control" required>
                 </div>

                 <div class="form-group ">
                     <label>Role</label>
                     <input type="Role" id="role" name="role" class="form-control" required>
                 </div>

                 <div class="form-group">
                     <label>BRANCH</label>
                     <select class="select style: width:100%" id="branch" name="branch" aria-label="select">
                         <option selected>--Select--</option>
                         <option value="1">Computer</option>
                         <option value="2">Art</option>
                         <option value="3">Medical</option>
                     </select>
                 </div>

                 <div class="form-group">
                     <label>Qualification</label>
                     <input type="Qualification" id="qualification" name="qualification" class="form-control" required>
                 </div>
             </div>



             <!-- Modal footer -->
             <div class="modal-footer">
                 <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                 <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                 <a href="#" id="save" class="btn btn-primary pull-right">Update</a>

             </div>
         </div>
     </div>
 </div>


 <!-- // ---------------edit records-------------------- -->
 <script>
     $(document).ready(function() {
         $(document).on('click', '#editbtn', function() {
             //  var id = $(this).data('id');
             //  console.log(id);
             $('#id_modal').val($(this).data('id'));
             //  $('#img').val($(this).data('img'));


             $('#name').val($(this).data('name'));
             $('#email').val($(this).data('email'));
             $('#contact').val($(this).data('contact'));
             $('#role').val($(this).data('role'));
             $('#branch').val($(this).data('branch'));
             $('#qualification').val($(this).data('qualification'));



         });

         $(document).on("click", "#save", function(e) {
             e.preventDefault();
             var id_modal = $('#id_modal').val();
             //  var img = $('#img').val();
             var name = $('#name').val();
             var email = $('#email').val();
             var contact = $('#contact').val();
             var role = $('#role').val();
             var branch = $('#branch').val();
             var qualification = $('#qualification').val();
             //  console.log(contact);

             $.ajax({
                 method: "POST",
                 url: "editdata_ajax.php",
                 data: {
                     id: id_modal,
                     //  img: img,
                     name: name,
                     email: email,
                     contact: contact,
                     role: role,
                     branch: branch,
                     qualification: qualification

                 },

                 success: function(dataResult) {
                     {
                         swal({
                             title: "Sweet!",
                             text: "Here's a custom image.",
                             imageUrl: 'thumbs-up.jpg'
                         });
                        //  $("#alertmsg").text("Thank you Submitting Form !");
                        //  setTimeout(function() {
                             location.reload(true)
                        //  }, 9000);

                         //  var dataResult = JSON.parse(dataResult);
                         //  if (dataResult.statusCode == 200) {
                         //      $('#myModal').modal().hide();
                         //      alert('Data updated successfully !');
                         //      setTimeout(function() {
                         //          location.reload(true)
                         //      }, 1000);                     
                         //  location.reload();
                     }

                 }
             });
         });
     });
 </script>