
<div class="be-content">
  <div class="page-head">
    <h2 class="page-head-title"><?=$doc[0]['DocumentName']; ?> Requests</h2>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb page-head-nav">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Pending Requests</li>
      </ol>
    </nav>
  </div>
  <div class="main-content container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-table">
          <div class="card-header">
            <div class="btn-group btn-space">
              <button type="button" class="btn btn-secondary">Filter By Status</button>
              <button type="button" data-toggle="dropdown" class="btn btn-secondary dropdown-toggle"><span class="mdi mdi-chevron-down"></span><span class="sr-only">Toggle Dropdown</span></button>
              <div role="menu" class="dropdown-menu">
                <a href="<?=base_url('requests/documents/'.$doc[0]['Id']); ?>" class="dropdown-item">No Filter</a>               
                <a href="<?=base_url('requests/documents/'.$doc[0]['Id'].'/1'); ?>" class="dropdown-item">Pending</a>
                <a href="<?=base_url('requests/documents/'.$doc[0]['Id'].'/2'); ?>" class="dropdown-item">Approved</a>
                <a href="<?=base_url('requests/documents/'.$doc[0]['Id'].'/0'); ?>" class="dropdown-item">Rejected</a>
              </div>
            </div>
            <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a href="#" role="button" data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert"></span></a>
              <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Action</a><a href="#" class="dropdown-item">Another action</a><a href="#" class="dropdown-item">Something else here</a>
                <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="table3" class="table table-striped table-hover table-fw-widget myapptable">
              <thead>
                  <tr>
                    <th style="width:5%;">
                      <label class="custom-control custom-control-sm custom-checkbox">
                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                      </label>
                    </th>
                    <th>Date</th>
                    <th>Requested By</th>
                    <th>Intended Company</th> 
                    <th>Addressee</th> 
                    <th style="width:80px;">Action</th>
                  </tr>
              </thead>
                <tbody>

                  <?php
                  if (!empty($requests)) {
                     if ($requests->num_rows() > 0) {
                        foreach ($requests->result() as $row) { ?>
                    <tr>
                      <td>
                        <label class="custom-control custom-control-sm custom-checkbox">
                          <input type="checkbox" dataclass="studentids" class="custom-control-input studentids" data-id="<?=$row->Id; ?>">
                          <span class="custom-control-label"></span>
                        </label>
                      </td>
                      <td class="cell-detail"> <span><?=date('Y-m-d',strtotime($row->CreatedAt)); ?></span></td>
                      <td class="cell-detail"> <span><?=$row->FirstName.' '.$row->LastName; ?></span></td> 
                      <td class="cell-detail"> <span><?=$row->CompanyName; ?></span></td>
                      <td class="cell-detail"> <span><?php if($row->SFirstName == '') {echo $row->ContactPerson;} else {echo $row->SFirstName.' '.$row->SLastName;} ?></span></td>
                      <td class="text-right">
                          <div class="btn-group btn-space">
                            <button type="button" class="btn btn-secondary approverequest" data-action="<?=base_url('generate/print/document/'.$row->Id); ?>" data-id="<?=$row->Id; ?>" data-cmd="1">Open</button>
                            <button type="button" class="btn btn-success approverequest" data-action="<?=base_url('manage/requests/edit'); ?>" data-id="<?=$row->Id; ?>" data-cmd="2">Approve</button>
                            <button type="button" class="btn btn-danger approverequest" data-action="<?=base_url('manage/requests/edit'); ?>" data-id="<?=$row->Id; ?>" data-cmd="0">Reject</button>
                          </div>
                          </td>
                    </tr>
                  <?php
                        }
                     }
                  }
                  ?>

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="ReportOptions" data-action="<?=base_url('applications/preview'); ?>" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-colored">
        <h3 class="modal-title">Select document to request with..</h3>
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close">       </span></button>
      </div>
      <div class="modal-body">
 
<div class="mt-2 mb-4">

    <div class="list-group d-flex">

<?php
if (!empty($docs)) {
   if ($docs->num_rows() > 0) {
      foreach ($docs->result() as $doc) { ?>      
      <a id="doc_<?=$doc->Id; ?>" data-docid="<?=$doc->Id; ?>" data-recordid="" data-studid="<?=$this->session->userdata('account_id'); ?>" data-appid="" class="list-group-item d-flex list-group-item-action report-opts">
        <span class="text-primary mdi mdi-file icon"></span>
        <span class="text docname"><?=$doc->DocumentName; ?></span>
        <span class="badge badge-pill badge-primary docstatus"></span>
      </a>
<?php
      }
   }
}
?>
    </div>
</div>

      </div>
    </div>
  </div>
</div>



    <div id="ReportSelectionPreview" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog full-width">
        <div class="modal-content" style="height:550px;">
          <div class="modal-header">
            <strong><p class="report-title"></p></strong>
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
          </div>
          <?php $hidden = array('pDocumentId'=>'','pApplicationId'=>'','pRecordId'=>''); ?>
          <?=form_open('requests/add','id="reportproceed"',$hidden); ?>
          <div class="modal-body">

            <div class="report-content" style="overflow-y: scroll;height: 420px">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary md-close">Cancel</button>
            <button type="submit" class="btn btn-primary">Proceed</button>
          </div>
            <?=form_close(); ?>

        </div>
      </div>
    </div>