<div class="col-xs-12 table-sub-header text-right">
  <div class="row">
   <div class="div top-lisiting-search">
    <form method="post" id="simple_search_form">
      <div class="col-sm-2">
        <?php echo form_dropdown('search_type', $simple_search_fields, $search_conditions['search_type'], 'class="form-control"');?>
        
      </div>
      
      <div class="col-sm-3">
        <div class="input-group clearfix">
          <input type="text" class="form-control" name="search_text" value="<?php echo $search_conditions['search_text'];?>" placeholder="Search some stuff.">
          <span class="input-group-btn">
              <button class="btn" type="button" id="simple_search_button" data-placement="top" data-toggle="tooltip" data-original-title="search"><span class="fa fa-search"></span></button>
          </span>
          <a class="clear-text" href="javascript:void(0);" onclick="$.fn.clear_simple_search();" data-placement="top" data-toggle="tooltip" data-original-title="clear simple search">Clear Filter</a>
        </div>
      </div>
    </form>
    <div class="text-left advanced-search">  </div>

    <div class="text-right col-md-3">
      <form class="text-right" method="post" action="<?php echo site_url('employee/import');?>" enctype="multipart/form-data">
        <div class="browsefile">
          <input type="file" id="base-input" name="userfile" class="form-control form-input form-style-base">
          <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Import your File">
          <button type="submit" class="btn btn-sm ">Import</button>
        </div>

      </form>
    </div>

    <div class="text-right col-md-2">
      <form class="text-right" method="post" action="<?php echo site_url('employee/export');?>" >
        <div class="btn-group timesheet-downbload">
          <button class="btn btn-default dropdown-toggle" type="submit" aria-expanded="false">
           <i class="fa fa-download" aria-hidden="true"></i> Download
          </button>
        </div>
      </form>
    </div>

    <div class="col-sm-2 entry-text text-right">
       <span class="col-sm-7 show-entry">Show entries:</span>
       <span class="col-sm-5">
        <?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'class="form-control"');?>
        </span>
    </div>
  </div>
</div>
</div>