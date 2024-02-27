
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

   <link rel="stylesheet" href="{{ asset('CSS/style.css')}}">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
               
                <ul class="list-unstyled chat-list mt-2 mb-0">
               
                @foreach($users as $value)

                    <li class="clearfix">
                        <img src="/uploads/<?php echo $value->image; ?>" alt="avatar">
                        <div class="about">

                        <a href="{{url ('chat',$value['id'])}}"><?php echo $value->first_name;?></a>
                            
                            <!-- <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                             -->
                        </div>
                    </li>
                 @endforeach
                    
                </ul>
            </div>

      @include('secondChat')
              </div>
    </div>
</div>
</div>