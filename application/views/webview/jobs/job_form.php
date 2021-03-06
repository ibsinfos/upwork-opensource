
<link rel="stylesheet" href="<?php echo site_url("assets/css/chosen.css"); ?>">
<link rel="stylesheet" href="<?php echo site_url("assets/css/pages/post-job.css"); ?>">
<script src="<?php echo site_url("assets/js/chosen.jquery.js"); ?>"></script>
<style>
    input[type=file] {
        display:block;
        top: 0;
        left: 0;
        height:0;
        width:0;
        opacity: 0;
        filter: alpha(opacity=0);
        font-size: 8pt;
        z-index: 1;
        visibility: hidden;
        margin-left: -40px;
    }
</style>

<?php $tid = time();  ?>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Title</h4>
		</div>
		<div class="col-md-12">
		   <div class="edit_title">
				<input type="text" value="" name="title" class="form-control" id="title">
		   </div>
		</div>
	</div>
                
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Select Category</h4>
		</div>
		
		<div class="col-md-12">
			<div class="edit_title">
				<select id="category" name="category" class="form-control">
				<?php
				$resultset = $this->db->get('job_categories');
				$categories = $resultset->result();

				if ($categories) {
					foreach ($categories as $category) {
						?>
						<optgroup label="<?php echo $category->category_name; ?>" data-id = "<?php echo $category->cat_id;?>">
							<?php
							$subcat_resultset = $this->db->get_where('job_subcategories', ['cat_id' => $category->cat_id]);
							$subcategory_data = $subcat_resultset->result();

							if ($subcategory_data) {
								foreach ($subcategory_data as $subcat) {
									?>
									<option value="<?php echo $subcat->subcat_id ?>"><?php echo $subcat->subcategory_name ?></option>
									<?php
								}
							}
							?>

						</optgroup >
						<?php
					}
				}
				?>
				</select>
			</div>
		</div>
		
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Required Skills</h4>
		</div>
		
		
		
		<div class="col-md-12">
		  <div class="edit_title">
			   <div class="input_skills">
				 
			 <select class="choose-skills" name="skills[]"  data-placeholder="Skills"  multiple class="skills">
				<?php foreach($skillList as $skill){
				  ?>
				<option value="<?php echo $skill->skill_name; ?>"><?php echo $skill->skill_name; ?></option> 
				<?php 
				}?>
				
			</select>
		   </div>
		  </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Job Description</h4>
		</div>
		<div class="col-md-12">
		   <div class="edit_title">
			   <textarea name="job_description" id="job_description"
					  class="form-control" rows="5"></textarea>
		   </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Attach File</h4>
		</div>
		
		    
		<div class="col-md-12">
		  <div class="edit_title">
				<div class="upload_file">
					<input type="file" name="files" id="files" />
					<input type="button" id="uploader" value="Add files" class="btn my_btn" />
					<div id="file_lists">
						<ul id="lists">
						</ul>
					</div>
					<input type="hidden" name="requestor" value="<?= $user_id ?>" />
					<input type="hidden" name="tid" value="<?= $tid ?>" />
					<input type="hidden" name="attachments" id="attachments" />
				</div>
		  </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
	
		<div class="col-md-12">
			<h4 style="" class="main_title">Job Type</h4>
		</div>
		<div class="col-md-12 top-14">
		   <div class="edit_title">
			   <div class="row left-3">
				<div class="col-md-12 radio">
					<input type="radio" value="hourly" name="job_type"
						   checked="checked"><h4>Hourly - Pay by the hour verify with the work diary</h4>
				</div> 
			</div>

			<div class="row left-3" style="">
				<div class="col-md-12 radio">
					<input type="radio" value="fixed" name="job_type" ><h4>Fixed - Pay by the project requires Detailed specifications</h4>
				</div> 
			</div>
		   </div>
		</div>
	
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Experience Level</h4>
		</div>
		<div style="" class="col-md-12 radio left-19">
		   <div class="edit_title">
			<input type="radio" name="experience_level" id="experience_level" value="Entry level" checked/>
			<h4>Entry Level $</h4>
			<br />

			<input type="radio" name="experience_level" id="experience_level" value="Entermediate" />
			<h4>Intermediate $$</h4>
			<br />

			<input type="radio" name="experience_level" id="experience_level" value="Experienced" />
			<h4>Experienced $$$</h4>
		   </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group">
	<div id="fixed-control" class="row hidden">
		<div class="col-md-12">
			<h4 class="main_title">Budget $</h4>
		</div>
		<div class="col-md-12">
		   <div class="edit_title">
				<input style="" type="text" name="budget" id="budget" value="" class="budget" />
		   </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group" >
	<div class="row" id="hourly-control">
		<div class="col-md-12">
			<h4 class="main_title">Hours Per week</h4>
		</div>
		<div class="col-md-5">
		   <div class="edit_title">
			   <select class="form-control" name="hours_per_week">
				<option value="not_sure">Not Sure</option>
				<option value="1-9">1-9 hours</option>
				<option value="10-19">10-19 hours</option>
				<option value="20-29">20-29 hours</option>
				<option value="30-39">30-39 hours</option>
				<option value="40_plus">More than 40 hours</option>
			</select>
		   </div>
		</div>
	</div>
