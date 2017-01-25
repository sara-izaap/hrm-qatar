<div class="col-xs-12 table-sub-header text-right">
  <div class="row">
   <div class="div top-lisiting-search">
    <form method="post" id="simple_search_form">
      <div class="col-sm-2">
        <?php echo form_dropdown('search_type', $simple_search_fields, $search_conditions['search_type'], 'class="form-control"');?>
        
      </div>
      
      <div class="col-sm-5">
        <div class="input-group clearfix">
          <input type="text" class="form-control" name="search_text" value="<?php echo $search_conditions['search_text'];?>" placeholder="Search some stuff.">
          <span class="input-group-btn">
              <button class="btn" type="button" id="simple_search_button" data-placement="top" data-toggle="tooltip" data-original-title="search"><span class="fa fa-search"></span></button>
          </span>
          <a class="clear-text" href="javascript:void(0);" onclick="$.fn.clear_simple_search();" data-placement="top" data-toggle="tooltip" data-original-title="clear simple search">Clear Filter</a>
        </div>
      </div>
    </form>
    <div class="advanced-search advancesearch">
    </div>
    <div class="col-sm-5 entry-text text-right">
       <span class="col-sm-6 show-entry">Show entries:</span>
       <span class="col-sm-6">
        <?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'class="form-control"');?>
        </span>
    </div>
  </div>
</div>
</div>

<!--Advanced Search Popup content starts here-->
<div id="popOverBox" style="display: block;"></div>

<hr>
  
<div class="m_bottom clearfix">
  <div class="col-md-5">
     <input type="text" class="form-control col-sm-5" name="working_hours" id="working_hours" onkeypress="return numbersonly(event)" value="" placeholder="Enter hours (ex., 8 or 7.5) ">
     <button type="button" class="btn btn-sm " onclick="create_timesheet(this)">Save</button>
 
  </div>  
  
  <div class="text-right col-md-4">
    <form class="text-right" method="post" action="<?php echo site_url('timesheet/import');?>" enctype="multipart/form-data">
      <div class="browsefile">
        <input type="file" id="base-input" name="userfile" class="form-control form-input form-style-base">
        <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Import your File">
        <button type="submit" class="btn btn-sm ">Import</button>
      </div>

    </form>
  </div>

  <div class="text-right col-md-3">
   
    <div class="btn-group timesheet-downbload">
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-download" aria-hidden="true"></i> Download
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0);" onclick="export_timesheet('1')">Export by date wise</a>
        <a class="dropdown-item" href="javascript:void(0);" onclick="export_timesheet('2')">Export by total hours</a>        
      </div>
    </div>

  </div>
  
</div> 

