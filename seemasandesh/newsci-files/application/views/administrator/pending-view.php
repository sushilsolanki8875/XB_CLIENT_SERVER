 		<?=$header;?>
<div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
		<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
</div>
		<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
                  <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
			<div class="row" style="">
				<div class="col-md-3 col-xs-12">
					<div class="form-group">
                       	<label class="col-sm-2 visible-xs visible-sm control-label" style="color:#FFF;margin-top:7px;">
                           	Category: 
						</label>
						<div class="col-md-12 col-sm-9 col-xs-12">
							<select class="form-control" id="categoryId">
								<option value="-353" >All Categories</option>
								<?php
									foreach ($categories as $category) 
									{
										echo "<option value='".$category['id']."'>".$category['name']."</option>";
										foreach ($category['subcat'] as $subcategory) 
										{
											echo "<option value='".$subcategory['id']."'>&nbsp;&nbsp;&nbsp;".$subcategory['name']."</option>";
										}
									}
								?>
                            </select>
						</div>
					</div>
                </div>
                <div class="col-md-4 hidden-xs">
                	<span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold"><b>B</b></button></span>
			<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
			<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
			<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
			<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span>
                </div>
                <div class="col-md-5 col-xs-12">
					<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='updateDateWise'><span class="glyphicon glyphicon-ok"></span></div>
                    	<div class="input-daterange input-group pull-right" id="datepicker" style="float:left;max-width:320px;">
							<?php
								$dtObj = new DateTime("now");
								$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
								$currentDate = $dtObj->format("d-m-Y");
								
								$dtObj7 = new DateTime("now");
								$dtObj7->sub(new DateInterval('P7D'));
								$dtObj7->setTimeZone(new DateTimeZone("Asia/Kolkata"));
								$before7Date = $dtObj7->format("d-m-Y");
							?>
							<input type="text" class="form-control"  placeholder="Start Date" id="fromDate" value=""/>
							<span class="input-group-addon">to</span>
							<input type="text" class="form-control"  placeholder="End Date" id="toDate" value="<?=$currentDate; ?>"/>
						</div>
				</div>
            </div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="row">
		<div class="col-md-12" id="pendingnewsContainerColumn">
			
		</div>
	</div>
       <input type="hidden" class="lang_class" />
	<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   	<div class="modal-dialog">
	    	<div class="modal-content">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                	&times;
	            	</button>
		            <h4 class="modal-title" id="myModalLabel">
		               Are you Sure ?
		            </h4>
	        	</div>
		        <div class="modal-body">
		        	This will delete all the subnews in of the news !
		        </div>
		        <div class="modal-footer">
		           	<button type="button" class="btn btn-default" data-dismiss="modal">
		            	Close
		            </button>
		            <button type="button" class="btn btn-danger" id="DeleteNews" data-newsId="-1" data-table="none" >
		               Delete
		            </button>
		        </div>
	    	</div>
		</div>
	</div>