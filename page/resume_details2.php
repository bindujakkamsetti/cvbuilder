<div class="container">
    <h3 class="my-3">Enter Your Details</h3>
  <form method="post" action="<?=$action->helper->url('action/createresume')?>" class="border border-2 rounded -2 p-2 my-3">
  <p class="fs-4"><h5><i class="bi bi-person-circle"></i> Personal Details</h5></p>
  <div class="row justify-content-between">
    <div class="col-6 mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="enter your name" name="name" id="inputEmail3" required>
      </div>
    </div>
    <div class="col-6  mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Headline</label>
      <div class="">
        <input type="text" class="form-control" name="headline" placeholder="enter headline" id="inputEmail3" required>
      </div>
    </div>
  </div>
    <div class="col mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Objective</label>
      <div class="">
        <textarea class="w-100" name="objective" required></textarea>
      </div>
    </div>
    <hr>
    <p class="fs-4"><h5><i class="bi bi-person-lines-fill"></i> Contact Details</h5></p>
  <div class="row justify-content-between">
    <div class="col-6 mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="enter email" name="email" id="inputEmail3" required>
      </div>
    </div>
    <div class="col-6 mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Mobile</label>
      <div class="">
        <input type="mobile" placeholder="enter mobile number" name="mobile" class="form-control" id="inputEmail3" required>
      </div>
    </div>
  </div>
    <div class="mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4">Address</label>
      <div class="">
        <input type="text" name="address" class="form-control" placeholder="enter your address" id="inputEmail3" required>
      </div>
    </div>
    <hr>
    <div class="mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><h5><i class="bi bi-tools"></i> Skills</h5></label>
      <div id="skills">
      </div>
      <div class="input-group mb-3">
      <input type="text" id="userskill" class="form-control" placeholder="enter skill" aria-label="Example text with button addon" aria-describedby="button-addon1">
    <button class="btn btn-primary" type="button" id="addskill">Add Skill</button>
  </div>
    </div>
    <hr>
    <div class="mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><h5><i class="bi bi-book"></i> Education</h5></label>
      <div id="educations" class="">      
  </div>
      <div class="d-flex gap-2">
        <input type="text" class="form-control" id="college" placeholder="Enter your university/college">
        <input type="text" class="form-control" id="course" placeholder="Enter your course">
        <input type="text" class="form-control" id="c_duration" placeholder="enter time period">
        <button class="btn btn-primary" type="button" id="addeducation">Add</button>
      </div>
    </div>
    <hr>
    <div class="mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><h5><i class="bi bi-briefcase"></i> Experience</h5></label>
      <div id="exps" class="">
        
  </div>
      <div class="d-flex gap-2">
        <input type="text" class="form-control" id="company" placeholder="Enter company name" >
        <input type="text" class="form-control" id="jobrole" placeholder="Enter job role">
        <input type="text" class="form-control" id="w_duration" placeholder="enter work period">
      </div>
      <span class="d-block mt-2">About your work</span>
      <textarea id="work_desc" class="w-100 mb-2"></textarea>
  <button class="btn btn-primary" type="button" id="addexp">Add</button>
    </div>
    <button type="submit" class="btn btn-warning"><i class="bi bi-box2"></i> Create Resume</button>
  </form>
  </div>