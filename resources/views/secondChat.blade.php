
     <div class="chat">
         <div class="chat-header clearfix">
            <form action="/addMessage" method='post'>
                  <div class="input-box">
                        <input type="hidden" name="receiver_id" value="<?php echo $detail->id; ?>" >
                    </div>    
                <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="/uploads/<?php echo $detail->image; ?>" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0"><?php echo $detail->first_name; ?></h6>
                                <small>Last seen: 2 hours ago</small>
                            </div>   
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>
                <div class="chat-history">
                    @foreach($show as $key => $value) 
                    
                    <ul class="m-b-0">
                    <?php  if($hn != $value->sender_id){?>

                        <li class="clearfix">
                                <div class="message-data float-left">
                                    <span class="message-data-time"><?php echo $value->updated_at; ?></span>
                                </div>
                                <div class="message my-message float-left"><?php echo $value->message;?></div>                                    
                            </li>  
                        
                        <?php } else {   ?>
                            <li class="clearfix">
                            <div class="message-data float-right">
                                      <span class="message-data-time"><?php echo $value->updated_at; ?></span>
                                <img src="/uploads/<?php echo ($value['getImage'])?$value['getImage']->image:''; ?>" alt="avatar">
                            </div>
                            <div class="message other-message float-right"><?php echo $value->message; ?></div>
                        </li>

                     <?php } ?>       
                            
                    </ul>
                    @endforeach
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" class="form-control" name="message" placeholder="Enter text here...">                            
                    </div>
                   @csrf 
                </form>
                </div>
            </div>
    