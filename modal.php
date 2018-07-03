<!-- Use MODAL foradding photos -->
<div id="AlbumModal" class="modalDialog">
         <div id="modal_wrapper">
             <div id="wrapper">
             <div id="register" class="animate form">
                 <a href="#close" title="Close" class="close">X</a>
                 <form  action="registervalidate.php" autocomplete="on" method="post" onsubmit="return checkForm(this);">
                     <h1> Create Album </h1>
                     <p style="color:red; text-align:center;  font-weight:bold;">
                     <?php
                     $message="";
                      if(!empty($_GET['message'])) {
                      echo  $message = $_GET['message']; }
                      ?>
                         </p>
                         <p style="color: #066A75; text-align:center; font-weight:bold;">
                             <?php
                                     $success="";
                                      if(!empty($_GET['success'])) {
                                      echo  $success = $_GET['success']; }
                                      ?>
                                  </p>
                         <p>
                             <label for="photocaption" class="uname">Album Caption</label>
                             <input id="photocaption"  name="caption" required="required" type="text" title="Username must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" placeholder="mysuperusername690" />
                         </p>
                     <p>
                         <label for="photocaption" class="uname">Description</label>
                         <input id="photocaption"  name="caption" required="required" type="text" title="Username must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" placeholder="mysuperusername690" />
                     </p>
                     <p class="keeplogin">
                         <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                         <label for="loginkeeping">isPublic</label>
                     </p>
                        <p class="signin button">
                            <input type="submit" value="Create Album" name="submit">
                       </p>
                 </form>
             </div>
         </div>
         </div>
</div>
<?php if ( isset($_GET['message'])){?>

    <script>
          $(function() {
           $('#openModal').modalDialog('show');
          });
          </script>

<?php };?>
<div id="openModal" class="modalDialog">
         <div id="modal_wrapper">
             <div id="wrapper">
             <div id="register" class="animate form">
                 <a href="#close" title="Close" class="close">X</a>
                 <form  action="upload.php" autocomplete="on" method="post" enctype="multipart/form-data">
                     <h1> upload photos </h1>
                     <p style="color:red; text-align:center;  font-weight:bold;">
                     <?php

                     if(!empty($_GET['message'])) {
                      echo  $message = $_GET['message']; }?>
                         </p>
                         <p>
                             <label for="album" class="youmail" > Select Album </label>
                            <select  name="albumID">
                                <option value="0">Default album</option>
                                 <option value="1">album1</option>
                                 <option value="2">album1</option>
                                 <option  value="3">album1</option>
                             </select>
                         </p>
                     <p>
                         <label for="photocaption" class="uname">Photo Caption</label>
                         <input id="photocaption"  name="caption" required="required" type="text" title="Caption must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" placeholder="mysuperusername690" />
                     </p>
                     <p>
                         <label for="photo_link" class="uname"> Select photo</label>
                         <input type="file" name="fileToUpload" id="fileToUpload" required >
                     </p>
                        <p class="signin button">
                            <input type="submit" value="Upload Image" name="submit">
                     </p>
                 </form>
             </div>
         </div>
         </div>
</div>
