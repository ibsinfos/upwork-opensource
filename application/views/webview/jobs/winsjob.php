 <style>
.message_lists{
    max-height: 230px;
    min-height: 230px;
    overflow-y: scroll;
    overflow-x: hidden;
}
.m_list.scroll-ul > li {
  display: block;
  margin: 10px 0 36px 5px;
  overflow: hidden;
  width: 100%;
  padding-bottom: 4px;
}
.chat-identity .img-circle {
  float: left;
  margin-right: 14px;
}
#conversion_message > input {
  background: rgb(28, 167, 219) none repeat scroll 0 0;
  float: right;
  font-size: 21px;
  height: 50px;
  margin-top: 4%;
  vertical-align: middle;
  width: 19%;
}
#conversion_message textarea {
  float: left;
  height: 100px;
  width: 76%;
}
.modal-body {
  overflow: hidden;padding-bottom: 20px !important;
}
</style>


<section id="big_header" style="margin-top: 30px; margin-bottom: 40px; height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 nopadding">
                <div class="row">
                    <div class="col-md-10 ">
                        <nav style="padding-left: 13px;" class="staff-navbar">
                            <ul style="margin-top: 8px;">
                                <li><a class="active" href="winsjob"><i style="margin-right: 5px;" class="fa fa-trophy"></i><b>Win Jobs</b></a></li>
                                <li><a href="endjobs"><i style="margin-right: 5px;" class="fa fa-briefcase"></i><b>Ended Jobs</b></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
            <div class="wj_custom_body">
                <div class="row">

						<div style="margin-bottom: 0;height: 40px;width:737px;margin-left: -2px;margin-top: 10px;" class="col-md-12 bordered-alert text-center ack-box">
							<?php if (!empty($acccept_jobList)) { ?>
								<h4 style="margin: 0;padding: 0;margin-top: -5px;">! You have hired <?= count($acccept_jobList) ?> jobs</h4>
						</div>
							<?php } else { ?>
								<h4 style="margin: 0;padding: 0;margin-top: -5px;">! You have no hired jobs</h4>
						</div>
						
						<div style="margin-top: 10px;margin-left: -26px;" class="row">
							<div class="col-md-12">
								<div style="margin-left: 7px;" class="border-box custom_empty_freelancer_box">
								</div>
							</div>
						</div>
                        <?php } ?>

                </div>
                <?php
                if (!empty($acccept_jobList)) {
                    foreach ($acccept_jobList as $data) {
                        $username = $data->webuser_fname . '&nbsp;' . $data->webuser_lname;
                        $title = $data->hire_title;

                        if ($data->job_type == "hourly") {
                            ?>

                            <div style="margin-left: -19px;" class="row margin-top-2">
                                <div class="col-md-12 wj_white_box white-box" style="padding: 20px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div style="margin-top: -2px;margin-left: -10px;margin-bottom: 10px;" class="st_img">
                                                     <img src="<?= $data->cropped_image ?>" width="90" height="68" />
                                                    </div>
                                                </div>
                                                <div class="col-md-7 nopadding" style="padding-left: 0 !important">
                                                   <div class="user_name">
										<h5 style="margin-bottom: 0;"><?=$data->webuser_fname?> <?=$data->webuser_lname?><br /> </h5>
									<span><?=$data->country_name?></span>
										</div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 text-center">
                                    
                                            <?php
                                            
//                                            $time = strtotime('monday this week 00:00 UCT');
//                                            $cweek = date('Y/m/d', $time);
//
//                                            $nweek = date('Y/m/d', strtotime($cweek . ' + 1 weeks'));
//                                            $prevweek = date('Y/m/d', strtotime($cweek . ' - 1 weeks'));


                                          date_default_timezone_set("UTC"); 
                                            $today = strtotime('today'); 
                                            $today = date('y-m-d',$today);
                                            $this_week_start = strtotime('monday this week');
                                             $this_week_start = date('y-m-d',$this_week_start);
                                          //  var_dump($today);var_dump($this_week_start);die();
                                            
                                            
                                            $this_week_end = strtotime('+1 week sunday');
                                             $this_week_end = date('y-m-d',$this_week_end);

                                            $last_week_start = strtotime('previous monday');
                                             $last_week_start = date('y-m-d',$last_week_start);
                                            $last_week_end = strtotime('previous sunday');
                                             $last_week_end = date('y-m-d',$last_week_end);


                                            $this->db->select('*');
                                            $this->db->from('job_workdairy');
                                            $this->db->where('fuser_id', $data->fuser_id);
                                            $this->db->where('working_date >=', $this_week_start);
                                            $this->db->where('working_date <=', $today);
                                            $this->db->where('jobid', $data->job_id);
                                            $query_done = $this->db->get();
                                            $job_done = $query_done->result();
                                            $total_work = 0;
                                            
//                                            var_dump($job_done);
//                                            var_dump($today);die();
//                                            die();
                                            
                                            if (!empty($job_done)) {
                                                foreach ($job_done as $work) {
                                                    $total_work += $work->total_hour;
                                                }
                                                echo $total_work . " hrs this week";
                                            } else {
                                                echo "<b>0.00</b> hrs this week";
                                            }
                                            
                                            
                                            ?>
                                        
                                            <?php //echo $data->weekly_limit;?>
                                            <br />
                                            @ <b><?php
                                if ($data->offer_bid_amount) {
                                    echo $amount = $data->offer_bid_amount;
                                } else {
                                    echo $amount = $data->bid_amount;
                                }
                                ?></b>/hr = <b>$<?php echo $amount * $total_work; ?></b>
                                             <br />
					     <p style="margin:0 !important;">This contract has been hold</p>

                                            <hr>
                                           
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="wj_massage_butt">
                                                    <div class="msg_btnxxx">
                                                        <input type="button" class="btn btn-primary form-btn" value="Message" onclick="loadmessage(<?= $data->bid_id ?>,<?= $data->buser_id ?>,<?= $data->job_id ?>, '<?= $username ?>', '<?= $title ?>')" />
                                                   </div>

                                                </div>
                                             <div class="wj_work_diary_butt">
                                                 <div class="work_diary-active hour_btn">
                                                     <a href="<?php echo base_url() ?>jobs/workdairy_freelancer?fmJob=<?php echo base64_encode($data->job_id);?>&fuser=<?php echo base64_encode($data->fuser_id);?>">
										<input type="button" class="btn btn-primary form-btn" value="Work Diary" />
										</a>
                                                 </div>
                                             </div>
                                                <div class="wj_drop_butt">
                                                    <div class="dropdown">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                                data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">

                                                            <li><a href="#">View contract</a></li>
                                                            <li><a href="#">End contract</a></li>

                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row margin-top-2">
                                                <div class="col-md-8 text-left">
                                                    <a href="<?php echo base_url() ?>jobs/workdairy_freelancer?fmJob=<?php echo base64_encode($data->job_id); ?>&buser=<?php echo base64_encode($data->buser_id); ?>">
                                                    
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="job_detais">
                                                <a href="<?php echo base_url() ?>jobs/contracts?fmJob=<?php echo base64_encode($data->job_id); ?>"> Job Details </a> -
                                                <span><b><?= $data->hire_title ?></b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

        <?php } else { ?>

                            <div  style="margin-left: -19px;" class="row margin-top-2">
                                <div class="col-md-12 wj_white_box white-box" style="padding: 20px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div style="margin-top: -2px;margin-left: -10px;margin-bottom: 10px;" class="st_img">
                                                      <img src="<?= $data->cropped_image ?>" width="90" height="68" />
                                                    </div>
                                                </div>
                                                <div class="col-md-7 nopadding" style="padding-left: -2px !important;">
												<div class="user_name">
													<h5 style="margin-bottom: 0;"><?=$data->webuser_fname?> <?=$data->webuser_lname?><br /> </h5>
													<span><?=$data->country_name?></span>
												</div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 text-center">
                                          <b> $<?= $data->fixedpay_amount ?></b> Paid of $<?= $data->hired_on ?><br/> <p style="margin:0 !important;">This contract has been hold</p></span>
                                            
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="wj_massage_butt2">
                                                    <div class="f_msg">
                                                        <input type="button" class="btn btn-primary form-btn" value="Message" onclick="loadmessage(<?= $data->bid_id ?>,<?= $data->buser_id ?>,<?= $data->job_id ?>, '<?= $username ?>', '<?= $title ?>')" />
                                                    </div>
                                                </div>

                                                <div class="wj_drop_butt">
                                                    <div class="dropdown">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                                data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">

                                                            <li><a href="#">View contact</a></li>
                                                            <li><a href="#">End contact</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row margin-top-2">
                                                <div class="col-md-8 text-left">
                                                    
                                                </div>

                                                <div class="col-md-12 text-center"></div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="job_detais">
                                                <a href="<?php echo base_url() ?>jobs/contracts?fmJob=<?php echo base64_encode($data->job_id);?>"> Job Details </a>- 
                                                <span><b><?= $data->hire_title ?></b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        <?php } ?>


    <?php }
} ?>	

            </div>
            </div>

        </div>
    </div>