</div>

<div class="col-md-9 form-group">
	<div class="row">
		<div class="col-md-12">
			<h4 class="main_title">Job Duration</h4>
		</div>
		<div class="col-md-5">
		   <div class="edit_title">
				<select class="form-control job_duration" name="job_duration">
				<option value="not_sure">Not Sure</option>
				<option value="more_than_6_months">More than 6 months</option>
				<option value="3_6_months">3 - 6 months</option>
				<option value="1_3_months">1 - 3 months</option>
				<option value="less_than_1_months">Less than 1 month</option>
				<option value="less_than_1_week">Less than 1 Week</option>
			</select>
		   </div>
		</div>
	</div>
</div>

  <input type="hidden" name="tid" value="<?= time() ?>" />

<script>

	var formSubmitted = false;
	$(document).ready(function() {
		// clearForms();
		$('#uploader').click(function() {
            $('input[type=file]').trigger('click');
        });
		$('input[type=file]').change(function() {
            var formdata = false;
            if (accepted_file($(this).val())) {
                console.log(this.files[0]);
                formdata = new FormData();
                formdata.append("files", this.files[0]);
                formdata.append("uid", <?= $user_id ?>);
                formdata.append("ident", <?= $tid ?>);
            } else {
                alert('Executable files are NOT allowed!');
                return false;
            }
            console.log(formdata);
            if (formdata) {
                $.ajax({
                    url: "<?= base_url() ?>jobs/upload",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);
                        switch (res) {
                            case "0":
                                alert('There was an error uploading the file, please try again!');
                                break;
                            case "1":
                                alert('You have already added that file!');
                                break;
                            case "-1":
                                alert('File size should NOT be greater than 15MB!');
                                break;
                            default:
                                var fileWrapper = $("<li>");
                                var removeButton = $("<img src=\"<?= base_url() ?>assets/img/delete_icon.gif\" alt=\"Remove\" title=\"Remove\" style=\"margin-left: 5px;\" />");
                                removeButton.click(function() {
                                    if (confirm("Are you sure you want to delete: \n" + $(this).parent().text() + " ?")) {
                                        $.post("<?= base_url() . 'jobs/removefile' ?>", "file=" + $.trim($(this).parent().text()) + "&tid=<?= $user_id ?>/<?= $tid ?>");
                                        $(this).parent().remove();
                                    }
                                });
                                fileWrapper.html(res);
                                fileWrapper.append(removeButton);
                                $('#lists').append(fileWrapper);
                                break;
                        }
                    }
                });
            }
        });
		
		
	});
	
	function clearForms()
    {
        var i;
        for (i = 0; (i < document.forms.length); i++) {
            document.forms[i].reset();
        }
    }
	
	function accepted_file(filename) {
        var ext = filename.split('.').pop().toLowerCase();
        if (ext !== 'exe') {
            return true;
        } else
            return false;
    }
	
	$(".choose-skills").chosen();
    $('.chosen-drop').hide();
    $(".chosen-container").bind('keyup',function(e) {
        $('.chosen-drop').show();
    });
	
	
	$("input[name = 'job_type']").click(function(event){
		if($('input[name=job_type]:checked').val() == "fixed"){
			$("#fixed-control").removeClass("hidden"); 
			$("#hourly-control").addClass("hidden");
		}
		else{
			$("#fixed-control").addClass("hidden"); 
			$("#hourly-control").removeClass("hidden"); 
		}
	});
	
</script>
