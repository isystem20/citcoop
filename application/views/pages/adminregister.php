      <div class="be-content">
        <?php
        if ($this->session->userdata('usertype') == 'ADMIN') { ?>

        <div class="page-head">
          <h2 class="page-head-title">Registration</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Administration</a></li>
              <li class="breadcrumb-item"><a href="#">Masterlist</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('manage/accounts'); ?>">Admin</a></li>
              <li class="breadcrumb-item active">Register</li>
            </ol>
          </nav>
        </div>
        
        <?php
        }
        ?>


        <div class="main-content container-fluid">

          <?=form_open_multipart('admin/add','id="student_reg_form"'); ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-border-color card-border-color-primary">
                  <div class="card-header card-header-divider">Personal Information
                    <!-- <span class="card-subtitle">This is the default bootstrap form layout</span> -->
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                              <label for="inputUserName">Employee Code</label>
                              <input id="inputUserName" type="text" name="Code"  placeholder="Employee #" autocomplete="off" class="form-control">
                            </div>                        
                        </div>                        
                        <div class="col-sm-10 row">
                            <div class="form-group col-sm-4">
                              <label for="inputUserName">Given Name</label>
                              <input id="inputUserName" type="text" name="FirstName"  placeholder="Enter user name" autocomplete="off" class="form-control">
                          <!--     <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">This value is required.</li>
                              </ul> -->
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="inputUserName">Middle Name</label>
                              <input id="inputUserName" type="text" name="MiddleName"  placeholder="Enter user name" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="inputUserName">Family Name</label>
                              <input id="inputUserName" type="text" name="LastName" placeholder="Enter user name" autocomplete="off" class="form-control">
                            </div>                        
                        </div>

                      </div>
                      <div class="row">
                          <div class="col-sm-12 row">
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Birthdate</label>
                                <div class="">
                                  <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
                                    <div class="input-group-append">
                                      <button class="btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></button>
                                    </div>                                    
                                    <input size="16" type="text" name="Birthdate" value="" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Civil Status</label>
                                <select class="select2" name="CivilStatus">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                </select>
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Nationality</label>
                                <select class="select2" name="Nationality">
                                    <?php
                                    if ($nationality->num_rows() > 0) {
                                      
                                      foreach ($nationality->result() as $row) {
                                        $str = '';
                                        if (strtolower($row->Name) == 'filipino') {
                                          $str = 'selected';
                                        }
                                       ?>
                                      <option <?=$str; ?> value="<?=$row->Id ?>"><?=$row->Name; ?></option>  
                                    <?php
                                      }
                                    }
                                    ?>
                                </select>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-sm-12 row">
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Email</label>
                                <input type="email" name="PersonalEmail"  parsley-type="email" placeholder="Enter a valid e-mail" class="form-control">
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Mobile</label>
                                <input data-parsley-type="digits" name="MobileNo" type="text"  placeholder="639XXXXXXXXX" class="form-control parsley-error" data-parsley-id="63">
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="inputUserName">Landline</label>
                                <input data-parsley-type="digits" name="TelNo" type="text"  placeholder="Areacode + XXXXXXX" class="form-control parsley-error" data-parsley-id="63">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-sm-12 row">
                              <div class="form-group col-sm-6">
                                <label for="inputUserName">Address</label>
                                <input id="inputUserName" type="text" name="Address1"  placeholder="House Number, Street, Subdivision" autocomplete="off" class="form-control">
                              </div>
                              <div class="form-group col-sm-3">
                                <label for="inputUserName">City/Province</label>
                                <select class="select2" name="CityId">
                                    <option value="">Select City</option>
                                    <?php
                                    if ($cities->num_rows() > 0) {
                                      foreach ($cities->result() as $row) { ?>

                                    <option value="<?=$row->Id ?>"><?=$row->Name; ?></option>  

                                    <?php
                                      }
                                    }
                                    ?>
                              
                                </select>
                              </div>
                              <div class="form-group col-sm-3">
                                <label for="inputUserName">Region</label>
                                <select class="select2" name="ProvinceId">
                                    <option value="AK">Select Region</option>
                                    <?php
                                    if ($regions->num_rows() > 0) {
                                      foreach ($regions->result() as $row) { ?>

                                    <option value="<?=$row->Id ?>"><?=$row->Name; ?></option>  

                                    <?php
                                      }
                                    }
                                    ?>
                              
                                </select>
                              </div>
                          </div>
                      </div>

                      <div class="row pt-0 pt-sm-5">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                        </div>
                        <div class="col-sm-6 pl-0">
                          <p class="text-right">
                            <button type="submit" id="student_reg_btn" class="btn btn-big btn-space btn-primary">Submit</button>
                            
                          </p>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>

          <?=form_close(); ?>         
        </div>
      </div>