</section>

</div>

</section>
<!-- big_header-->












<?php /*

  <section id="big_header" style="margin-top: 50px; margin-bottom: 50px; height: auto;">
  <div class="container">
  <div class="row">
  <?php
  if(!empty($acccept_jobList)) {
  foreach($acccept_jobList as $data) {
  if($data->job_type == "hourly"){


  ?>
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top: 20px;">
  <div class="col-md-4 col-sm-4 col-xs-4"> <span><b>Hired By:</b></span>
  <a href="<?php echo base_url()."interview?user_id=".base64_encode($data->webuser_id)."&job_id=".base64_encode($data->job_id)."&bid_id=".base64_encode($data->bid_id);?>">
  <span class="employer-name"> <?=$data->webuser_fname?> <?=$data->webuser_lname?></span>
  </a>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-4 align-center"> Status : Active </div>
  <div class="col-md-4 col-sm-4 col-xs-4">
  <button class="btn message-btn pull-right">Message</button>
  </div>
  </div>
  <div class="col-md-3 col-xs-3"></div>
  <div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0 25px;margin-bottom:60px;">
  <div class="col-md-12 col-sm-12 col-xs-12 job-details-box">
  <div class="col-md-9 col-sm-9 col-xs-9">
  <h4 style="color: #1ca7db"><a href="<?php echo base_url() ?>jobs/hourly_freelancer_view?fmJob=<?php echo base64_encode($data->job_id);?>"> <b><?=$data->hire_title?></b></a> </h4>
  <p>
  <br/>
  <br/> 0.00 of <?php echo $data->weekly_limit;?> hrs this week
  <br/> @ <?php if($data->offer_bid_amount) {echo $data->offer_bid_amount;} else {echo $data->bid_amount;} ?>/hr=$300 </p>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a href="<?php echo base_url() ?>jobs/hourly_freelancer_view?fmJob=<?php echo base64_encode($data->job_id);?>"> <span class="font1">Job Details</span></a>
  <br/>
  <button class="btn workdiary-btn">View Work Diary</button>
  </div>
  </div>
  </div>
  <div class="col-md-3 col-xs-3"></div>
  <?php } else { ?>

  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top: 20px;">
  <div class="col-md-4 col-sm-4 col-xs-4"> <span><b>Hired By:</b></span>
  <a href="<?php echo base_url()."interview?user_id=".base64_encode($data->webuser_id)."&job_id=".base64_encode($data->job_id)."&bid_id=".base64_encode($data->bid_id);?>">
  <span class="employer-name"> <?=$data->webuser_fname?> <?=$data->webuser_lname?></span>
  </a>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-4 align-center"> Status : Active </div>
  <div class="col-md-4 col-sm-4 col-xs-4">
  <button class="btn message-btn pull-right">Message</button>
  </div>
  </div>
  <div class="col-md-3 col-xs-3"></div>
  <div class="col-md-9 col-sm-9 col-xs-9" style="padding: 0 25px;margin-bottom:60px;">
  <div class="col-md-12 col-sm-12 col-xs-12 job-details-box">
  <div class="col-md-9 col-sm-9 col-xs-9">
  <h4 style="color: #1ca7db"><a href="<?php echo base_url() ?>jobs/fixed_freelancer_view?fmJob=<?php echo base64_encode($data->job_id);?>"> <b><?=$data->hire_title?></b></a></h4>
  <p>
  <br/>
  <br/> Paid $<?=$data->fixedpay_amount?> of budget $<?=$data->bid_amount?> </p>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-3"> <a href="<?php echo base_url() ?>jobs/fixed_freelancer_view?fmJob=<?php echo base64_encode($data->job_id);?>"><span class="font1">Job Details</span></a>
  <br/>
  <button class="btn workdiary-btn">Request Payment</button>
  </div>
  </div>
  </div>
  <div class="col-md-3 col-xs-3"></div>

  <?php } } } ?>


  </div>
  </div>
  </section>
  </div>
  </section> */ ?>

<!-- Modal -->
<div id="message_convertionModal" class="modal">
    <div class="modal-dialog cccc_massage_box">
        <div style="padding: 30px;padding-bottom: 60px;" class="modal-content">
                <button type="button" class="close" data-dismiss="modal" onclick="hidemessagepopup();">&times;</button>
                <h4 class="modal-title">Message</h4>
            <div class="modal-header">
                <div class="col-lg-12 col-md-12 col-sm-12 chat-screen">
                    <div class="chat-details-topbar">
                        <h3 class="user_name"></h3>
                        <h5 class="job_title"></h5>

                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="message_lists chat-details form-group" ></div>
                <form style="position:relative;" name="message" action="" method="post" id="conversion_message">
                    <textarea name="usermsg"  id="usermsg"></textarea>
						<div style="position: absolute;right: 23%;font-size: 26px;top: 35%;color:#a2a2a2;transform: rotate(90deg);" class="attach_icon">
						<i style="cursor: pointer;" class="fa fa-paperclip" aria-hidden="true"></i>
						</div>
                    <input name="job_id" type="hidden" id="job_id"  value="" />
                    <input name="bid_id" type="hidden" id="bid_id"  value=""  />
                    <input name="sender_id" type="hidden" id="sender_id"  value="<?php echo $this->session->userdata('id'); ?>"  />
                    <input name="receiver_id" type="hidden" id="receiver_id"  value=""  />
                    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function loadmessage(b_id, u_id, j_id, u_name, j_title) {
        $('.user_name').html(u_name);
        $('.job_title').html(j_title);

        var modal = document.getElementById('message_convertionModal');
        $.post("<?php echo site_url('jobconvrsation/message_from_superhero'); ?>", {job_bid_id: b_id, user_id: u_id, job_id: j_id}, function (data) {
            $('.message_lists').html(data.html);
            $('#job_id').val(j_id);
            $('#bid_id').val(b_id);
            $('#receiver_id').val(u_id);
            // $('#message_convertionModal').modal('show');
            modal.style.display = "block";
            // $('.message_lists').animate({scrollTop: $('.message_lists').prop("scrollHeight")}, 500);
            autoloading();
        }, 'json');

    }
    function hidemessagepopup() {
        var modal = document.getElementById('message_convertionModal');
        modal.style.display = "none";
    }

    $("#conversion_message").on("submit", function (e) {
        e.preventDefault();
        var $form = $("#conversion_message");
        if ($('#usermsg').val().trim().length > 0) {
            $.post("<?php echo site_url('jobconvrsation/add_conversetion'); ?>", {form: $form.serialize()}, function (data) {
                if (data.success) {
                    $form[0].reset();
                    loadmessage($('#bid_id').val(), $('#receiver_id').val(), $('#job_id').val());

                } else {
                    alert('Opps!! Something went wrong.');
                }

            }, 'json');
        }

    });

    function loadmessage_auto( ) {

        var auto_job_id = $('#job_id').val();
        var auto_bid_id = $('#bid_id').val();
        var auto_receiver_id = $('#receiver_id').val();

        var modal = document.getElementById('message_convertionModal');
        $.post("<?php echo site_url('jobconvrsation/message_from_superhero'); ?>", {job_bid_id: auto_bid_id, user_id: auto_receiver_id, job_id: auto_job_id}, function (data) {
            $('.message_lists').html(data.html);

            //$('.message_lists').animate({scrollTop: $('.message_lists').prop("scrollHeight")}, 500);
        }, 'json');
    }

    function autoloading() {
        //alert('hi');
        var auto_job_id = $('#job_id').val();
        var auto_bid_id = $('#bid_id').val();
        var auto_receiver_id = $('#receiver_id').val();

        if (auto_job_id) {
            auto_job_id = auto_job_id;
        } else {
            auto_job_id = 0;
        }
        if (auto_bid_id) {
            auto_bid_id = auto_bid_id;
        } else {
            auto_bid_id = 0;
        }
        if (auto_receiver_id) {
            auto_receiver_id = auto_receiver_id;
        } else {
            auto_receiver_id = 0;
        }

        if (auto_job_id && auto_bid_id && auto_receiver_id) {
            setInterval('loadmessage_auto()', 5000);
        }
    }
    autoloading();
</script>